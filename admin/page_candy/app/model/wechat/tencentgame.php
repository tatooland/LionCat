<?php
class Modelwechattencentgame extends Model{
	public function insertOrder($i){
		$userName=$i['user_name'];
		$userPhone=$i['user_phone'];
		$userIdCard=$i['user_idcard'];
		$userIfreeNbr=$i['user_ifreenbr'];
		$userAddress=$i['user_address'];
		$imgs=$i['imgs'];
		
		if(!$this->db->haveData('t_order',"user_idcard='$userIdCard'")){
			if($this->db->haveData('t_ifree',"`using`=0 and ifree_nbr='$userIfreeNbr'")){
				$this->db->updateData('t_ifree',"`using`=1","ifree_nbr='$userIfreeNbr'");
				$r=$this->db->getData('t_ifree','id',"ifree_nbr='$userIfreeNbr'");
				$ifreeId=$r->row['id'];
				$time=date("Y-m-d H:i:s");
				$result=$this->db->insertData('t_order'
						,"user_name,user_phone,user_idcard,ifree_id,key_id,deal_info,user_address,time"
						,"'$userName','$userPhone','$userIdCard','$ifreeId','0','','$userAddress','$time'");
				$torderId=$this->db->getLastId();
				foreach($imgs as $img){
					$this->db->insertData('t_imgs',"order_id,url","$torderId,'$img'");
				}
				return $result;
			}
		}else{
			return "have ordered";
		}
	}
	//获取cd-key－－》
	/* 判断当前用户是否领取过key
	 * 首先判断判断ifree号码是否正确
	 * 判断用户信息是否输入正确
	 * 判断是否还有当前类型的key
	 * 
	 * */
	public function getGameKey($i){
		$userName=$i['userName'];
		$userIfreeNbr=$i['userIfreenbr'];
		$userIdCard=$i['userIdCard'];
		$keyType=$i['keyType'];
		$r=$this->db->query("select tot.id from t_order tot left join t_ifree tif on tif.id=tot.ifree_id 
				where tot.user_idcard='$userIdCard' and tot.user_name='$userName' and tot.ifree_id<>0");
		if(isset($r->row['id'])){
			$q=$this->db->getData('t_ifree','id',"ifree_nbr='$userIfreeNbr'");
			if(isset($q->row['id'])){
				$ifreeId=$q->row['id'];
				if($this->db->haveData('t_order',"`enable`=1 and user_name='$userName' and user_idcard='$userIdCard' and ifree_id=$ifreeId and key_id=0")){
					if($this->db->haveData('t_key',"`type`=$keyType and `using`=0")){
						$q1=$this->db->getDataRandom('t_key',"`key`,`id`","`type`=$keyType and `using`=0");
						$keyId=$q1->row['id'];
						$key=$q1->row['key'];
						$this->db->updateData('t_key',"`using`=1","id=$keyId and type=$keyType");
						
						$this->db->updateData('t_order',"key_id=$keyId,key_type=$keyType","user_name='$userName' and user_idcard='$userIdCard' and ifree_id=$ifreeId");
						return $key;
					}else{
						return "key of keytype have no inventory";//您要领取的key已经领完了，去领个其他的吧！
					}
				}else{
					//判断是否领取过
					$rk=$this->db->query("select `key` from t_order tot left join t_key tk on tot.key_id=tk.id where user_idcard='$userIdCard' and user_name='$userName'");
					if(isset($rk->row['key'])){
						$key=$rk->row['key'];
						return "you have key $key";//您已领取过key
					}else{
						return "wait enable";//请等待受理
					}
				}
			}else{
				return "ifree nbr error";//输入的ifree卡号有误
			}
		}else{
			return "input error or no ifree nbr";//输入信息有误或者还未办理ifree预约
		}
		
	}
	public function getIfreeNbr(){
		$q=$this->db->getDatasRandom('t_ifree','ifree_nbr','`using`=0',10);
		return $q->rows;
	}
	/*
	 * create table `t_order`(`id` int(11) not null auto_increment,`user_name` varchar(32) not null,`user_phone` varchar(11) not null,`user_idcard` varchar(18) not null,`ifree_id` int(11) not null,`key_id` int(11) not null,`key_type` tinyint(4) default '0',`enable` tinyint(4) default '0',`deal_info` varchar(256),`time` varchar(16),primary key (`id`)) engine=InnoDB default charset=utf8;

create table `t_ifree`(`id` int(11) not null auto_increment,`ifree_nbr` varchar(11) not null,`using` tinyint(4) not null default '0',primary key (`id`)) engine=InnoDB default charset=utf8;

create table `t_key`(`id` int(11) not null auto_increment,`key` varchar(64) not null,`type` int(11) not null default '1',primary key (`id`)) engine=innodb default charset=utf8;
create table `t_imgs`(`id` int(11) not null auto_increment,`order_id` int(11) not null,`url` varchar(128) not null,primary key (`id`)) engine=innodb default charset=utf8;
	 * */
}