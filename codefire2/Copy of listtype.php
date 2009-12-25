<?php
include_once("lib.php");
include_once(DOC_ROOT."/includes/header.inc.php");

$start = $_GET["start"];
$end = $_GET["end"];
$type = $_GET["type"];

?>
<td align="left" valign="top" bgcolor="#FFFFFF">
<div align="left">         
    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#D8D8D8">
      <tr>
        <td width='100%' bgcolor='#CFFBB5'><font size='2' color='red'><b> 
          <center>
            <?= $mess ?>
          </center></b></font></td></tr>
<?
$sql_query = "SELECT * FROM `quest` WHERE `type`= '$type' ORDER BY `qid` DESC LIMIT $start,$end";
$result = $GLOBALS["DB"]->result($sql_query);

foreach($result as $res)
{
$res["type"] = "Programming";
?>
<tr>
	    <td width='100%' bgcolor='#C5E9FE' height='31'><font size='4'><b> 
          <?= $res[name] ?>
          </b></font><font size='1' color='#003399'>( 
          <?= $res[type] ?>
          )</font> <strong><font color='#990000' size='2' face='Arial, Helvetica, sans-serif'> 
          [ 
          <?= $res[pts] ?>
          points ] <font color='#336600'>[ 
          <?= $res[code] ?>
          ]</font></font></strong></td>
                    </tr><tr> 
                      
        <td width='100%' bgcolor='#F3F3F3'><font size='2'>
          <?= $res[desc] ?>
          </font> <br> 
          <p align='right'><b><font size='2' color='#003399'><a href='submit.php?qid=<?= $res[qid] ?>'>Submit 
            solution</a>&nbsp;</font></b></p>
                        
        </td>
                    </tr>
<?
}
?>
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