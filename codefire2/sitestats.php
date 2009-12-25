<?php
include_once("lib.php");
include_once(DOC_ROOT."/includes/header.inc.php");
?>
<td align="left" valign="top" bgcolor="#FFFFFF">
<div align="left">
                  
    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#D8D8D8">
      <tr> 
                      
        <td width="100%" height="31" background="images/Sback.jpg" bgcolor="#87BC25"><font color="#FFFFFF" size="4" face="Arial, Helvetica, sans-serif"><b>CodeFire 
          Statistics </b></font></td>
                    </tr>
                    <tr> 
                      
        <td align="center" bgcolor="#EFEFEF"> 
          <table width="80%" border="0" cellpadding="2" cellspacing="2" bgcolor="#73B412">
  <tr bgcolor="#E8F0D9"> 
    <td><div align="center"><font face="Arial, Helvetica, sans-serif"><strong>Rank</strong></font></div></td>
    <td><div align="center"><font face="Arial, Helvetica, sans-serif"><strong>Name</strong></font></div></td>
	<td><div align="center"><font face="Arial, Helvetica, sans-serif"><strong>RegCode</strong></font></div></td>
    <td><div align="center"><strong><font face="Arial, Helvetica, sans-serif">Accuracy</font></strong></div></td>
    <td><div align="center"><font face="Arial, Helvetica, sans-serif"><strong>Problems 
        Solved</strong></font></div></td>
    <td><div align="center"><font face="Arial, Helvetica, sans-serif"><strong>Total 
        Score</strong></font></div></td>
  </tr>
	<?php
	$sql_query = "SELECT * FROM userdata ORDER BY tpts DESC";
	$result = $GLOBALS["DB"]->result($sql_query);
	$r=1;
  	foreach($result as $res) 
	{ if ( $res[cat] > 0 ) {
	if ($res[att]>0)
		$accpts = $res[cat] / $res[att] * 100;
	
	$sql_query = "UPDATE userdata SET rank='$r' WHERE uno=$res[uno]";
	$reply = $GLOBALS["DB"]->result($sql_query);
	
		$sql_query = "SELECT count(*) FROM subm WHERE uid=$res[uno] AND status='s';";
		$reply = $GLOBALS["DB"]->result($sql_query);
		
		echo "<tr bgcolor='#FFFFFF'> 
    <td bgcolor='#F0F1E7'><div align='center'><small>"; echo $r++; echo "</small></div></td>
    <td bgcolor='#FFFFFF'><div align='center'><small><a href='profile.php?id=$res[uno]'>$res[uname]</small></div></td>
	<td bgcolor='#FFFFFF'><div align='center'><small><a href='profile.php?id=$res[uno]'>$res[bgc]</small></div></td>
    <td bgcolor='#FFFFFF'><div align='center'><small>".(int)$accpts." %</small></div></td>
    <td bgcolor='#FFFFFF'><div align='center'><small>".$reply[0]["count(*)"]."</small></div></td>
    <td bgcolor='#FFFFFF'><div align='center'><small>$res[tpts]</small></div></td>
  </tr>";
  }
  }
	?>
</table></td>
                    </tr>
                  </table>
                </div>
              </td>
            </tr>
          </table>
        </div>
      </td>
    </tr>
    <tr>
      <td valign="top" bgcolor="#336699"><?= $copyr ?></td>
    </tr>
  </table>
</div>

</body>

</html>