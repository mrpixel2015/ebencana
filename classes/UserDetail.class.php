<?php

/**
*
*	@Author 	:	Frankis Ismail (Mrpixel)
*	@Title		:	Utility Class
*	@Date/Time	:	06 August 2015 
*	@Desc		:	UserDetail Class - to store all user details information
*
*/


include("DataBase.class.php");

class UserDetail{
	private $__FULLNAME;
	private $__ICNO;
	private $__POSITION;
	private $__DEPARTMENT;
	private $__PHONE;
	private $__EMAIL;
	private $__SALARYNO;
	
	
	//public static function getUserDetail($sno){
	public function __construct($sno){
		
		$db = DataBase::getInstance();
		if(is_object($db)){
			$sql = "SELECT * FROM ".VIEW_USERDETAILS." WHERE salaryno='".$sno."'";
			try{
				$row = $db->executeSingle($sql);
				if($row){
					$this->__FULLNAME =  $row['fullname'];
					$this->__ICNO = $row['icno'];
					$this->__POSITION = $row['positiondesc'];
					$this->__DEPARTMENT = $row['departdesc'];
					$this->__PHONE = $row['phone'];
					$this->__EMAIL = $row['email'];
					$this->__SALARYNO = $row['salaryno'];
				}
			}catch(Exception $e){
				throw new Exception("Message :".$e->getMessage());
				exit();
			}
		}
		
	}
	
	public function FULLNAME(){
		return $this->__FULLNAME;
	}
	
	public function ICNO(){
		return $this->__ICNO;
	}
	
	public function POSITION(){
		return $this->__POSITION;
	}
	
	public function DEPARTMENT(){
		return $this->__DEPARTMENT;
	}
	
	public function PHONE(){
		return $this->__PHONE;
	}
	
	public function EMAIL(){
		return $this->__EMAIL;
	}
	
	public function SALARYNO(){
		return $this->__SALARYNO;
	}
	
	
}

?>