<?php
include("includes/adminheader.inc.php");

$pts = $_POST["pts"];
$name = $_POST["name"];
$code = $_POST["code"];
$type = $_POST["type"];
$desc = $_POST["desc"];
$inpu = $_POST["inpu"];
$outp = $_POST["outp"];

if ($desc != NULL)
	{
	$sql_query = "INSERT INTO `quest` (`pts`, `name`, `code`, `type`, `desc` ,`date`, `inpu`,`outp`) VALUES ('$pts' , '$name' , '$code', '$type', '$desc' ,'".date ("y-m-d")."', '$inpu','$outp')";
	//echo $sql_query;
	echo "<center><b>Submitted..!!!</b></center>";
	$GLOBALS["DB"]->execute($sql_query);
	}
?>
<html>
<head>
<title>:: Admin :: Add Problems ::</title>
</head>
<table width="80%" border="0" align="center" cellpadding="2" cellspacing="2" bgcolor="#C0C0C0">
  <tr> 
    <td background="images/header.jpg"><strong><font color="#FFFFFF" size="4" face="Arial, Helvetica, sans-serif">+ 
      Add Problem</font></strong></td>
  </tr>
  <form method="POST" action="">
    <tr> 
      <td height="29" align="left" valign="top" bgcolor="#FFFFFF"> <strong><font size="2" face="Geneva, Arial, Helvetica, sans-serif">Points 
        : 
        <input name="pts" type="text" value="200" size="7" length="8">
        Name : 
        <input type="text" length="30" name="name">
        &nbsp;&nbsp;Code : 
        <input name="code" type="text" size="8" length="20">
        </font></strong><font size="2" face="Geneva, Arial, Helvetica, sans-serif"> 
        <font color="#666666" size="1">(Short code for prob)</font><strong>&nbsp;&nbsp;Type : 
        <select name="type" size="1" id="type">
          <option value="b">Beginner</option>
          <option value="i">Intermediate</option>
          <option value="a">Advanced</option>
        </select>
        </strong></font> </td>
    </tr>

  <tr> 
    <td bgcolor="#CCCCCC"><strong><font size="4" face="Arial, Helvetica, sans-serif">+ 
      Description</font></strong></td>
  </tr>
  <tr> 
      <td align="left" valign="top" bgcolor="#EFEFEF"> 
        <textarea name="desc" rows="15"cols="100"></textarea> 
    </td>
  </tr>
  <tr> 
      <td bgcolor="#CCCCCC"><strong><font size="4" face="Arial, Helvetica, sans-serif">+ 
        Test Inputs</font></strong></td>
  </tr>
  <tr> 
      <td align="left" valign="top" bgcolor="#EFEFEF"> 
        <textarea name="inpu" rows="10"cols="100"></textarea> 
    </td>
  </tr>
  <tr> 
      <td bgcolor="#CCCCCC"><strong><font size="4" face="Arial, Helvetica, sans-serif">+ 
        Test Output</font></strong></td>
  </tr>
  <tr> 
      <td align="left" valign="top" bgcolor="#EFEFEF"> 
        <textarea name="outp" rows="10"cols="100"></textarea>
      </td>
  </tr>
  <tr> 
    <td align="left" valign="top"> 
      <input type="submit" name="Submit" value="Submit"></td>
</from>
  </tr>
</table>
</html>