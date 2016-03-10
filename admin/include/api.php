<?php
function registMenuItem($parent,$current=NULL){
	$fhandle=fopen("page_candy/txt/menu.json","a+");
	$str=fread($fhandle,filesize("page_candy/txt/menu.json"));

	$menu=json_decode($str);
	fclose($fhandle);
	if($current==NULL){
		echo "注册顶级菜单无链接<br>";
	}else if(is_array($current)){
		echo "注册次级菜单";
	}else{
		echo "注册顶级链接";
	}
	var_dump($menu);
}
function makeUrlWithToken($url){
	$url="&token=$url";
	return $url;
}