<?php
class Controllerhdtencentgame extends Controller{
  public function index(){
  	$data=array();
  	$form=new Form();
  	$data['form']=$form->buildForm(array(
  		'table'=>'form_test',
  		'action'=>'index.php?route=plus/t/handleSubmit',
  		'method'=>'post',
  		'payload'=>array(
  				["l"=>"办理用户姓名","c"=>"user_name","t"=>"text","p"=>"请输入真实姓名"],
  				["l"=>"ifree号码","c"=>"user_phone","t"=>"text","p"=>"请输入联系电话"],
  				["l"=>"办理身份证","c"=>"user_id_card","t"=>"text","p"=>"请输入真实的身份证号"],
  				["l"=>"","c"=>"game_type","t"=>"hidden","v"=>"1"]
  		)
  	));
  	$data['header']=$this->load->controller("common/header");
  	$data['footer']=$this->load->controller("common/footer");
  	$this->response->setOutput($this->load->view('plus/t.tpl',$data));
  }
  public function handleSubmit(){
	$this->load->model("plus/t");
	$data=array();
	$key=$this->model_plus_t->getGameKey();
	if($key=="no nbr matched"){
		$data['resultString']="您的手机号码不在本次活动中！";
	}else if($key=="exchanged"){
		$data['resultString']="您已领取过key!";
	}else{
		if($key){
			$data['resultString']="你已成功领取游戏key：$key,请妥善保管";
		}else{
			$data['resultString']="您来晚了，key已木有了哦:-<";
		}
	}
	$this->load->controller("default/submitResult",$data);
  }
}