<?php
class ControllerdefaultsubmitResult extends Controller{
  public function index($i){
  	$data=array();
  	$data['resultString']=$i['resultString'];
  	$data['header']=$this->load->controller("common/header");
  	$data['footer']=$this->load->controller("common/footer");
  	$this->response->setOutput($this->load->view('default/submitResult.tpl',$data));
  }
}