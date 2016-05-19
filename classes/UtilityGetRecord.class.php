<?php

/*

	@Date			:			11 January 2016


*/

class UtilityGetRecord{
	private $db;

	

	public static function getTotalEquipments(){
		$db = DataBase::getInstance();
		
		$roomtypedesc = "";
		
		if(is_object($db)){
			$selectsql = "SELECT * FROM ".TBL_EQUIPMENTS;
			$row = $db->executeGrab($selectsql);
			
			if(is_array($row)){
				$count = count($row);
			}
		}
		return $count;
	}
	
	public static function getTotalCustomers(){
		$db = DataBase::getInstance();
		
		$roomtypedesc = "";
		
		if(is_object($db)){
			$selectsql = "SELECT * FROM ".TBL_CUSTOMER;
			$row = $db->executeGrab($selectsql);
			
			if(is_array($row)){
				$count = count($row);
			}
		}
		return $count;
	}
	
	public static function getTodayRegistered(){
		$db = DataBase::getInstance();
		
		if(is_object($db)){
			$selectsql = "SELECT cust_registered_datetime FROM ".TBL_CUSTOMER." WHERE DATE(cust_registered_datetime) = DATE(NOW())";
			$row = $db->executeGrab($selectsql);
			
			if(is_array($row)){
				$count = count($row);
			}
		}
		return $count;
	}
	
	
	
}






?>