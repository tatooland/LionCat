<?php
	class OrmCommonSidebar extends Orm{
		public function getTableName(){
			return "`func_menu`";
		}
		public function i2b($int_val){
			return strval(decbin($int_val));
		}
		public function b2i($binary_val){
			return bindec($binary_val);
		}
		public function topLevel(){
			
		}
		/*
		 * list 1000 0000 0001 0100
		 * list 
		 * */
		protected function createTable(){
			return "
					create table `func_menu`(`id` int(11) not null auto_increment,`title` varchar(128) not null,
					`link` varchar(128) not null,`m_flag` varchar(32) not null,`p_id` int(11) not null,primary key(`id`))
					engine=innodb,charset=utf8;
					";
		}
	}