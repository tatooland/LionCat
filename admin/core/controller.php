<?php
abstract class Controller {
	protected $registry;

	public function __construct($registry) {
		$this->registry = $registry;
	}

	public function __get($key) {
		return $this->registry->get($key);
	}

	public function __set($key, $value) {
		$this->registry->set($key, $value);
	}
	
	public function handleSubmit(){
		$handleForm=new Form();
		$handleForm->onSubmit();
	}
	
	public function uploadImage(){
		$ftype=$this->request->files['file']['type'];
		$fsize=$this->request->files['file']['size'];
		$fname=$this->request->files['file']['name'];
		$ftempName=$this->request->files['file']['tmp_name'];
		if(in_array($ftype, array("image/gif","image/jpeg","image/pjpeg","image/png","image/gif"))){
			if($fsize>500000){
				$this->response->setOutput("{\"result\":\"error\",\"info\":\"low size\"}");
			}else{
		
				if($this->request->files['file']['error']==0){
					$tsets=explode(".",$fname);
					$name1=$tsets[0];
					$name2=$tsets[1];
					$newName=time().".".$name2;
					$destination=DIR_IMAGE.$newName;
					$url=IMG_PREFIX_URL.$newName;
					if(move_uploaded_file($this->request->files['file']['tmp_name'], $destination)){
						$this->uploadImageSuccess($url);
					}else{
						$this->response->setOutput("{\"result\":\"error\",\"info\":\"store img error\"}");
					}
				}else{
					$this->response->setOutput("{\"result\":\"error\",\"info\":\"files error\"}");
				}
			}
		}else{
			$this->response->setOutput("{\"result\":\"error\",\"info\":\"invalid img format\"");
		}
	}
	function uploadImageSuccess($url){
		$this->response->setOutput("{\"result\":\"success\",\"url\":\"$url\"}");
	}
}