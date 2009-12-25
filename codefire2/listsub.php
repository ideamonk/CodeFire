<?php
include("includes/adminheader.inc.php");
$sql_query = "SELECT * FROM `subm` WHERE `status`='p' ORDER BY `date`,`time`";
$result = $GLOBALS["DB"]->result($sql_query);
?>
<style type="text/css">
<!--
bod {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 8px;
}
-->
</style>

<div align="center"> 
  <table width="80%" border="0" >
    <tr> 
      <td width="70%" align="left" valign="top"> <table width="100%" border="0" bgcolor="#CCCCCC">
          <tr bgcolor="#000000"> 
            <td width="15%"><font face="Arial, Helvetica, sans-serif"><strong><font color="#FFFFFF">Date</font></strong></font></td>
            <td width="25%"><font face="Arial, Helvetica, sans-serif"><strong><font color="#FFFFFF">User</font></strong></font></td>
            <td width="20%"><font face="Arial, Helvetica, sans-serif"><strong><font color="#FFFFFF">Problem</font></strong></font></td>
            <td width="40%"><font face="Arial, Helvetica, sans-serif"><strong><font color="#FFFFFF">Todo</font></strong></font></td>
	
          </tr>
          <?php
	
	foreach($result as $res)
	{
	$sql_query1 = "SELECT `uid` FROM `userdata` WHERE `uno` = '$res[uid]';";
	$result1 = $GLOBALS["DB"]->result($sql_query1);
	
	$sql_query2 = "SELECT `pts` FROM `quest` WHERE `qid` = '$res[qid]';";
	$result2 = $GLOBALS["DB"]->result($sql_query2);
	
	$points = (( 25 - ($res["patt"] - 1) ) / 25 ) * $result2[0][pts];

	echo "<tr bgcolor='#EEEEEE'>
        <td id='bod'>$res[date]</td>
        <td id='bod'><a href='profile.php?id=$res[uid]' target='_new'>".$result1[0][uid]."(".$res[uid].")</td>
        <td id='bod'><a href='submit.php?qid=".$res[qid]."' target='_new'>".$res[codename]."</a>(".$res[patt].")</td>
        <td id='bod'><form name='form1' method='post' action=''>
            <input type='button' name='Button' value='Show' onclick=\"javascript:window.open('popupsol.php?qid=$res[id]')\"> 
	    <input type='button' name='Button2' onclick=\"javascript:location.href = 'admindesc.php?stat=a&id=$res[id]&uid=$res[uid]&pt=".(int)$points."'\" value='Accept"; echo "[ ".(int)$points." ]";
	echo "'>
            <input type='button' name='Button2' onclick=\"javascript:location.href = 'admindesc.php?stat=w&id=$res[id]&pt=0&uid=$res[uid]'\" value='Reject'>
	    <input type='button' name='Button2' onclick=\"javascript:window.open('myshak.php?uid=$res[uid]&qid=$res[qid]&pts=".(int)$points."')\" value='Compile++'>
		<input type='button' name='Button2' onclick=\"javascript:window.open('cshack.php?uid=$res[uid]&qid=$res[qid]&pts=".(int)$points."')\" value='Compile C'>
   </form>
	</td>
        </tr>";
	}
	?>
        </table></td>
    </tr>
  </table>
</div>
</body>
</html>