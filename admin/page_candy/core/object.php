<?php
abstract class object{
	public static $registry;
	
	public function __construct($registry) {
		self::$registry = $registry;
	}
	
	public function __get($key) {
		return self::$registry->get($key);
	}
	
	public function __set($key, $value) {
		self::$registry->set($key, $value);
	}	
}