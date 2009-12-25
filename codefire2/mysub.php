<?php
include_once("lib.php");
include_once(DOC_ROOT."/includes/header.inc.php");

$did = $_SESSION['logged_in'];
?>
<td align="left" valign="top" bgcolor="#FFFFFF">
<div align="left">
                  
    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#D8D8D8">
      <tr> 
                      
        <td width="100%" height="31" background="images/Qback.jpg" bgcolor="#C5E9FE"><font size="4"><b><font face="Arial, Helvetica, sans-serif">My 
          Submissions</font> </b><em><font size="2" face="verdana">(as 
          on 
          <?= date("d/m/y") ?>
          )</font></em></font></td>
                    </tr>
                    <tr> 
                      <td width="100%" align="left" valign="top" bgcolor="#FFFFFF"><br>
                        <table width="75%" border="0" align="center" cellpadding="2" cellspacing="2" bgcolor="#FFFFFF">
                          <tr align="left" valign="top" bgcolor="#CFDDF5"> 
                            <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Date</font></strong></td>
                            <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Problem</font></strong></td>
                            <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Status</font></strong></td>
                            <td><strong><font size="2" face="Arial, Helvetica, sans-serif">Points</font></strong></td>
                          </tr>
                          

			<?php
			$sql_query = "SELECT status, uid, codename, date, points, qid FROM subm WHERE uid=$did ORDER BY date DESC;";
			$result = $GLOBALS["DB"]->result($sql_query);
			if ($result[0][uid] != $did)
				{?>
				<table width='100%' border='0' cellpadding='3' cellspacing='2' bgcolor='#D8D8D8'><tr width='100%' valign='top' bgcolor='#FFE9DF'><td><font size='2' face='verdana'><center>NO SUMBISSIONs's</center></font></td></table>
				<?}
			else
				{				
				foreach($result as $res)
					{
					switch($res["status"])
						{
							case 'p' : $res["status"]="Pending";$res["points"]="--";$color="#FCD5C7";break;
							case 'c' : $res["status"]="Compile Error";$color="#F5EAC5";break;
							case 's' : $res["status"]="Solved";$color="#CDE7C2";break;
							case 'w' : $res["status"]="Wrong Answer";$color="#FCD5C7";break;
							case 'e' : $res["status"]="Presentation Error";$color="#FCD5C7";break;	
						}   
				?>
				<tr align='left' valign='top' bgcolor='<?= $color ?>'>
				<td><font size='2' face='verdana'><?= $res[date] ?></font></td>
                            <td><font size='2' face='verdana'><a href='submit.php?qid=<?= $res[qid] ?>'><?= $res[codename] ?></a></font></td>
				<td bgcolor='<?= $color ?>'><font size='2' face='verdana'><?= $res[status] ?></font></td>
                            <td><font size='2' face='verdana
							 '><?= $res[points] ?></font></td>
				<?	}
				}			

				?> 
                          </tr>
                          </tr>
                        </table>
                        <hr> </td>
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

