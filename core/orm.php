<?php 
abstract class Orm{
	protected $db;
	protected $response;
	protected $request;
	protected $id=NULL;
	public $debug=false;
	
	protected $property=array();
	protected $ary="";//for create update
	abstract protected function getTableName();
	public function __construct($db,$response,$request){
		$this->db=$db;
		$this->response=$response;
		$this->request=$request;
	}
	public function __set($name,$val){
		$this->property[$name]=$val;
	}
	public function __get($name=NULL){
		/*
		$table=$this->getTableName();
		if($name!==NULL){
			$query=$this->db->query("select $name from $table where id=".$this->id);
			return $query->row["$name"];
		}*/
	    //echo "get method";
	    if($name=="id") 
	        return $this->id;
	    else
		  return $this->property[$name];
	}
	protected function createTable(){
		
	}
	public function __getTableName(){
		
		$table=$this->getTableName();
		if($this->debug){
			$table=str_replace("`","",$table);
			$q=$this->db->query("select count(table_name) as count  from information_schema.tables where table_name='$table'");
			//var_dump($q);
			//echo $q->row['count'];
			if(intval($q->row['count'])==0){
				$qu=$this->db->query($this->createTable());
				
			}
		}
		return $table;
	}
	public function find($keyId=NULL){
		$table=$this->__getTableName();
		if($keyId!==NULL){
			if(is_int($keyId)){
				$this->id=$keyId;
				$query=$this->db->query("select * from $table where id=".$this->id);
				foreach($query->row as $key=>$val){
					$this->property[$key]=$val;
				}
			}else if(is_array($keyId)){
				
				$condition=$this->buildCondtion($keyId);
				$query=$this->db->query("select * from $table where $condition");
				//var_dump("select * from $table where $condition");
				foreach ($query->row as $key=>$val){
				    if($key=="id")$this->id=$val;
					$this->property[$key]=$val;
				}
				//var_dump($this->property);
			}
		}
		return $this;
	}

	public function all($condition="true"){
		$table=$this->__getTableName();
		if(is_array($condition)){
			$condition=$this->buildCondtion($condition);
		}
		$query=$this->db->query("select * from $table where $condition;");
		return $query->rows;
	}
	public function create(){
		$this->id=-1; 
		return $this;
	}
	public function flush($condition=NULL){
		$table=$this->__getTableName();
		$columns="";
		$values="";
		if($this->id!=-1 && $this->id!==NULL){//update
			$idx=0;
			$token="";
			foreach($this->property as $key=>$val){
				if($key=="id"){
					continue;
				}else{
					$idx++;
					$token.="`$key`='$val',";
				}
			}
			if($idx!=0){
				$token=substr($token, 0,strlen($token)-1);
				//$values=substr($values,0,strlen($values)-1);
			}
			
			$where="true";
			if($condition!==NULL){
				$idx=0;
				foreach($condition as $key=>$val){
					$idx++;
					$where.=" and `$key`='$val' ";
				}
			}
			
			$query=$this->db->query("update  $table set $token where $where and id=".$this->id);
			
		}else{
			$idx=0;
			foreach($this->property as $key=>$val){
				$idx++;
				$columns.="`$key`,";
				if(strpos($val,'0x')!==false){
				    //$val=str_replace('0x','',$val);
				    $values.="$val,";				    
				}else if(strpos($val,'_decrypt')!==false && strpos($val,'_encrypt')!==false ){
				    $values.="$val,";
				}else{
				    $values.="'$val',";
				}
			}
			
			if($idx!=0){
				$columns=substr($columns, 0,strlen($columns)-1);
				$values=substr($values,0,strlen($values)-1);
			}
			//var_dump("insert into $table($columns) values($values)");
			$query=$this->db->query("insert into $table($columns) values($values)");
			$this->id=$this->db->getLastId();
			
		}
		
		//$query=$this->db->query("insert into `$table`($columns) values($values)");
	}
	public function delete($condition=NULL){
		$cond="";
		$table=$this->__getTableName();
		if($condition!==NULL){
			$cond=$this->buildCondtion($condition);
		}else{
			if($this->id!==NULL && $this->id!=-1){
				$this->db->query("delete from $table where id=".$this->id);
			}
		}
		
	}
	private function buildCondtion($condition=NULL){
		$where="true";
		if($condition!==NULL){
			$idx=0;
			foreach($condition as $key=>$val){
				$idx++;
				if(strpos($val,"0x")===false)
				    $where.=" and $key='$val' ";
				else 
				    $where.=" and $key=$val";
			}
		}
		return $where;
	}
	public function hasOne($orm1,$foreign_key,$id="id",$condition=NULL){
		$table=$orm1->getTableName();
		if($id=="id"){
			$cond=$this->buildCondtion($condition);
			$mTable=$this->__getTableName();
			$mId=$this->id;
			$rows=$this->db->query("select $mTable.*,$table.* from $mTable left join  $table on $mTable.id=$table.$foreign_key where $mTable.id=$mId and $cond");
			$resultAry=array();
			foreach($rows->rows as $key=>$val){
				$resultAry[$key]=$val;
			}
			return $resultAry;
		}
	}
	public function update($ary,$condition=" true"){
	    /*
	    $setval="true";
	    $mTable=$this->__getTableName();
	    foreach($ary as $key=>$val){
	        if(is_string($val)){
	           $condition.=" $key='$val',";
	        }else if(is_int($val)){
	            $condition.=" and $key=$val";
	        }
	    }
	    $row=$this->db->query("update $mTable set ");
	    */
	}
	public function hasMang(){
		
	}
	public function group($col){
			$mTable=$this->__getTableName();
			$query=$this->db->query("select $col from $mTable group by $col;");
			return $query->rows;
	}
}
?>
