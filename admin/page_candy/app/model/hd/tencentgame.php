<?php
class Modelhdtencentgame extends Model{
	public function getGameKey(){
		$userName=$this->request->post['user_name'];
		$userPhone=$this->request->post['user_phone'];
		if($this->db->haveData('game_nbr',"nbr='$userPhone'")){
			if($this->db->haveData('game_nbr',"nbr='$userPhone' and exchanged=0")){
				if($this->db->haveData('key',"used=0")){
					$result=$this->db->getDataRandom('key','id,game_key','used=0');
					$id=$result->row['id'];
					$key=$result->row['game_key'];
					if($this->db->updateData('key',"used=1,exchanged_time='$userPhone'","id=$id and game_key='$key'")){
						$this->db->updateData('game_nbr',"exchanged=1","nbr='$userPhone'");
						return $key;
					}else{
						return false;
					}
				}
			}else{
				return "exchanged";
			}
		}else{
			return "no nbr matched";
		}
	}
}