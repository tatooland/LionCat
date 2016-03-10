<?php
class Controllerormtable extends Controller{
  public function index($parameters){
  	/*
  	 * select `key`.id,`key`.game_key,`key`.used,`key`.exchanged_time from `key`
  	 * 
  	 * */

  	$data=array();
  	$data['config']=$parameters['config'];
  	$data['http']=$_SERVER['REQUEST_URI'];
  	$data['route']=$_GET['route'];
  	$data['routes']=$data['route'];
  	$routes=explode("/",$data['route']);
  	$data['route']=$routes[0]."/".$routes[1];
  	//echo "hello";
  	$this->load->model("orm/table");
  	
  	$data['rows']=$this->model_orm_table->getTableData($parameters['sql']);
  	return $this->load->view("orm/table.tpl",$data);
  }
}
