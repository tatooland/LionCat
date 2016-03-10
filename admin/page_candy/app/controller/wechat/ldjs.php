<?php
class Controllerwechatldjs extends WXController{
  public function _index(){
  		$data=array();
		//$data['wxJsPlugin']=$this->loadWxJsPlugin();
		$opendId="test_open_id";
		$fdata=array(
			"action"=>"index.php?route=route=wechat/ldjs/handleSubmit",
			"method"=>"post",
			"table"=>"recommand",
			"do"=>"isrt",
			"condition"=>"true",
			"payload"=>array(
				array("l"=>"推荐人姓名","c"=>"referee_name","t"=>"text","p"=>"请输入真实姓名"),
				array("l"=>"推荐人电话","c"=>"referee_phone","t"=>"text","p"=>"请输入电信手机号"),
				array("l"=>"申请人姓名","c"=>"user_name","t"=>"text","p"=>"请输入真实姓名"),
				array("l"=>"申请人电话","c"=>"user_phone","t"=>"textg","p"=>"请输入您的电信手机号码"),
				array("l"=>"","c"=>"openid","t"=>"hidden","v"=>"$opendId")
			),
		);
		$f=new Form();
		$data['form']=$f->buildForm($fdata);
		$data['header']=$this->load->controller("common/header",array("title"=>"劳动竞赛"));
		$data['footer']=$this->load->controller("common/footer");
		$this->response->setOutput($this->load->view('wechat/ldjs.tpl',$data));
  }
  public function handleSubmit(){
  		if( $this->isPostDataEmpty("referee_name")||
			$this->isPostDataEmpty("referee_phone")||
			$this->isPostDataEmpty("user_name")||
			$this->isPostDataEmpty("user_phone")||
			$this->isPostDataEmpty("openid"))
  		{
  				
  		}
  }
  public function isPostDataEmpty($str){
  		if(isset($this->request->post[$str])){
  			return ($this->request->post[$str]==""?true:false);
  		}else{
  			return true;
  		}
  }
  public function tableAdmin(){
  		$condition=$this->buildCondition();
  		$data=array();
  		$data['header']=$this->load->controller("common/header",array("title"=>"劳动竞赛统计"));
  		$data['footer']=$this->load->controller("common/footer");
  		$data["table"]=$this->load->controller("orm/table",array(
  			"sql"=>"",
  			"config"=>array(
  				"data"=>array(),
  				"op"=>array(),
  				"filter"=>array()
  			),
  		));
  		$this->response->setOutput($this->load->view("wechat/ldjs_table.tpl",$data));
  }
}