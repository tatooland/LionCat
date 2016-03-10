<?php
class Controllerplustest extends Controller{
  public function index(){
  		$productId=1;
	  	$fdata=array(
		  	"action"=>"index.php?route=plus/test/handleSubmit",
		  	"method"=>"post",
		  	"table"=>"test_form",
		  	"payload"=>
		  	array(
			  	["l"=>"用户姓名","c"=>"user_name","t"=>"text","p"=>"请输入真实的用户姓名"],
			  	["l"=>"联系电话","c"=>"user_phone","t"=>"text","p"=>"请输入待升级的手机号"],
			  	["l"=>"联系地址","c"=>"user_address","t"=>"text","p"=>"请输入寄送地址"],
		  		["l"=>"选项测试","c"=>"select_test","t"=>"select",
		  			"o"=>[
	  					['val'=>'0','text'=>"选项0"],
		  				['val'=>'1','text'=>"选项1"],
		  				['val'=>'2','text'=>"选项2"],
		  				['val'=>'3','text'=>"选项3"]
	  				]
	  			],
			  	["l"=>"","c"=>"product_id","t"=>"hidden","v"=>"$productId"],	
		  	),
		  	"do"=>"isrt",
		  	"condition"=>"true"
	  	);
	  	
  		$data=array();  		
  		$data['header']=$this->load->controller("common/header");
  		$data['footer']=$this->load->controller("common/footer");
  		
  		$form=new Form();
  		$data['form']=$form->buildForm($fdata);
  		
  		//lambda test in php
  		$i=1;
  		$j=2;
  		$func1=function() use ($i,$j){
  			echo "lambda1: $i,$j<br>";
  		};
  		//$func1();
  		
  		$func2=function($i,$j){
  			$i++;
  			$j++;
  			echo "lambda2:$i,$j<br>";
  		};
  		//$func2($i,$j);
  		
  		$data['str']="hello";
		$this->response->setOutput($this->load->view('plus/test.tpl',$data));
  }
  public function handleSubmit(){
  	//var_dump($this->request->post);
  	
  	$data=array();
  	$this->load->model("plus/test");
  	$result=$this->model_plus_test->insertUserInfo();
  	//$result=true;
	if($result){
		//var_dump($this->request->post);
		$data['resultString']="当前操作已成功！";
		$this->load->controller("default/submitResult",$data);
	}
  }
  
  public function tableTest(){
  		$condition=$this->buildCondition();
	  	$data=array();
	  	$data['header']=$this->load->controller("common/header",array("title"=>"ifree卡记录"));
	  	$data['footer']=$this->load->controller("common/footer");
	  	$data['table']=$this->load->controller("orm/table",array(
	  		"sql"=>"select `id`,`ifree_nbr`,`using` from t_ifree where $condition order by `id` desc limit 20",
		  	"config"=>array(
		  			/*数组中的各元素定义了每个列的行为*/
		  		"data"=>array(
	  				array("c"=>"id","l"=>"ID","model"=>"identify","click"=>"void"),//讲当前属性设置为记录的唯一识别标示
	  				array("c"=>"ifree_nbr","l"=>"ifree号码","model"=>"read","click"=>"editablebox"),
	  				array("c"=>"using","l"=>"是否被占用","model"=>"write","click"=>"editablebox"),
		  		),
		  		"op"=>array(
		  			array("c"=>"","l"=>"更新","model"=>"submit","callback"=>"update","then"=>"nothing"),
		  			array("c"=>"","l"=>"删除","model"=>"submit","callback"=>"delete","then"=>"mark")//"then": nothing mark refreash
		  		),
	  			"filter"=>array(
	  					array("c"=>"f_timer_1","l"=>"开始时间","t"=>"calendar"),
	  					array("c"=>"f_timer_2","l"=>"截止时间","t"=>"calendar"),
	  					array("c"=>"f_id","l"=>"请输入id","t"=>"text"),
	  					array("c"=>"f_ifree_nbr","l"=>"请输入ifree号码","t"=>"text"),
	  					array("c"=>"f_using","l"=>"是否被占用","t"=>"select","option"=>array(
	  																				array("text"=>"全部","value"=>""),
														  							array("text"=>"是","value"=>"1"),
														  							array("text"=>"否","value"=>"0")
														  						),
	  					),
	  			)
		  	),
	  	));
	  	
	  	$this->response->setOutput($this->load->view('plus/test.tpl',$data));
  }
  public function buildCondition(){
  		$condition="true";
  		//if(isset($this->request->post['']))
  		
  		if(!$this->isPostDataEmpty('f_id')){
  			$condition.=" and id=".$this->request->post['f_id'];
  		}
  		if(!$this->isPostDataEmpty('f_ifree_nbr')){
  			$condition.=" and ifree_nbr='".$this->request->post['f_ifree_nbr']."'";
  		}
  		if(!$this->isPostDataEmpty('f_using')){
  			$condition.=" and `using`=".$this->request->post['f_using'];
  		}
  		return $condition;
  }
  public function isPostDataEmpty($str){
  		if(isset($this->request->post[$str]))
  			return $this->request->post[$str]=="" ? true:false;
  		else
  			return true;
  }
  public function update(){
  	$data=array();
  	$data['id']=$this->request->post['id'];
  	$data['ifree_nbr']=$this->request->post['ifree_nbr'];
  	$data['using']=$this->request->post['using'];
  	$this->load->model('plus/test');
  	$result=$this->model_plus_test->update($data);
  	if($result)
  		echo "{\"result\":\"success\"}";
  	else 
  		echo "{\"result\":\"error\"}";
  }
  public function delete(){
  	$data=array();
  	$data['id']=$this->request->post['id'];
  	$data['ifree_nbr']=$this->request->post['ifree_nbr'];
  	$data['using']=$this->request->post['using'];
  	$this->load->model('plus/test');
  	$this->model_plus_test->delete($data['id']);
  }
  /*
   * 
mysql> CREATE TABLE `form_test`(`id` int(11) NOT NULL AUTO_INCREMENT,
    -> `user_name` varchar(64) NOT NULL,
    -> `user_phone` varchar(16) NOT NULL,
    -> `user_address` varchar(16) NOT NULL,
    -> PRIMARY KEY(`id`)
    -> )ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
   * */
}