<?php
class Controllerwechattencentgame extends WXController{
  public function _index(){
  	$data=array();
	$data['wxJsPlugin']=$this->loadWxJsPlugin();
	$data['header']=$this->load->controller("common/header",array("title"=>"云南电信精英挑战赛"));
	$data['footer']=$this->load->controller("common/footer");
	$this->load->model('wechat/tencentgame');
	$data['ifreeNbr']=$this->model_wechat_tencentgame->getIfreeNbr();
	//var_dump($data['ifreeNbr']);
	$this->response->setOutput($this->load->view('wechat/tencentgame.tpl',$data));
  }
  public function submitHandle(){
  	$i=array();
  	$i['user_name']=$this->request->post['userName'];
  	$i['user_phone']=$this->request->post['userPhone'];
  	$i['user_idcard']=$this->request->post['userIdCard'];
  	$i['user_ifreenbr']=$this->request->post['userIfreeNbr'];
  	$i['user_address']=$this->request->post['userAddress'];
  	$i['idcard']=$this->request->post['idcard'];
  	$imgs=explode(",",$i['idcard']);
  	$i['imgs']=$this->downloadWxUploadImg($imgs);
  	$this->load->model("wechat/tencentgame");
  	$result=$this->model_wechat_tencentgame->insertOrder($i);
  	if($result==1){
  		/*
  		$data['resultString']="已提交您的订单，请耐心等待管理员处理！并在t＋1个工作日后进入公众号底部菜单输入您的ifree卡号码兑换游戏礼品，别忘了哦！";
  		$this->load->controller("default/submitResult",$data);
  		*/
  		echo "{\"result\":\"success\"}";
  	}else{
  		echo "{\"result\":\"haveOrdered\"}";
  	}
  }
  public function exchange(){
  	$data=array();
  	$data['header']=$this->load->controller('common/header',array("title"=>"云南电信精英挑战赛"));
  	$data['footer']=$this->load->controller('common/footer');
  	$f=new Form();
  	$data['form']=$f->buildForm(array(
  		"action"=>"index.php?route=wechat/tencentgame/exchangeSubmit",
  		"method"=>"post",
  		"table"=>"keyexchange_form",
  		"payload"=>
  		array(
  			array("l"=>"用户名","c"=>"user_name","t"=>"text","p"=>"办理ifree套餐时预留的用户姓名"),
  			array("l"=>"ifree号","c"=>"user_ifreenbr","t"=>"text","p"=>"办理ifree时选择的ifree号码"),
  			array("l"=>"身份证","c"=>"user_idcard","t"=>"text","p"=>"办理ifree是预留的身份证号"),
  			array("l"=>'',"c"=>"key_type","t"=>"hidden","v"=>""),
  		),
  		"do"=>"isrt",
  		"condition"=>"true"
  	));
  	$this->response->setOutput($this->load->view('wechat/tencentgameExchange.tpl',$data));
  }
  public function exchangeSubmit(){
  	//var_dump($this->request->post);
  	
  	$data=array();
  	$data['userName']=$this->request->post['user_name'];
  	$data['userIfreenbr']=$this->request->post['user_ifreenbr'];
  	$data['userIdCard']=$this->request->post['user_idcard'];
  	$data['keyType']=$this->request->post['key_type'];
  	$this->load->model("wechat/tencentgame");
  	$key=$this->model_wechat_tencentgame->getGameKey($data);
  	if($key=="key of keytype have no inventory"){
  		$data['resultString']="您要领取的key已经领完了，换个游戏key也许还有哦！";
  	}else if($key=="wait enable"){
  		$data['resultString']="请等待管理员受理通过您的ifree申领请求";
  	}else if($key=="ifree nbr error"){
  		$data['resultString']="输入的ifree卡号有误";
  	}else if($key=="input error or no ifree nbr"){
  		$data['resultString']="输入的信息有误，或者您还未办理ifree申领";
  	}else if(strpos("have key", $key)){
  		$ks=explode(" ", $key);
  		$data['resultString']="您已领过key了，".$ks[3];
  	}else{
  		$data['resultString']="你已成功领取游戏key：$key,请妥善保管";
  	}
  	
  	/*
	if($key=="no nbr matched"){
		$data['resultString']="您的手机号码不在本次活动中！";
	}else if($key=="input error"){
		$data['resultString']="您的号码还未办理完结，请稍后查询";
	}else{
		if($key){
			$data['resultString']="你已成功领取游戏key：$key,请妥善保管";
		}else{
			$data['resultString']="您来晚了，当前类别key已木有了哦:-<！您可以选择其他哦！";
		}
	}*/
	$this->load->controller("default/submitResult",$data);
  }
   public function home(){
  	$data=array();
  	$data['header']=$this->load->controller("common/header",array("title"=>"云南电信精英挑战赛"));
  	$data['booking']=HTTP_SERVER."/".WEBSITE."/index.php?route=wechat/tencentgame";
  	$data['exchange']=HTTP_SERVER."/".WEBSITE."/index.php?route=wechat/tencentgame/exchange";
  	$data['footer']=$this->load->controller("common/footer");
  	$this->response->setOutput($this->load->view('wechat/tencentgamehome.tpl',$data));
  }
}