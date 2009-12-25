<?php
include_once("lib.php");

session_start();
// is the one accessing this page logged in or not?
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {

// not logged in, move to login page
header('Location: index.php?err=1');
exit;
}

$did = $_SESSION['logged_in'];

$uploaddir = '.\codetemp\$user';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
	{  
		$handle = fopen($uploadfile, "r");
		$code = fread($handle, filesize($uploadfile));
		fclose($handle);
		system("del ". $uploadfile);
		
		$code = addslashes($code);
		$qid = $_POST["qid"];
		$codename = $_POST["codename"];
		$action = $_POST["action"];
			if ( $code != "" )
				{
				if ($action == "add" )
					{
					$sql_query = "INSERT INTO `subm` (`uid`, `codename` ,`code`, `date`, `qid`, `patt`, `status`) VALUES ('$did', '$codename' ,'$code', '".date ("y-m-j")."', '$qid', '1', 'p')";
					$link = "main.php?message=1";
					}
					else
					{
					$sql_query = "SELECT att FROM `userdata` where uno=".$did.";";
					$result = $GLOBALS["DB"]->result($sql_query);
					$result[0]["att"]+=1;
					$sql_query = "UPDATE `userdata` SET `att` = '".$result[0]["att"]."' WHERE `uno` ='$did';";
					$GLOBALS["DB"]->execute($sql_query);
					$sql_query = "UPDATE `subm` SET `code` = '$code', status='p' WHERE `uid` = '$did' AND `qid`='$qid'";
					$GLOBALS["DB"]->execute($sql_query);

					$sql_query = "SELECT patt FROM `subm` where uid=".$did." AND qid=".$qid.";";
					$result = $GLOBALS["DB"]->result($sql_query);
					$result[0]["patt"]+=1;
					$sql_query = "UPDATE `subm` SET `patt` = '".$result[0]["patt"]."' WHERE `uid` ='$did' AND `qid`='$qid';";
					$link = "main.php?message=2";

					}
				$GLOBALS["DB"]->execute($sql_query);
				load_page($link);
			}
		
		}



} else {
    load_page("main.php?mess=3");
}
?>
