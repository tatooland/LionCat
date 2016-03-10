<?php
class Controllerwechatmate extends WXController{
  public function _index(){
	 $state="wangting";
	if(isset($this->request->get['state'])){
		//var_dump($this->request->get['state']);
		$state=$this->request->get['state'];
	}
 	$data=array();
	//$data['wxJsPlugin']=$this->loadWxJsPlugin();
	$fdata=array(
		"action"=>"index.php?route=wechat/mate/handleSubmit",
		"method"=>"post",
		"table"=>"order_form",
		"do"=>"isrt",
		"condition"=>"true",
		"payload"=>array(
			array("l"=>"用户姓名","c"=>"name","t"=>"text","p"=>"请输入真实的用户姓名"),
			array("l"=>"联系电话","c"=>"phone","t"=>"text","p"=>"请输入联系电话以便我们联系您"),
			array("l"=>"身份证号","c"=>"idcard","t"=>"text","p"=>"请输入真实的身份证号码"),
			array("l"=>"联系地址","c"=>"address","t"=>"text","p"=>"寄送地址"),
			array("l"=>"","c"=>"product_name","t"=>"hidden","v"=>"电信定制版（HUAWEI NXT-CL00）"),
			array("l"=>"","c"=>"source","t"=>"hidden","v"=>"$state")
		),
	);
	$f=new Form();
	$data['form']=$f->buildForm($fdata);
	$data['header']=$this->load->controller("common/header",array("title"=>"华为Mate 8尝鲜啦！"));
	$data['footer']=$this->load->controller("common/footer");
	$this->response->setOutput($this->load->view('wechat/mate.tpl',$data));
  }
  public function handleSubmit(){
  		if($this->isPostDataEmpty("name")||$this->isPostDataEmpty("phone")
  		||$this->isPostDataEmpty("idcard")||$this->isPostDataEmpty("address")){
  			header("location:index.php?route=wechat/mate/orderError");
  		}else{
  			$this->load->model("wechat/mate");
  			if($this->model_wechat_mate->insert()){
  				header("location:index.php?route=wechat/mate/orderOk");
  			}
  		}
  }
  public function isPostDataEmpty($str){
  		if(isset($this->request->post[$str])){
  			return ($this->request->post[$str]==""?true:false);
  		}else{
  			return true;
  		}
  }
  public function orderError(){
  	$data=array();
  	$data['header']=$this->load->controller("common/header",array("title"=>"华为Mate 8尝鲜啦！"));
  	$data["footer"]=$this->load->controller("common/footer");
  	$this->response->setOutput($this->load->view("wechat/orderError.tpl",$data));
  }
  public function orderOk(){
  	$data=array();
  	$data['header']=$this->load->controller("common/header",array("title"=>"华为Mate 8尝鲜啦！"));
  	$data['footer']=$this->load->controller("common/footer");
  	$this->response->setOutput($this->load->view("wechat/orderOk.tpl",$data));
  }
  public function tableAdminForbiddenTT(){
	header("location:http://yn.189.cn");
  	$condition=$this->buildCondition();
  	$data=array();
  	$data['header']=$this->load->controller("common/header",array("title"=>"预约记录"));
  	$data['footer']=$this->load->controller("common/footer");
  	$data['table']=$this->load->controller("orm/table",array(
  		"sql"=>"select `id`,`name`,`phone`,`idcard`,`product_name`,`address`,`order_time`,`order_status`,`deal_info`,`source` from mate_order where $condition;",
  		"config"=>array(
  				"data"=>array(
  					array("c"=>"id","l"=>"ID","model"=>"identify","click"=>"void"),
  					array("c"=>"name","l"=>"用户姓名","model"=>"read","click"=>"void"),
  					array("c"=>"phone","l"=>"联系电话","model"=>"read","click"=>"void"),
  					array("c"=>"idcard","l"=>"身份证号","model"=>"read","click"=>"void"),
  					array("c"=>"product_name","l"=>"产品名称","model"=>"write","click"=>"editablebox"),
  					array("c"=>"address","l"=>"寄送地址","model"=>"read","click"=>"void"),
  					array("c"=>"order_time","l"=>"订单提交时间","model"=>"read","click"=>"void"),
  					array("c"=>"order_status","l"=>"订单状态","model"=>"write","click"=>"editablebox"),
  					array("c"=>"deal_info","l"=>"处理信息","model"=>"write","click"=>"editablebox"),
  					array("c"=>"source","l"=>"订单来源","model"=>"read","click"=>"void")
  				),
  				"op"=>array(
  					array("c"=>"","l"=>"更新","model"=>"submit","callback"=>"update","then"=>"nothing"),
  				),
  				"filter"=>array(
  					array("c"=>"f_time_1","l"=>"开始时间","t"=>"calendar"),
  					array("c"=>"f_time_2","l"=>"截止时间","t"=>"calendar"),
  					array("c"=>"f_id","l"=>"请输入id","t"=>"text"),
  					array("c"=>"f_name","l"=>"用户姓名","t"=>"text"),
  					array("c"=>"f_phone","l"=>"联系电话","t"=>"text"),
  					array("c"=>"f_idcard","l"=>"身份证号","t"=>"text"),
  					array("c"=>"f_address","l"=>"寄送地址","t"=>"text"),
  					array("c"=>"f_order_status","l"=>"订单状态","t"=>"text"),
  					array("c"=>"f_source","l"=>"订单来源","t"=>"select","option"=>array(
  																					array("text"=>"全部","value"=>""),
  																					array("text"=>"天翼昆明","value"=>"tianyikm"),
  																					array("text"=>"云南电信网厅","value"=>"wangting")
  																  				)),
  				),
  		),
  	));
  	
  	$this->response->setOutput($this->load->view('wechat/mate_table.tpl',$data));
  }
  public function buildCondition(){
  	$condition=" true ";
  	if(!$this->isPostDataEmpty('f_time_1')){
  		//$condition.=" and ";
  	}
  	if(!$this->isPostDataEmpty('f_time_2')){
  		
  	}
  	if(!$this->isPostDataEmpty('f_id')){
  		$condition.=" and id=".$this->request->post['f_id'];
  	}
  	if(!$this->isPostDataEmpty('f_name')){
  		$condition.=" and name='".$this->request->post['name']."'";
  	}
  	if(!$this->isPostDataEmpty('f_phone')){
  		$condition.=" and phone='".$this->request->post['f_phone']."'";
  	}
  	if(!$this->isPostDataEmpty('f_idcard')){
  		$condition.=" and f_idcard='".$this->request->post['f_idcard']."'";
  	}
  	if(!$this->isPostDataEmpty('f_address')){
  		$condition.=" and address like '%".$this->request->post['f_address']."%'";
  	}
  	if(!$this->isPostDataEmpty('f_order_status')){
  		$condition.=" and order_status like '%".$this->request->post['f_order_status']."%'";
  	}
  	if(!$this->isPostDataEmpty('f_source')){
  		$condition.=" and source='".$this->request->post['f_source']."'";
  	}
  	return $condition;
  }
}