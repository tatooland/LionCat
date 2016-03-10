<?php
class ControllerCommonDashboard extends Controller{
	public function index($data=array()){
		return $this->load->view("common/dashboard.tpl",$data);
	}
}