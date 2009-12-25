<?php
include("includes/config.inc.php");
include(DOC_ROOT."/lib.php");
session_start();

if ($_SESSION['logged_in'] != "admin")
{
	header('Location: index.php?err=3');
	exit;
}

?>
<html>
<head>
<title>:: Admin Panel ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
a {
	text-decoration: none;
}
-->
</style>
</head>
<body link="#CC0000" vlink="#990000" alink="#993300">
<table width="90%" border="0" align="center" cellpadding="2" cellspacing="2" bgcolor="#E5E5E5">
  <tr> 
    <td bgcolor="#FFFFFF">
<div align="center"><img src="images/title.jpg" width="800" height="120"></div></td>
  </tr>
  <tr>
    <td background="images/header.jpg"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><strong>+ 
      Administration Panel</strong></font></td>
  </tr>
  <tr> 
    <td><div align="center"><font size='2' color="green"><b><a href="adminmain.php"><font size="6" face="Geneva, Arial, Helvetica, sans-serif">Home&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></a><font size='2' color="green"><b><a href="addnews.php"><font size="6" face="Geneva, Arial, Helvetica, sans-serif">Add 
        News</font></a><font face="Geneva, Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        <font size="6"><a href="addproblem.php">Add Problem</a></font></font></b><font face="Geneva, Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        </font></font><font color="green" size='6' face='Geneva, Arial, Helvetica, sans-serif'><b><a href="listsub.php">List 
        Submissions&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><font size='2' color="green"><b><a href="logout.php"><font size="6" face="Geneva, Arial, Helvetica, sans-serif">Logout
	</font></a></b> </font></div></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFFF">