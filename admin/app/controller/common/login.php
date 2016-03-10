<?php
	class ControllerCommonLogin extends Controller{
		public function index(){
			$data=array();
			$data['header']=$this->load->controller("common/header");
			$data['footer']=$this->load->controller("common/footer");
			$data['sidebar']=$this->load->controller("common/sidebar",array("value"=>"欢迎来到后台管理系统"));
			$this->response->setOutput($this->load->view("common/login.tpl",$data));
		}
	}
	