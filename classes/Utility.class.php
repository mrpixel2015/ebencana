<?php

/*
	

	@Author			:   		Frankis Ismail (Mrpixel)
	@Date			:			03 May 2016


*/



class Utility{
	private $db;

	
	public static function updateStockByID($idequip){
		$db = DataBase::getInstance();
		$isUpdate = false;
		
		if(is_object($db)){

			$selsql = "SELECT * FROM ".TBL_EQUIPMENTS." WHERE idequip=".(int)$idequip;
			$row = $db->executeSingle($selsql);
			if(is_array($row)){

				//echo $row['equip_curr_stock']." ".$row['equip_qty_rent']." ".$row['equip_damage']." ".$row['equip_balance'];

				$newqtyrent = (int)$row['equip_qty_rent']+1;
				$newbalance = ((int)$row['equip_curr_stock']-(int)$newqtyrent)-(int)$row['equip_damage'];

				$sqlupdate = "UPDATE ".TBL_EQUIPMENTS." SET equip_qty_rent=".(int)$newqtyrent.",equip_balance=".(int)$newbalance." WHERE idequip=".(int)$idequip;
				$res = $db->executeOperation($sqlupdate);

			}
		}
	}

	public static function getStockNameByStr($somestr){
		$db = DataBase::getInstance();

		$tmparr = array();

		$tmparr = explode(",",$somestr);
		$len = count($tmparr);

		$equipname = "";
		
		if(is_object($db)){
			for($i=0;$i<$len;$i++){
				$selsql = "SELECT equip_name FROM ".TBL_EQUIPMENTS." WHERE idequip=".(int)$tmparr[$i];
				$row = $db->executeSingle($selsql);
				$equipname .= $row['equip_name'].",";
			}

			$equipname = substr($equipname,0,-1);

		}
		return $equipname;
	}


}


?>