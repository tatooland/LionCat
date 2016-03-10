<?php
/*
 * registry 用以存放公共类实例
 * */
final class Registry{
	private $data=array();
	public function get($key){
		return (isset($this->data[$key]) ? $this->data[$key] : NULL);
	}
	public function set($key,$val){
		$this->data[$key]=$val;
	}
}