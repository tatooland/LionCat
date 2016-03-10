<?php
	class Form extends object{
		public function __construct(){
			
		}
		public function buildTbl($tbl,$data=NULL){
			
		}
		public function buildForm($data){
			//if($this->dataVerify($data)){
			/*
				foreach($data as $i){
					
				}*/			
			return $this->load->controller("common/form",$data);
			//}
		}
		public function onSubmit(){
			//if(isset($this->request->post['_submit_']) && isset($this->request->post['_tbl_'])){
				$this->tableVerify();
			//}
		}
		protected function dataVerify($data){
			$columns=$this->db->query("show colmuns from $tbl");
			foreach ($data as $item){
				if(!in_array($item['column'], $columns)){
					return false;
				}
			}
			return true;
		}
		protected function tableVerify(){
			$table=$this->request->post['table'];
			$query=$this->db->query("SELECT table_name FROM information_schema.TABLES WHERE table_name ='$table'");
			if(SITE_MODEL=="develop"){
				if($query->num_rows==0){
					$this->createTableForm();
					echo "<p class='text-center text-danger'>table does not exisit</p>";
					echo "<button class='center-block btn btn-default btn-lg btn-danger'>create table</button>";
				}
			}else{
				if($query->num_rows==1){
					
				}else{
					echo "error in system! send error info to 1017583565@qq.com for help!";
				}
			}
		}
		protected function createTableForm(){
			//var_dump($this->request->post);
			$sql="";
			foreach($this->request->post as $key=>$val){
				if(strpos($key, "_")){
					echo $key."<br>";
				}
				//echo $key."<br>";
			}
			echo "
					<form method='post' action=''>
					</form>
					";
		}
	}
?>