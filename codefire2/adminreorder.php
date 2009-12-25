<?php
include("includes/config.inc.php");
include(DOC_ROOT."/lib.php");
session_start();

if (!$_SESSION['logged_in'] == "admin"){
	header('Location: index.php?err=3');
	exit;
}

$sql_query = "SELECT * FROM userdata ORDER BY tpts DESC";
$result = $GLOBALS["DB"]->result($sql_query);

$rank = 0;
foreach($result as $res)
	{
	$rank += 1;
	$sql_query = "UPDATE userdata SET rank = $rank WHERE uno=$res[uno]";
	$GLOBALS["DB"]->execute($sql_query);
	}
	load_page("listsub.php");
?>