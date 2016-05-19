<?php

/**
*
*	@Author			:	Frankis Ismail Mrpixel
*	@Title			:	FeedCBUtility utility class
*	@Date/time		:	Tuesday 16/04/2011
*	@Update			:	Thursday 12/04/2012
*	@Description	: 	Class Utility for feed combobox list 
*						Usage ;  
*
*							FeedCBUtility::feedCBWithValue('your_desired_tablename',array("field1","field2"),'your_cb_instance_name','options others');
*
*						Example;
*
*							FeedCBUtility::feedCBWithValue('your_desired_tablename',array("CODE","DESCRIPTION"),'your_cb_instance_name'); --> no options others
*
*							FeedCBUtility::feedCBWithValue('your_desired_tablename',array("CODE","DESCRIPTION"),'your_cb_instance_name',true); --> have options others
*
*/

//include("classes/DataBase.class.php");


class FeedCBUtility{
	private $db;

	public static function feedCBWithValue($tblname,array $opsnvalfield,$cbname,$optothers=false){
		
		$db = DataBase::getInstance();
		if(is_object($db)){
			$sql = "SELECT * FROM ".$tblname;
			$row = $db->executeGrab($sql);
			if(is_array($row)){
				$len = count($row);
				echo "<select name='$cbname' id='$cbname' class='form-control'>\n";
				echo "<option>-- Sila pilih --</option>\n";
				for($i=0;$i<$len;$i++){
					echo "<option value='".$row[$i][$opsnvalfield[0]]."'>".$row[$i][$opsnvalfield[1]]."</option>\n";	
				}
			}
		
					echo ($optothers)?"<option>Lain-lain</option>\n":'';
						
					echo "</select>\n";	
		}

	}
	
	
	
/*	public static function feedCBEditCategory($tblname,$val,$cbname){
		
		$db = DataBase::getInstance();
		if(is_object($db)){
			$querygrab = "SELECT DISTINCT idkat,catname FROM ".$tblname;
			$row = $db->executeGrab($querygrab);
			if(is_array($row)){
				$len = count($row);
				echo "<select name=\"{$cbname}\" id=\"{$cbname}\" class='form-control'>\n";
					echo "<option>-- Sila pilih --</option>\n";
					for($i=0;$i<$len;$i++){
						if((int)$val == $row[$i]['idkat']){
							echo "<option value='".$row[$i]['idkat']."' selected='selected'>".$row[$i]['catname']."</option>\n";		
						}else{
							echo "<option value='".$row[$i]['idkat']."'>".$row[$i]['catname']."</option>\n";		
						}
					}
				echo "</select>\n"; 
			}
		}
		
	}
	*/

}
						
?>
