<?php
include_once("lib.php");
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
	header('Location: index.php?err=1');
	exit;
}

$link = "pass.php?";
$flag = 0;
$did = $_SESSION['logged_in'];
$old = $_POST["pssold"];
$new = $_POST["pssnew"];

$sql_query = "SELECT upwd FROM `userdata` WHERE uno = '$did'";
$result = $GLOBALS["DB"]->result($sql_query);

if ( !($result[0]["upwd"] == $old)){
	$link .= "err=2";
	$flag = 1;
	}

if ( $flag == 0){
	$sql_query = "UPDATE `userdata` SET `upwd` = '$new' WHERE `uno` = '$did'";
	$GLOBALS["DB"]->execute($sql_query);
	$link .= "err=1";
	}
	
load_page($link);
?>
