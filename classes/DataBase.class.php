<?php
/**
*
*	@Author 	:	Frankis Ismail(Mrpixel)
*	@Title		:	Singleton Class DB 
*	@Date/Time	:	5/03/2014
*	@Desc		:	Handling database connections by implements patterns Singleton
*
*/

include("constant.php");

class DataBase{

	/*=====================================================================================		
		     Singleton Instance
	=======================================================================================*/
	private static $db_Instance;
	private $numRows;
	
	/*
		@CLASS CONSTRUCTORS
	*/
	private function __construct(){
		//echo "Constructor call.....<br />\n"; 
		if(is_null(self::$db_Instance)){
			/*=====================================================================================		
		                 connection database attemptions here
	         =======================================================================================*/
			mysql_connect(DB_SERVER, DB_USER, DB_PASS, self::$db_Instance) or die("Could Not Connect to Database");
			//mssql_connect(DB_SERVER, DB_USER, DB_PASS) or die("Could Not Connect to Database");
			mysql_select_db(DB_NAME) or die("Failed Selecting DB");
            /*=====================================================================================		
		                 Stating object was instantiating here
	         =======================================================================================*/
			self::$db_Instance = "not null";
		}//end if
	}
	/*=====================================================================================		
		                 Returns Singleton Database instance here :P
	=======================================================================================*/	
	public static function getInstance(){
		if (!self::$db_Instance){
			self::$db_Instance = new DataBase();
		}

		return self::$db_Instance;
	}
	
   /*=====================================================================================		
		                 Descontructor by NUll the DB instance
   =======================================================================================*/
   public function __destruct( ){
		if(isset(self::$db_Instance)){
			self::$db_Instance = NULL;
			mysql_close();
		}//end if
	}
    /*=====================================================================================		
		      For Add/Delete/Update opreations purpose (return Boolean)
    =======================================================================================*/
	public function executeOperation($Query_String){
		$Query_ID = mysql_query($Query_String) or die("Error");
		if(!$Query_ID){
			return false;
		}else{
			return true;
		}//end if..else
	}
   

	/*=====================================================================================		
		    Return result in 2D array (returning Boolean)
    =======================================================================================*/
	public function executeGrab($Query_String){
		$Resource = mysql_query($Query_String);
		if(!$Resource){
			return false;
		}else{
			$this->numRows = mysql_num_rows($Resource);
			$DataSet = array();
			//turn mysql resource into 2D array and return
			while($Record = mysql_fetch_array($Resource)){
			    //push into 2D Array
				array_push($DataSet, $Record);
			}//end while
			return $DataSet;
		}//end if ..else
    }
	/*=====================================================================================		
			Return single Row as Single Array
    =======================================================================================*/
	public function executeSingle($Query_String){
		$Resource = mysql_query($Query_String);
		if(!$Resource){
			return false;
		}else{
			//turn mysql resource into an array
			$this->numRows = mysql_num_rows($Resource);
			$DataRow = mysql_fetch_array($Resource);
			return $DataRow;
		}//end if..else
	}
	
	public function returnOperation($Query_String){
		$Resource = mysql_query($Query_String);
		return $Resource;
	}
	
	public function getNumRow(){
		return $this->numRows;
	}
}

?> 