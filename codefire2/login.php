<?php
include("lib.php");

	session_start(); 

	$userId = strtolower($_POST["T1"]);
	$password = strtolower($_POST["T2"]);

	$sql_query = "SELECT uno FROM userdata WHERE uid = '$userId' AND upwd = '$password'";
	$result = $GLOBALS["DB"]->result($sql_query);

	If ( $result[0]["uno"] != "" ) {
		$_SESSION['logged_in'] = $result[0]["uno"];
		header('Location: main.php');
		exit;
	} else {
		header('Location: index.php?err=2');
	}
?>
