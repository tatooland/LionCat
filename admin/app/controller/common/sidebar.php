<?php
class ControllerCommonSidebar extends Controller{
	public function index($p=array()){
		
		$data=array();
		
		$data['childLabel']="";$data['parentLabel']="";
		if(isset($p['childLabel']))$data['childLabel']=$p['childLabel'];
		if(isset($p['parentLabel']))$data['parentLabel']=$p['parentLabel'];

		$fhandle=fopen("page_candy/txt/menu.json","a+");
		$data['menu']=json_decode(fread($fhandle,filesize("page_candy/txt/menu.json")));
		fclose($fhandle);
		return $this->load->view("common/sidebar.tpl",$data);
	}
}
?>
