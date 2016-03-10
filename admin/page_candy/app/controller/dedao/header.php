<?php
class Controllerdedaoheader extends Controller{
  	public function index($argval){
  		if(!isset($argval['title']))$argval['title']=WEBSITE;
  		return $this->load->view("dedao/header.tpl",$argval);
  	}
}