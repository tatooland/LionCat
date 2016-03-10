<?php
class Controllercommonfooter extends Controller{
  public function index(){
  	$data=array();
  	return $this->load->view("common/footer.tpl",$data);
  }
}