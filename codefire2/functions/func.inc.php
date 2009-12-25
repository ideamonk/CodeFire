<?php
function load_page($location){
	
	Header("Location: ".$location);
	exit;
	
}//load_page

function stripdanger($code){
	$danger = array("fstream", "fread", "fwrite", "fopen");
	$tcode = $code;
	foreach($danger as $dan)
		$code = str_replace( $dan , "Banned".$dan , $code);
	
	if (strcmp($tcode, code))
		return 1 ;
	else
		return 0;
}

?>