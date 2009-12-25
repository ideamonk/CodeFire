<?php
include_once("lib.php");

session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
	header('Location: index.php?err=1');
	exit;
}else{
//$fname = $_POST["txtFname"];
//$email = $_POST["txtMail"];
$branch = $_POST["lstBranch"];
$lang = $_POST["txtLang"];
$about = $_POST["txtabout"];
$did = $_SESSION['logged_in'];

$sql_query = "UPDATE `prof` SET `branch` = '$branch', `lang` = '$lang' , `about` = '$about' WHERE `uid` = '$did'";
$GLOBALS["DB"]->execute($sql_query);
load_page("profile.php?id=".$did);

}
?>
