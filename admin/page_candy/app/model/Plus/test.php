<?php
class ModelPlustest extends Model{
	public function debug(){
		
	}
	public function insertUserInfo(){
		$userName=$this->request->post['user_name'];
		$userPhone=$this->request->post['user_phone'];
		$userAddress=$this->request->post['user_address'];
		$query=$this->db->query("
				insert into `form_test`(`user_name`,`user_phone`,`user_address`)
				values('$userName','$userPhone','$userAddress')
		");
		var_dump($query);
		if($query){
			return true;
		}else{
			return false;
		}
	}
	public function update($i){
		$id=$i['id'];
		$ifree_nbr=$i['ifree_nbr'];
		$using=$i['using'];
		$query=$this->db->query("update t_ifree set `ifree_nbr`='$ifree_nbr',`using`=$using where id=$id");
		return $query;
	}
}