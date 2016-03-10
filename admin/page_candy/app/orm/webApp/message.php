<?php 
	class OrmWebAppMessage extends Orm{
		
		public function getTableName(){
			return "`wx_message`";
		}
		protected function createTable(){
			return "
					create table `wx_message`(`id` int(11) not null auto_increment,
					`author_id` int(11) not null,`sendto_id` int(11) not null,
					`message` text not null,`time` varchar(16) not null,primary key(`id`))
					engine=innodb,charset=utf8;
					";
		}
		protected function initData(){
			
		}
	}
?>