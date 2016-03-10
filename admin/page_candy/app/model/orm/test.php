<?php
class Modelormtest extends Model{
	public function getNameAndAge(){
		$query=$this->db->query("select `name`,`age` from users where id=1");
		return $query->row;
	}
}