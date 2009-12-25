<?php
include("lib.php");
session_start();

if ($_SESSION['logged_in'] == "admin"){
	$uid = $_GET["uid"];
	$qid = $_GET["qid"];
	$points = $_GET["pts"];

	$sql_query = "SELECT * FROM subm WHERE uid=$uid AND qid=$qid";
	$result = $GLOBALS["DB"]->result($sql_query);
		
	$code = stripslashes($result[0]["code"]);
	
	$workfile = "F:\\xampp\\htdocs\\www\\codetemp\\".$uid.".cpp";
	
	$fp = fopen($workfile , "w");
	if(stripdanger(&$code))
		$cmptxt = "Banned word in code \n";
	fwrite($fp, $code);
	fclose($fp);
	
	$outf = "F:\\xampp\\htdocs\\www\\codetemp\\".$uid.".cpp_out.txt";
	$inpf = "F:\\xampp\\htdocs\\www\\codetemp\\".$uid.".cpp_inp.txt";
	$cmpf = "F:\\xampp\\htdocs\\www\\codetemp\\".$uid.".cpp_cmp.txt";
	$exef = "F:\\xampp\\htdocs\\www\\codetemp\\".$uid.".cpp.exe";
	
	$sql_query = "SELECT inpu, outp FROM quest WHERE qid=$qid";
	$result = $GLOBALS["DB"]->result($sql_query);
		
	$if = fopen($inpf , "w");
	fwrite($if , $result[0][inpu]);
	fclose($if);
	
	$exfile = "F:\\xampp\\htdocs\\www\\codetemp\\VBShack.exe ".$uid.".cpp";
	chdir("F:\\xampp\\htdocs\\www\\codetemp\\");
	
	shell_exec($exfile);
	chdir("..");
	
	if (filesize($cmpf) > 0){
		$cf = fopen($cmpf , "r");
		$cmptxt .= fread($cf , filesize($cmpf));
		fclose($cf);
		}
	
	if (filesize($outf) > 0){
		$of = fopen($outf , "r");
		$outtxt = fread($of , filesize($outf));
		fclose($of);
		}
	
	$count = 0;
	$xcount = 0;
	
	$cfile = fopen($inpf , "r");
	$ofile = fopen($outf , "r");

	
	$cTxt = fgets($cfile, 1023);
	while (!feof($ofile)){
		$oTxt = fgets($ofile, 1023);
			$xcount++;
		if(eregi($cTxt, $oTxt)){
			$cTxt = fgets($cfile, 1023);
			$count++;
			}
		}

	fclose($ofile);
	fclose($cfile);

	system("del ".$outf);
	system("del ".$inpf);
 	system("del ".$cmpf);
	system("del ".$exef);
	system("del ".$workfile);
	
	if ($count == $xcount)
		echo "admindesc.php?stat=a&id=$result[0][id]&uid=$result[0][uid]&pt=".$points;
	else
		load_page("admindesc.php?stat=w&id=$result[0][id]&pt=0");

}else{
	header('Location: index.php?err=3');
	exit;
}
?>