<?php
class ControllernpmChatclient extends Controller{
  public function index(){
  		$data=array();
  		$data['header']=$this->load->controller("common/header");
  		$data['footer']=$this->load->controller("common/footer");
  		
  		$data['mid']=$this->request->get['mid'];
  		$data['oid']=$this->request->get['oid'];
  		
  		$this->load->orm("webApp/user");
  		$User=$this->orm_webApp_user;
  		$i=$User->find(intval($data['mid']));
  		$data['myImg']=$i->head_img;
  		
  		$o=$User->find(intval($data['oid']));
  		$data['otherImg']=$o->head_img;
  		
  		$this->response->setOutput($this->load->view("npmChat/client.tpl",$data));
  }
}