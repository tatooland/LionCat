<?php
require_once("include/include.php");
//Registry
$reg=new Registry();

//Loader
$loader=new Loader($reg);
$req=new Request();
$resp=new Response();
$resp->addHeader("Content-Type:text/html;charset=utf-8");
$reg->set("response",$resp);
$reg->set('request',$req);
$reg->set('load',$loader);

object::$registry=$reg;
$db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$reg->set('db', $db);



$ctrller=new Front($reg);

$ctrller->addPreAction(new Action('common/maintenance'));
$ctrller->addPreAction(new Action('common/seo_url'));
if(isset($req->get['route'])){
	$action=new Action($req->get['route']);
}else{
	header("location:index.php?route=common/home");
	
}
$ctrller->dispatch($action, new Action('error/not_found'));
$resp->output();
