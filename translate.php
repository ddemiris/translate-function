
function trnslt($string,$ref_id=false,$language_id=false){

if ($language_id){ // in case we call the function of specific language_id
	$tmps    	= mysql_query("SELECT message FROM lang_messages WHERE help_ref='$ref_id' and language_id='$language_id' ");
	$tmp     	= mysql_fetch_array($tmps);   
	$message	= $tmp["message"];
	return $message;

}else{ // else we read the files from the session variable

define('APP_DIR', '/var/www/perseas.net/web');	
require(APP_DIR.'/language/'.$_SESSION["LANGUAGE"].'.php');	

	if (!$lang[$string]){ // if we can't find the string for translation we return the original string
		return $string;  
		    }else{
		$string_translated = $lang[$string];
		$string_translated = trim(str_replace(array("\r\n","\r"),"",$string_translated));		
		return $string_translated; 	
	}

	
	}
	
}
