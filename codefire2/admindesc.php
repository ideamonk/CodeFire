<?php
include("includes/config.inc.php");
include(DOC_ROOT."/lib.php");
//session_start();
if ($_SESSION['logged_in'] == "admin")
{
	if(!isset($_GET["stat"]) && !isset($_GET["id"]) && !isset($_GET["pt"]))
	{echo "What do you want";
	}else{
	$stat = $_GET["stat"];
	$id = $_GET["id"];
	$pts = $_GET["pt"];
	$uid = $_GET["uid"];
	}
	//$id = $uid;
	$sql_query = "SELECT * FROM userdata WHERE uno=$uid";
	$cat = $GLOBALS["DB"]->result($sql_query);
	$waat = $cat[0][wat];
	$cat = $cat[0][cat];
	if($stat == 'a')
		{
		$sql_query = "UPDATE subm SET `status`='s',`points`='$pts' WHERE `id`='$id'";
		$cat += 1;
		$GLOBALS["DB"]->execute($sql_query);
		
		$sql_query = "SELECT * FROM userdata WHERE `uno`='$uid'";
		$result = $GLOBALS["DB"]->result($sql_query);
		$total = $result[0][tpts] + $pts;
		$ats = $result[0][att] +1;
		$sql_query = "UPDATE `userdata` SET `att`= '$ats', `tpts` = '$total', `cat` = '$cat', `wat` = '$waat' where `uno`='$uid'";
		$GLOBALS["DB"]->execute($sql_query);
		echo $sql_query;
		}
	else if($stat == 'w'){
		$sql_query = "UPDATE `subm` SET `status`='w',points=0 WHERE `id`='$id'";
		$waat += 1;
		$GLOBALS["DB"]->execute($sql_query);
		
		$sql_query = "SELECT * FROM userdata WHERE `uno`='$uid'";
		$result = $GLOBALS["DB"]->result($sql_query);
		$total = $result[0]["tpts"] + $pts;
		$sql_query = "UPDATE `userdata` SET `tpts` = '$total', `cat` = '$cat', `wat` = '$waat' where `uno`='$uid'";
		$GLOBALS["DB"]->execute($sql_query);
		echo $sql_query;
	}
	/*
	$sql_query = "SELECT * FROM userdata WHERE `uno`='$uid'";
	$result = $GLOBALS["DB"]->result($sql_query);
	$total = $result[0]["tpts"] + $pts;
	$sql_query = "UPDATE `userdata` SET `tpts` = '$total', `cat` = '$cat', `wat` = '$waat' where `uno`='$uid'";
	$GLOBALS["DB"]->execute($sql_query);
	echo "last";
	*/
	
	
	
}
else
{
	header('Location: index.php?err=3');
	exit;
}
?>
<?php load_page("adminreorder.php"); ?>