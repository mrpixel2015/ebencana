<?php


//include("DataBase.class.php");


class GetItemDetails{
	private $db;


	public static function getCategoryDetails($idcat){
		$db = DataBase::getInstance();
		$desccat = "";
		
		if(is_object($db)){
			$selcat = "SELECT * FROM ".TBL_CATEGORY." WHERE idcategory=".(int)$idcat;
			$row = $db->executeSingle($selcat);
			if(is_array($row)){
				$desccat = $row['catname'];
			}
		}
		return $desccat;
	}
	
	public static function getSubCategoryDetails($idcat,$idsubcat){
		$db = DataBase::getInstance();
		$descsubcat = "";
		
		if(is_object($db)){
			$selsubcat = "SELECT * FROM ".TBL_SUB_CATEGORY." WHERE idsubcategory=".(int)$idsubcat." AND idcategory=".(int)$idcat;
			$row = $db->executeSingle($selsubcat);
			if(is_array($row)){
				$descsubcat = $row['subname'];
			}
		}
		return $descsubcat;

	}
	
	public static function getInBalanceStock($idcat,$idsubcat){
		$db = DataBase::getInstance();
		$balstock = "";
		
		if(is_object($db)){
			$selstock = "SELECT * FROM ".TBL_STOCK." WHERE idsubcategory=".(int)$idsubcat." AND idcategory=".(int)$idcat;
			$row = $db->executeSingle($selstock);
			if(is_array($row)){
				$balstock = $row['qtybalanceinstock'];
			}
		}
		return $balstock;
	}

}


?>