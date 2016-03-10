<?php

final class Loader{
	private $registry;
	public function __construct($registry){
		$this->registry=$registry;
	}
	public function controller($route,$args=array()){
		$action=new Action($route,$args);
		return $action->execute($this->registry);
	}
	public function model($model){
		$file=DIR_APPLICATION.'model/'.$model.'.php';
		$cls='Model'.preg_replace("/[^a-zA-Z0-9]/",'',$model);
		if(file_exists($file)){
			include_once($file);
			$this->registry->set('model_'.str_replace('/','_',$model),new $cls($this->registry));
		}else{
			trigger_error('Error: Could not load model'.$file.'!');
			exit();
		}
	}
	public function view($tpl,$data=array()){
		$file=DIR_VIEW.$tpl;
		if(file_exists($file)){
			extract($data);
			ob_start();
			require($file);
			$output=ob_get_contents();
			ob_end_clean();
			return $output;
		}else{
			trigger_error('Error:Could not load template'.$file.'!');
		}
	}
	public function orm($orm){
		$file=DIR_APPLICATION.'orm/'.$orm.'.php';
		$cls='Orm'.preg_replace("/[^a-zA-Z0-9]/",'',$orm);
		if(file_exists($file)){
			include_once($file);
			$this->registry->set('orm_'.str_replace('/','_',$orm),new $cls($this->registry->get('db'),$this->registry->get('response'),$this->registry->get('request')));
		}else{
			trigger_error("Error:Could not load orm'$file'!");
			exit();
		}
	}
}

