<?php
include("lib.php");

$name = $_POST["name"];
$uid  = strtolower($_POST["uid"]);
$upwd = strtolower($_POST["upwd"]);
$upwd2= strtolower($_POST["upwd2"]);
$eid  = strtolower($_POST["eid"]);
$eid="";
$bgc  = strtoupper($_POST["bgc"]);
$link = "reg.php?";
$flag = 0;
$sql_query = "SELECT * FROM `userdata` WHERE eid ='$eid' OR uid='$uid' OR bgc='$bgc';";
$check = $GLOBALS["DB"]->result($sql_query);
$cuid = strtolower($uid);

if ( strtolower($check[0]["uid"]) == $cuid)
{
$link .= "&uid=err";
$flag = 1;
}elseif (strlen($uid) < 5)
{
$link .= "&uid=err1";
$flag = 1;
}



if ($upwd != $upwd2)
{
$link .= "&pwd=err";
$flag = 1;
}elseif (strlen($upwd) < 6)
{
$link .= "&pwd=err1";
$flag = 1;
}



if ( $flag == 0)
{
$sql_query = "INSERT INTO `userdata` (`uname`, `uid`, `upwd`, `eid`, `doj`, `bgc`) VALUES ('$name', '$uid', '$upwd', '$eid', '".date ("y-m-j")."', '$bgc')";
$GLOBALS["DB"]->execute($sql_query);

$sql_query = "SELECT uno FROM `userdata` WHERE eid ='".$eid."' AND uid = '".$uid."';";
$res = $GLOBALS["DB"]->result($sql_query);

$sql_query = "INSERT INTO `prof` (`uid`) VALUES ('".$res[0][uno]."')";
$GLOBALS["DB"]->execute($sql_query);

load_page("index.php?err=4");
}
else

load_page($link."&name=".base64_encode($name)."&user=".base64_encode($uid)."&email=".base64_encode($eid));
?> 