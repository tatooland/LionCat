<?php 
class ControllerWebAppBooking extends Controller{
	public function index(){
		
		$data=array();
		$data['header']=$this->load->controller("common/webAppHeader",array("title"=>"微信"));
		$data['footer']=$this->load->controller("common/webAppFooter");
		$data['scene1']=$this->scene1($data);
		$data['scene2']=$this->scene2($data);
		$data['scene3']=$this->scene3($data);
		$data['scene4']=$this->scene4($data);
		$data['bottomNav']=$this->bottomNav($data);
		//$data['scene3']=$this->scene3($data);
		$this->response->setOutput($this->load->view("webApp/easyBooking.tpl",$data));
		
	}
	public function scene1($data=array()){
		$data['messageList']="";
		
		$this->load->orm("webApp/user");
		$Users=$this->orm_webApp_user;
		
		$i=$Users->find(4);
		$data['msgs']=$i->getAllReciveMessageProfile();
		
		$data['messageList'].=$this->load->view("webApp/components/comment_item.tpl",$data);
		
		return $this->load->view("webApp/easyBooking_scene1.tpl",$data);
	}
	public function scene2($data=array()){
		$this->load->orm("webApp/user");
		$data['users']=$this->orm_webApp_user->all();
		return $this->load->view("webApp/easyBooking_scene2.tpl",$data);
	}
	public function scene3($data=array()){
		return $this->load->view("webApp/easyBooking_scene3.tpl",$data);
	}
	public function scene4($data=array()){
		return $this->load->view("webApp/easyBooking_scene4.tpl",$data);
	}
	public function msgProfile(){
		$id=4;
		if(isset($this->request->get['id'])){
			$id=$this->request->get['id'];
		}
		$this->load->orm("webApp/user");
		$Users=$this->orm_webApp_user;
		$sheldon=$Users->find($id);
		$this->load->orm("webApp/message");
		$Msgs=$this->orm_webApp_message;
		$data=array();
		$data['msgs']=$Users->hasOne($Msgs,"sendto_id","id");
		return $this->load->view("webApp/components/msgList.tpl",$data);
	}
	public function bottomNav($data=array()){
		return $this->load->view("webApp/bottomNav.tpl",$data);
	}
	public function queryAll(){
		$this->load->orm("webApp/user");
		$users=$this->orm_webApp_user->all();
		var_dump($users);
	}
	public function insertIntoNewUsers(){
		$truename=[
			"Sheldon Cooper","Leonard Leakey Hofstadter","Penny",
			"Howard Joel Wolowitz","Rajesh Ramayan Koothrappali","Barry Kripke",
			"Amy Farrah Fowler","Bernadette Maryann Rostenkowski","Leslie Winkle",
			"Stuart Bloom"
		];
		$sex=[1,1,0,1,1,1,0,1,0,0];
		$headImg=[
			"http://www.qqmofasi.com/data/attachments/2014/07/24/99_XJh5hSs9La3SQCYbsJq3_square.jpeg",
			"http://www.qq1234.org/uploads/allimg/150429/12002450K-8.jpg",
			"http://www.qqmofasi.com/data/attachments/2014/09/19/510_bkR1PcC1EwsRKReQPj00_square.jpg",
			"http://h.hiphotos.baidu.com/baike/w%3D268/sign=8dab986a48fbfbeddc59317940f0f78e/8601a18b87d6277f492b3b6d2b381f30e924fcae.jpg",
			"http://img4.imgtn.bdimg.com/it/u=1664450660,2788742562&fm=21&gp=0.jpg",
			"http://img2.imgtn.bdimg.com/it/u=3228691803,1412258949&fm=21&gp=0.jpg",
			"http://img4.imgtn.bdimg.com/it/u=482232969,2935311739&fm=21&gp=0.jpg",
			"http://img5.imgtn.bdimg.com/it/u=3201528245,4175313712&fm=21&gp=0.jpg",
			"http://img2.imgtn.bdimg.com/it/u=1377304099,73583719&fm=21&gp=0.jpg",
			"http://img0.imgtn.bdimg.com/it/u=3404283738,1972513378&fm=21&gp=0.jpg"
		];
		$this->load->orm("webApp/user");
		$Users=$this->orm_webApp_user;
		for($i=0;$i<10;$i++){
			$user=$Users->create();
			$user->true_name=$truename[$i];
			$user->sex=$sex[$i];
			$user->birthday="1980-08-".(30-$i);
			$user->area="New York";
			$user->signature="I am awake";
			$user->nick=$truename[$i];
			$user->head_img=$headImg[$i];
			$user->qrcode="";
			$user->flush();
		}
	}
	public function insertIntoMessage(){
		$this->load->orm("webApp/message");
		$Msg=$this->orm_webApp_message;
		$messages=[
		"你为什么不和别人一样在16岁的时候考驾照？",
		"我在做别的事 ",
		"做什么？",
		"验证超对称理论中N=4的情况下的扰动振幅，再用现代扭量理论重新验证N=8时回路超磁场的理论特征",
		"你难道不觉得应该由我来回答工程问题么？我是个工程师",
		"照这个逻辑那我应该回答所有人类学的问题，因为我是个哺乳动物",
		"这三明治真是个彻底的失败品，我点的是火鸡和烤牛肉，全麦上放生菜和芝士",
		"那他们给的你什么啊？",
		"火鸡和烤牛肉，全麦上放的芝士和生菜",
		"我是射手座，这样你们就会了解我多一点了",
		"没错，可以了解你有群众性文化妄想，就是指你认为你出生时相对于任意确定星座的太阳相对位置可能会决定你的性格"
		];
		$authors1=[6,4,6,4,7,4,4,8,4,6];
		$authors2=[4,6,4,6,4,7,8,4,8,4];
		for($i=0;$i<10;$i++){
			$msg=$Msg->create();
			$msg->author_id=$authors1[$i];
			$msg->sendto_id=$authors2[$i];
			$msg->message=$messages[$i];
			$msg->time=date("Y-m-d H:i:s");
			$msg->flush();
			sleep(1);
		}
	}
	public function queryMsg(){
		$this->load->orm("webApp/user");
		$Users=$this->orm_webApp_user;
		$sheldon=$Users->find(4);
		var_dump($sheldon->getAllReciveMessageProfile($sheldon->id));
	}
}
?>