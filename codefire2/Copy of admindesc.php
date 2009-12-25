<?php
include("includes/config.inc.php");
include(DOC_ROOT."/lib.php");
session_start();

if ($_SESSION['logged_in'] == "admin")
{
	$disid = $_GET["id"];

	if(!isset($_GET["stat"]) && !isset($_GET["id"]) && !isset($_GET["pt"]))
	{echo "What do you want";
	}else{
	$stat = $_GET["stat"];
	$id = $_GET["id"];
	$pts = $_GET["pt"];
	$uid = $_GET["id"];
	}
	$stat = $_GET["stat"];
	$id = $_GET["id"];
	$pts = $_GET["pt"];
	$uid = $_GET["uid"];

	$sql_query = "SELECT cat,wat FROM userdata WHERE uno=$disid;";
	$cat = $GLOBALS["DB"]->execute($sql_query);
	$r = mysql_query ("select wat from userdata where uno=$disid;");
	$c = mysql_fetch_object($r);
	$waat = $c->wat;
echo $waat;
exit ;
	$cat = $cat[0][cat];
	if($stat == 'a')
		{
		$sql_query = "UPDATE subm SET status='s',points='$pts' WHERE id=$id;";
		$GLOBALS["DB"]->execute($sql_query);
		$cat += 1;
		}
	if($stat == 'w')
	{
		$waat += 1;
		$sql_query = "UPDATE subm SET status='w',points='0' WHERE id=$id;";
		$GLOBALS["DB"]->execute($sql_query);
	}
	
	
	$sql_query = "SELECT tpts FROM userdata WHERE uno=$uid";
	$result = $GLOBALS["DB"]->result($sql_query);
	$total = $result[0]["tpts"] + $pts;
	
	$sql_query = "UPDATE userdata SET tpts=$total,cat=$cat where uno=$uid;";
	#$GLOBALS["DB"]->execute($sql_query);
	$res = $GLOBALS["DB"]->execute($sql_query);
	$q="UPDATE `mainbank`.`userdata` SET `wat` = '$waat' WHERE `userdata`.`uno` ='$disid' LIMIT 1 ;";
	$GLOBALS["DB"]->execute($q);	
}
else
{
	header('Location: index.php?err=3');
	exit;
}

?>
<?php load_page("adminreorder.php") ?>