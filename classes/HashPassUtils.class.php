<?php

class HashPassUtils{
	
	/*
	public static function genenrate_salt(){
		$rndstring = "";
		$length = 64;
		$a = "";
		$b = "";
		$template = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		settype($length, "integer");
		settype($rndstring, "string");
		settype($a, "integer");
		settype($b, "integer");

		for ($a = 0; $a <= $length; $a++) {
			$b = rand(0, strlen($template) - 1);
			$rndstring .= $template[$b];
		}

		return $rndstring;
	}
	
	public static function genenerate_password($salt,$pass){
		$password_hash = '';

		$mysalt = $salt;
		$password_hash= hash('SHA256', "-".$mysalt."-".$pass."-");

		return $password_hash;
	}
	*/
	
	/*
	public static function HashPassword($password){
		$salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM)); //get 256 random bits in hex
		$hash = hash("sha256", $salt . $password); //prepend the salt, then hash
		//store the salt and hash in the same string, so only 1 DB column is needed
		$final = $salt . $hash;
		return $final;
	}	
	
	public static function ValidatePassword($password, $correctHash){
		$salt = substr($correctHash, 0, 64); //get the salt from the front of the hash
		$validHash = substr($correctHash, 64, 64); //the SHA256
	
		$testHash = hash("sha256", $salt . $password); //hash the password being tested
		
		//if the hashes are exactly the same, the password is valid
		return $testHash === $validHash;
	} 
	*/
	
	public static function HashPassword($username,$password){
		$salt = hash('sha256', uniqid(mt_rand(), true) . 'something random' . strtolower($username));
 
		// Prefix the password with the salt
		$hash = $salt . $password;
		 
		// Hash the salted password a bunch of times
		for ( $i = 0; $i < 100000; $i ++ ){
			$hash = hash('sha256', $hash);
		}
		 
		// Prefix the hash with the salt so we can find it back later
		$hash = $salt . $hash;	
		
		return $hash;
	}
	
	public static function RetHashPass($hashDB,$pass){
		$salt = substr($hashDB, 0, 64);
 
		$hash = $salt . $pass;
		 
		// Hash the password as we did before
		for ( $i = 0; $i < 100000; $i ++ ){
			$hash = hash('sha256', $hash);
		}
		 
		$hash = $salt . $hash;
		 
		return $hash;
		 /*
		if ( $hash == $r['hash'] )
		{
			// Ok!
		}	
		*/
	}

}


/*
function genenrate_salt(){
$rndstring = "";
$length = 64;
$a = "";
$b = "";
$template = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
settype($length, "integer");
settype($rndstring, "string");
settype($a, "integer");
settype($b, "integer");

for ($a = 0; $a <= $length; $a++) {
$b = rand(0, strlen($template) - 1);
$rndstring .= $template[$b];
}

return $rndstring;
}

function genenrate_password($salt,$pass){
$password_hash = '';

$mysalt = $salt;
$password_hash= hash('SHA256', "-".$mysalt."-".$pass."-");

return $password_hash;
}

$salt = genenrate_salt();
$plain_pass = "hello123"; ---any password/text collected from user input 

echo "My Hash Password Is: ".genenrate_password($salt , $plain_pass);
*/


?>