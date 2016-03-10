<?php
class ControllerCommonHome extends Controller{
	public function index(){
		$data=array();
		$data['header']=$this->load->controller("common/header");
		$data['footer']=$this->load->controller("common/footer");
		$data['sidebar']=$this->load->controller("common/sidebar");
		$data['dashboard']=$this->load->controller("common/dashboard");
		//registMenuItem("title");
		$this->response->setOutput($this->load->view("common/home.tpl",$data));
	}
}