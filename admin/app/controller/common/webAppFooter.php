<?php 
class ControllercommonwebAppFooter extends Controller{
  public function index(){
  	$data=array();
  	return $this->load->view("common/webAppFooter.tpl",$data);
  }
}?>