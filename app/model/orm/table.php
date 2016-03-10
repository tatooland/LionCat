<?php
class Modelormtable extends Model{
	public function getTableData($sql){
		
		$query=$this->db->query($sql);
		
		return $query->rows;
	}
}