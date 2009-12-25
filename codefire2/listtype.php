<?php
include_once("lib.php");
include_once(DOC_ROOT."/includes/header.inc.php");

$type = $_GET["type"];

if(!isset($_GET["page"]))
	$pgn = 1;
	else{
		if ( $_GET["page"] > 0 ) $pgn = $_GET["page"]; else $pgn = 1;
  		}	
	$start = $pgn * 3 - 3;
?>
<style type="text/css">
<!--
.navlinks {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	text-decoration: none;
}
-->
</style>
<td align="left" valign="top" bgcolor="#FFFFFF">
<div align="left">         
    <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#D8D8D8">
      <tr>
        <td width='100%' bgcolor='#CFFBB5'><font size='2' color='red'><b> 
          <center>
            <?= $mess ?>
          </center></b></font></td></tr>
<?
$sql_query = "SELECT * FROM `quest` WHERE `type`= '$type' ORDER BY `qid` DESC LIMIT $start,3";
$result = $GLOBALS["DB"]->result($sql_query);

foreach($result as $res)
{
$res["type"] = "Programming";
?>
<tr>
	    <td width='100%' height='31' background="images/Qback.jpg" bgcolor='#C5E9FE'><font size='4'><b> 
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
          <textarea style='width=100%;height=100%'><?= $res[desc] ?></textarea>
          </font> <br> 
          <p align='right'><b><font size='2' color='#003399'><a href='submit.php?qid=<?= $res[qid] ?>'>Submit 
            solution</a>&nbsp;</font></b></p>
                        
        </td>
                    </tr>
<?
}
?>
	</tr>
</tr>
	<tr>
	    <td bgcolor="#FFFFFF">
<center class="navlinks">
            <font color="#666666" size="2" face="Arial, Helvetica, sans-serif">navigate 
            :<span class="navlinks">:</span></font><span class="navlinks"><font size="2" face="Arial, Helvetica, sans-serif"> 
            </font> 
            <?php
	$sql_query = "SELECT count(*) FROM quest where type='$type';";
	$result = $GLOBALS["DB"]->row($sql_query);
	foreach($result as $res)
		{if ( $res % 3 == 0 ) $result = $res / 3; else $result = $res / 3 + 1;}
	$i = $pgn - 1;
	if ( $i > 0 )
		{?>
            &nbsp;&nbsp;<a href='listtype.php?type=<?= $type ?>&page=<?= $i ?>'><<</a>&nbsp;&nbsp; 
            <?}
	for( $i = 1 ; $i <= $result ; $i++)
		{?>
            &nbsp;&nbsp;<a href='listtype.php?type=<?= $type ?>&page=<?= $i ?>'> 
            <?= $i ?>
            </a>&nbsp;&nbsp; 
            <?}
	$i=$pgn+1;
	if ( $i <= $result)
		{?>
            &nbsp;&nbsp;<a href='listtype.php?type=<?= $type ?>&page=<?= $i ?>'>>></a>&nbsp;&nbsp; 
            <? } ?>
            </span> 
          </center>
	</td>
	</tr></table>
    </div>
    </td>
    </tr>
</table>
        </div>
      </td>
    </tr>
    <tr>
      <td valign="top" bgcolor="#336699"><?= $copyr ?></td>
  </table>
</div>
</body>
</html>