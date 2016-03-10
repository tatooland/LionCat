<?php 
	class OrmWebAppUser extends Orm{
		
		public function getTableName(){
			return "`wx_users`";
		}
		protected function createTable(){
			return "
					create table `wx_users`(`id` int(11) not null auto_increment,`true_name` varchar(32) not null,`sex` tinyint(2) not null,
					`birthday` varchar(16) not null, `area` varchar(64) not null,`signature` varchar(256) not null,`nick` varchar(64) not null,
					`head_img` varchar(128) not null,`qrcode` varchar(128),primary key(`id`))engine=innodb,charset=utf8;
					";
		}
		protected function initData(){
			return "";
		}
		public function getAllReciveMessage($mId){
			$this->db->query("
					select `wx_users`.nick,`wx_users`.head_img,Temp.msg from `wx_users`,(
						select `wx_message`.message as msg,`wx_message`.author_id as aid from `wx_users`,`wx_message`
						where `wx_message`.sendto_id=$mId and `wx_users`.id=`wx_message`.author_id) as Temp where Temp.aid=`wx_users`.id
					");
		}
		public function getAllReciveMessageProfile(){
			$mId=$this->id;
			$row=$this->db->query(
					"
				select 	nick,head_img,msg,time from(				
				                    select `wx_users`.nick,`wx_users`.head_img,Temp.msg,Temp.time from `wx_users`,(
										select `wx_message`.message as msg,`wx_message`.author_id as aid,`wx_message`.time from `wx_users`,`wx_message`
										where `wx_message`.sendto_id=$mId and `wx_users`.id=`wx_message`.author_id order by `wx_message`.id desc) as Temp where Temp.aid=`wx_users`.id  
				    ) as tableOut group by tableOut.nick
					"				
			);
			return $row->rows;
		}

	}
	/*
	 * select nick,head_img,msg from(				
                    select `wx_users`.nick,`wx_users`.head_img,Temp.msg from `wx_users`,(
						select `wx_message`.message as msg,`wx_message`.author_id as aid from `wx_users`,`wx_message`
						where `wx_message`.sendto_id=4 and `wx_users`.id=`wx_message`.author_id
					) as Temp 
					where Temp.aid=`wx_users`.id order by aid  desc limit 0,1 
    	) as tableOut 
    	group by tableOut.nick;
	 * 
	 * 
	 * */
?>