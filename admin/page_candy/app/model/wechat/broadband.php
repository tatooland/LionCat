<?php
class Modelwechatbroadband extends Model{
	public function getPackageType(){
		$city=$this->request->post['city'];
		$query=$this->db->query("select package_type from oc_ki_telecom_attribute where true and city='$city' group by package_type");
		return $this->buildJsonPkg($query->rows);
	}
	public function getImport(){
		$city=$this->request->post['city'];
		$package_type=$this->request->post['package_type'];
		$query=$this->db->query("select import from oc_ki_telecom_attribute where true and city='$city' and package_type='$package_type' group by import");
		return $this->buildJsoImport($query->rows);
	}
	public function getSpeed(){
		$city=$this->request->post['city'];
		$package_type=$this->request->post['package_type'];
		$import=$this->request->post['import'];
		$query=$this->db->query("select speed from oc_ki_telecom_attribute where true and city='$city' and package_type='$package_type' and import='$import' group by speed");
		return $this->buildJsonSpeed($query->rows);
	}
	public function getPayType(){
		$city=$this->request->post['city'];
		$package_type=$this->request->post['package_type'];
		$import=$this->request->post['import'];
		$speed=$this->request->post['speed'];
		$query=$this->db->query("select pay_type from oc_ki_telecom_attribute where true and city='$city' group by pay_type");
		return $this->buildJsonPayType($query->rows);
	}
	public function buildJsonPkg($a){
		$str="{\"result\":\"success\",\"data\":[";
		foreach($a as $i){
			$i=$i['package_type'];
			$str.="\"$i\",";
		}
		$str.="]}";
		return $str;
	}
	public function buildJsoImport($a){
		$str="{\"result\":\"success\",\"data\":[";
		foreach($a as $i){
			$i=$i['import'];
			$str.="\"$i\",";
		}
		$str.="]}";
		return $str;
	}
	public function buildJsonSpeed($a){
		$str="{\"result\":\"success\",\"data\":[";
		foreach($a as $i){
			$i=$i['speed'];
			$str.="\"$i\",";
		}
		$str.="]}";
		return $str;
	}
	public function buildJsonPayType($a){
		$str="{\"result\":\"success\",\"data\":[";
		foreach($a as $i){
			$i=$i['pay_type'];
			$str.="\"$i\",";
		}
		$str.="]}";
		return $str;
	}
	public function queryProduct(){
		$city=$this->request->post['city'];
		$package_type=$this->request->post['package_type'];
		$import=$this->request->post['import'];
		$speed=$this->request->post['speed'];
		$pay_type=$this->request->post['pay_type'];
		$query=$this->db->query("
				SELECT okta.id,okta.product_id,okta.info1,okta.promotion,okta.price
				FROM oc_ki_telecom_attribute okta
				WHERE
				okta.city='".$city."' AND
				okta.package_type='".$package_type."' AND
				okta.import='".$import."' AND
				okta.speed='".$speed."' AND
				okta.pay_type='".$pay_type."'
				");
		$r=array();
		$price=$query->row['price'];
		$info=$query->row['info1'];
		$telecomAttributeId=$query->row['id'];
		$str="{\"result\":\"success\",\"price\":\"$price\",\"info\":\"$info\",\"telecom_attribute_id\":\"$telecomAttributeId\"}";
		return $str;
	}
	public function insertRecord(){
		$user_name=$this->request->post['user_name'];
		$user_detail_address=$this->request->post['user_detail_address'];
		$user_phone=$this->request->post['user_phone'];
		$user_id_card=$this->request->post['user_id_card'];
		$agent=$this->request->post['agent'];
		$user_message=$this->request->post['user_message'];
		$telecom_attribute_id=$this->request->post['telecom_attribute_id'];
		$product_name=$this->request->post['product_name'];
		$user_area=$this->request->post['user_area'];
		$product_info=$this->request->post['product_info'];
		$setup_type=$this->request->post['setup_type'];
		$source=$this->request->post['source'];
		$query=$this->db->query("
					DELETE FROM oc_ki_product_preorder_kd WHERE user_id_card='".$user_id_card."'
				");
		$query=$this->db->query("INSERT INTO oc_ki_product_preorder_kd(
		telecom_attribute_id,product_name,product_info,setup_type,user_name,user_id_card,user_phone,user_area,user_detail_address,
		user_message,agent,preorder_time,source) VALUES(
			".$telecom_attribute_id.",
			'".$product_name."',
			'".$product_info."',
			'".$setup_type."',
			'".$user_name."',
			'".$user_id_card."',
			'".$user_phone."',
			'".$user_area."',
			'".$user_detail_address."',
			'".$user_message."',
			'".$agent."',
			'".date('Y-m-d H:i:s')."',
			'".$source."'
		)");
		if($query){
			return true;
		}else{
			return false;
		}	
	}
}