<?php
class ControllergdsladminHome extends Controller{
  public function index(){
		$data=array();
		$data['header']=$this->load->controller("common/header",array("title"=>"工单自动化"));
		$data['footer']=$this->load->controller("common/footer");
		//$data['table']=$this->
		$this->response->setOutput($this->load->view('gdsl/adminHome.tpl',$data));
  }
}