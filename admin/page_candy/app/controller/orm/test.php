<?php
class Controllerormtest extends Controller{
  public function index(){
  	$data=array();
  	$data['header']=$this->load->controller("common/header");
  	$data['footer']=$this->load->controller("common/footer");
  	
  	#通过ORM获取数据
  	$this->load->orm("orm/users");
  	$Users=$this->orm_orm_users;
  	$somebody=$Users->find(1);
  	
  	$data['name']=$somebody->name;
  	$data['age']=$somebody->age;
  	//$somebody->age=27;
  	$somebody->flush();

  	
  	#通过MODEL获取数据
  	$this->load->model("orm/test");
  	$datas=$this->model_orm_test->getNameAndAge();
  	$data['m_name']=$datas['name'];
  	$data['m_age']=$datas['age'];
 
  	
  	$this->response->setOutput($this->load->view("orm/test.tpl",$data));
  }
}