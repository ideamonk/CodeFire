<?php
include("includes/config.inc.php");
include(DOC_ROOT."/lib.php");
session_start();

#if (!$_SESSION['logged_in'] == "admin"){
#	header('Location: index.php?err=3');
#	exit;
#}

?>
<?php
if(!isset($_GET["qid"]))
{
echo "NO INPUT";
exit;
}
else
$id = $_GET["qid"];
?>

<html>
<head>
<title>Code Display Screen</title>
</head>
<body>

<?php
$sql_query = "SELECT code FROM subm WHERE id=$id;";
$result = $GLOBALS["DB"]->result($sql_query);
foreach($result as $res)
	echo "<textarea rows=46 cols=150>".stripslashes($res[code])."</textarea>";
?>

</body>
</html>