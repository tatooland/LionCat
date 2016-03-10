<?php
class DB {
	private $db;

	public function __construct($driver, $hostname, $username, $password, $database) {
		$class = 'DB\\' . $driver;

		if (class_exists($class)) {
			$this->db = new $class($hostname, $username, $password, $database);
		} else {
			exit('Error: Could not load database driver ' . $driver . '!');
		}
	}

	public function query($sql) {
		return $this->db->query($sql);
	}

	public function escape($value) {
		return $this->db->escape($value);
	}

	public function countAffected() {
		return $this->db->countAffected();
	}

	public function getLastId() {
		return $this->db->getLastId();
	}
	public function haveData($table,$condition=true){
		$q=$this->db->query("select count(*) AS amount from `$table` where $condition");
		if($q->row['amount']>0){
			return true;
		}else{
			return false;
		}
	}
	public function getDataRandom($table,$output,$condition=true){
		return $this->db->query("select $output from `$table` where $condition  order by rand() limit 1");
	}
	public function getDatasRandom($table,$output,$condition=true,$amount=1){
		$q=$this->db->query("select $output from `$table` where $condition  order by rand() limit $amount");
		return $q->rows;
	}
	public function getData($table,$output,$condition=true){
		return $this->db->query("select $output from `$table` where $condition");
	}
	public function updateData($table,$input,$condition=true){
		return $this->db->query("update `$table` set $input where $condition");
	}
	public function insertData($table,$col,$data){
		return $this->db->query("insert into `$table`($col) values($data)");
	}
}
