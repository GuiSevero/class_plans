<?php 

class Helper
 {

   public static function generateToken()
   {
    	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$charactersLength = strlen($characters);
    	$randomString = '';

    	for ($i = 0; $i < 64; $i++) {
        	$randomString .= $characters[rand(0, $charactersLength - 1)];
    	}

    	return $randomString;
   }

}
