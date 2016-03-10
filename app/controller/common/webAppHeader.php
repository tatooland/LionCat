<?php 
class ControllercommonwebAppHeader extends Controller{
  public function index($argval){
  	if(!isset($argval['title']))$argval['title']=WEBSITE;
  	return $this->load->view("common/webAppHeader.tpl",$argval);
  }
}?>