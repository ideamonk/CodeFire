<?php
include("includes/adminheader.inc.php");
$users = $GLOBALS["DB"]->result("SELECT count(*) from userdata");
$count = $GLOBALS["DB"]->result("SELECT count(*) from subm where status='p'");

?>
<br>
<table border="0" align="center">
	<tr>
	<td align="left">
	<font face="arial">Hello Admin,<br><br>
	TOTAL USERS : <? echo $users[0]["count(*)"] ?><br>
	NEW SUBMISSIONS : <? echo $count[0]["count(*)"] ?><br></font>
	</td>
	</tr>
</td>
</tr>
</table>
