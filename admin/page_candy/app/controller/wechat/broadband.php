<?php
class Controllerwechatbroadband extends Controller{
  public function index(){
  		if(isset($this->request->get['source']))
  			$source=$this->request->get['source'];
  		else 
  			$source="微信";	
  	
  		$city=array('昆明市','丽江市','保山市','大理市','德宏州','怒江市','文山州','昭通州','普洱市','曲靖市','临沧市','楚雄州','版纳州','玉溪市','红河州','迪庆州');
  		$package_type=array('4G融合宽带','4K光宽带','单宽带');
  		$speed=array('100M','10M','12M','20M','50M','8M');
  		$payType=array('包两年','包年','包月');
  		$import=array('ADSL','FTTH');
  		$data=array();
  		$fdata=array(
  				"action"=>"index.php?route=wechat/broadband/handleSubmit/none",
  				"method"=>"post",
  				"table"=>"bd_form",
  				"do"=>"isrt",
  				"condition"=>"true",
  				"payload"=>array(
  					array("l"=>"地区","c"=>"city","t"=>"select","o"=>array(
  							array('val'=>"0","text"=>"请选择所在地区"),
  							array("val"=>"昆明市","text"=>"昆明市"),
  							array("val"=>"丽江市","text"=>"丽江市"),
  							array("val"=>"保山市","text"=>"保山市"),
  							array("val"=>"大理市","text"=>"大理市"),
  							array("val"=>"德宏州","text"=>"德宏州"),
  							array("val"=>"怒江市","text"=>"怒江市"),
  							array("val"=>"文山州","text"=>"文山州"),
  							array("val"=>"昭通州","text"=>"昭通州"),
  							array("val"=>"普洱市","text"=>"普洱市"),
  							array("val"=>"曲靖市","text"=>"曲靖市"),
  							array("val"=>"临沧市","text"=>"临沧市"),
  							array("val"=>"楚雄州","text"=>"楚雄州"),
  							array("val"=>"玉溪市","text"=>"玉溪市"),
  							array("val"=>"红河州","text"=>"红河州"),
  							array("val"=>"迪庆州","text"=>"迪庆州"),
  							array("val"=>"版纳州","text"=>"版纳州"),
  					)),
  					array("l"=>"套餐","c"=>"package_type","t"=>"select","o"=>array(
  							array('val'=>"0","text"=>"请选择办理套餐"),
  							/*(array("val"=>"4K光宽带","text"=>"4K光宽带"),
  							array("val"=>"4G融合宽带","text"=>"4G融合宽带"),
  							array("val"=>"单宽带","text"=>"单宽带"), */ 						
  					)),
  					array("l"=>"接入方式","c"=>"import","t"=>"select","o"=>array(
  							array('val'=>"0","text"=>"请选择接入方式"),
  							/*array("val"=>"FTTH","text"=>"光纤"),
  							array("val"=>"ADSL","text"=>"非光纤"),*/
  					)),
  					array("l"=>"速率","c"=>"speed","t"=>"select","o"=>array(
  							array('val'=>"0","text"=>"请选择宽带速率"),
  							/*array("val"=>"100M","text"=>"100M"),
  							array("val"=>"50M","text"=>"50M"),
  							array("val"=>"20M","text"=>"20M"),
  							array("val"=>"12M","text"=>"12M"),
  							array("val"=>"10M","text"=>"10M"),
  							array("val"=>"8M","text"=>"8M"),*/
  					)),
  					array("l"=>"包年方式","c"=>"pay_type","t"=>"select","o"=>array(
  							array('val'=>"0","text"=>"请选择包年方式"),
  							/*array("val"=>"100M","text"=>"100M"),
  							array("val"=>"50M","text"=>"50M"),
  							array("val"=>"20M","text"=>"20M"),
  							array("val"=>"12M","text"=>"12M"),
							array("val"=>"10M","text"=>"10M"),
  							array("val"=>"8M","text"=>"8M"),*/
  					)),
  				)
  		);
  		$fdata2=array(
  			"action"=>"index.php?route=wechat/broadband/handleSubmit",
  			"method"=>"post",
  			"table"=>"order_form",
  			"do"=>"isrt",
  			"condition"=>"true",
  			"payload"=>array(
  				array("l"=>"用户姓名","c"=>"user_name","t"=>"text","p"=>""),
  				array("l"=>"安装地址","c"=>"user_detail_address","t"=>"text","p"=>""),
  				array("l"=>"联系电话","c"=>"user_phone","t"=>"text","p"=>""),
  				array("l"=>"身份证号","c"=>"user_id_card","t"=>"text","p"=>""),
  				array("l"=>"推荐人","c"=>"agent","t"=>"text","p"=>""),
  				array("l"=>"用户留言","c"=>"user_message","t"=>"textarea","p"=>""),
  				array("l"=>"","c"=>"telecom_attribute_id","t"=>"hidden","p"=>"","v"=>""),
  				array("l"=>"","c"=>"product_name","t"=>"hidden","p"=>"","v"=>""),
  				array("l"=>"","c"=>"user_area","t"=>"hidden","p"=>"","v"=>""),
  				array("l"=>"","c"=>"product_info","t"=>"hidden","p"=>"","v"=>""),
  				array("l"=>"","c"=>"setup_type","t"=>"hidden","p"=>"","v"=>"新装"),
  				array("l"=>"","c"=>"source","t"=>"hidden","p"=>"","v"=>"$source"),
  		),
  		);
  		$f=new Form();
  		$data['form']=$f->buildForm($fdata);
  		$data['form2']=$f->buildForm($fdata2);
  		$data['header']=$this->load->controller("common/header",array("title"=>"电信双十二宽带钜惠"));
  		$data['footer']=$this->load->controller("common/footer");
  		$this->response->setOutput($this->load->view("wechat/broadband.tpl",$data));
  }
  public function gPkg(){
  		$this->load->model("wechat/broadband");
  		echo $this->model_wechat_broadband->getPackageType();
  }
  public function gImport(){
  	$this->load->model("wechat/broadband");
  	echo $this->model_wechat_broadband->getImport();
  }
  public function gSpeed(){
  	$this->load->model("wechat/broadband");
  	echo $this->model_wechat_broadband->getSpeed();
  }
  public function gPayType(){
  	$this->load->model("wechat/broadband");
  	echo $this->model_wechat_broadband->getPayType();
  }
  public function queryProduct(){
  	$this->load->model("wechat/broadband");
  	echo $this->model_wechat_broadband->queryProduct();
  }
  public function handleSubmit(){
  	$this->load->model("wechat/broadband");
  	if($this->model_wechat_broadband->insertRecord()){
  		header("location:index.php?route=wechat/broadband/bOrderOk");
  	}else{
  		header("location:index.php?route=wechat/broadband/bOrderError");
  	}
  }
  public function bOrderOk(){
  	$data=array();
  	$data['header']=$this->load->controller("common/header");
  	$data['footer']=$this->load->controller("common/footer");
  	$this->response->setOutput($this->load->view("wechat/bOrderOk.tpl",$data));
  }
  public function bOrderError(){
  	$data=array();
  	$data['header']=$this->load->controller("common/header");
	$data['footer']=$this->load->controller("common/footer");
	$this->response->setOuput($this->load->view("wechat/bOrderError.tpl",$data));
  }
}