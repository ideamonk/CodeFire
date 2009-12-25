<?php
include("lib.php");
session_start();
#if ($_SESSION['logged_in'] == "admin"){
	$uid = $_GET["uid"];
	$qid = $_GET["qid"];

	$sql_query = "SELECT * FROM subm WHERE uid=$uid AND qid=$qid";
	$result = $GLOBALS["DB"]->result($sql_query);
	
	$code = stripslashes($result[0]["code"]);
	
	$workfile = DOC_ROOT."/codetemp/".$uid.".cpp";;

	$fp = fopen( $workfile , "w");
	if(stripdanger(&$code))
		$cmptxt = "Banned word in code \n";
	fwrite($fp, $code);
	fclose($fp);
	
	$outf = DOC_ROOT."/codetemp/".$uid.".cpp_out.txt";
	$inpf = DOC_ROOT."/codetemp/".$uid.".cpp_inp.txt";
	$cmpf = DOC_ROOT."/codetemp/".$uid.".cpp_cmp.txt";
	$exef = DOC_ROOT."/codetemp/".$uid.".cpp.exe";
	
	$sql_query = "SELECT inpu, outp FROM quest WHERE qid=$qid";
	$result = $GLOBALS["DB"]->result($sql_query);
		
	$if = fopen($inpf , "w");
	fwrite($if , $result[0][inpu]);
	fclose($if);
	
	$exfile = "VBShack.exe ".$uid.".cpp";

	chdir("codetemp");
	unlink ("myshack.exe");
	copy ("pgcc.exe","myshack.exe");
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

	$outf = str_replace('/', '\\' , $outf);
	$inpf = str_replace('/', '\\' , $inpf);
	$cmpf = str_replace('/', '\\' , $xmpf);
	$exef = str_replace('/', '\\' , $exef);
	$workfile = str_replace('/', '\\' , $workfile);
	
	
	/*
	system("del ".$outf);
	system("del ".$inpf);
 	system("del ".$cmpf);
	system("del ".$exef);
	system("del ".$workfile);*/
	
#}else{
#	header('Location: index.php?err=3');
#	exit;
#	}
?>
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
<html>
<head>
<title>Code $details Output</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
</head>

<body>
<table width='90%' border='0' cellpadding='2' cellspacing='2' bgcolor='#F2F2F2'>
  <tr align='center' valign='top' bgcolor='#333333'> 
    <td><strong><font color='#FFFFFF' face='Arial, Helvetica, sans-serif'>Correct 
      Output</font></strong></td>
    <td><strong><font color='#FFFFFF' face='Arial, Helvetica, sans-serif'>User's 
      Output</font></strong></td>
  </tr>
  <tr align='center' valign='top' bgcolor='#FFFFFF'> 
    <td width='50%'>
	<textarea rows=15 cols=70><?= $result[0][outp] ?></textarea>
     </td>
    <td width='50%'>
	<textarea rows=15 cols=70><?= $outtxt ?></textarea>
     </td>
  </tr>
  <tr align='center' valign='top' bgcolor='#333333'> 
    <td><strong><font color='#FFFFFF' face='Arial, Helvetica, sans-serif'>Compiler Log</font></strong></td>
    <td><strong><font color='#FFFFFF' face='Arial, Helvetica, sans-serif'>Inputs</font></strong></td>
  </tr>
  <tr align='center' valign='top' bgcolor='#FFFFFF'> 
    <td><textarea rows=15 cols=70><?= $cmptxt ?></textarea></td>
    <td><textarea rows=15 cols=70><?= $result[0][inpu] ?></textarea></td>
  </tr>
	<tr>
		<td align="center"><input type="button" value="Close" onClick="javascript:window.close()"></td>
	</tr>
</table>
</body>
</html>