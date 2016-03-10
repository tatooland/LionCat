<?php
class Modelwechatmate extends Model{
	public function insert(){
		$name=$this->request->post['name'];
		$phone=$this->request->post['phone'];
		$idcard=$this->request->post['idcard'];
		$address=$this->request->post['address'];
		$source=$this->request->post['source'];
		$productName=$this->request->post['product_name'];
		$this->db->query("delete from mate_order where idcard='$idcard'");
		return $this->db->insertData("mate_order","`name`,`phone`,`idcard`,`address`,`order_time`,`order_status`,`deal_info`,`product_name`,`source`","'$name','$phone','$idcard','$address','".date("Y-m-d H:i:s")."','Œ¥¥¶¿Ì','<ø’>','$productName','$source'");
	}
}