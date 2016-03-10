<?php
class Controllercommonform extends Controller{
  public function index($fdata){
  	return $this->load->view("common/form.tpl",$fdata);
  }
}