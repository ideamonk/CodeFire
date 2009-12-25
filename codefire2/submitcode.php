<?php
include_once("lib.php");

session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
	header('Location: index.php?err=1');
	exit;
	}

$code = addslashes($_POST["txtCode"]);
$did = $_SESSION['logged_in'];
$qid = $_POST["qid"];
$codename = $_POST["codename"];
$action = $_POST["action"];
$timex = date("G")*3600 + date("i")*60 + date("s");
if ( $code != "" )
{
	if ($action == "add" ){
		$sql_query = "INSERT INTO `subm` (`uid`, `codename` ,`code`, `date`, `qid`, `patt`, `status`, `time`) VALUES ('$did', '$codename' ,'$code', '".date ("y-m-j")."', '$qid', '1', 'p', '$timex')";
		$link = "main.php?message=1";
	}else{
		$sql_query = "UPDATE `subm` SET code = '$code', status='p', time = '$timex', date = '".date ("y-m-j")."' WHERE `uid` = '$did' AND `qid`='$qid'";
		$GLOBALS["DB"]->execute($sql_query);

		$sql_query = "SELECT patt FROM `subm` where uid=".$did." AND qid=".$qid.";";
		$result = $GLOBALS["DB"]->result($sql_query);
			$result[0]["patt"]+=1;
	
		$sql_query = "UPDATE `subm` SET `patt` = '".$result[0]["patt"]."' WHERE `uid` ='$did' AND `qid`='$qid';";
	
	$link = "main.php?message=2";
	}
$GLOBALS["DB"]->execute($sql_query);

		$sql_query = "SELECT att FROM `userdata` where uno=".$did.";";
		$result = $GLOBALS["DB"]->result($sql_query);
			$result[0][att]+=1;
		
		$sql_query = "UPDATE `userdata` SET `att` = '".$result[0][att]."' WHERE `uno` ='$did';";
		$GLOBALS["DB"]->execute($sql_query);

load_page($link);
}
?>