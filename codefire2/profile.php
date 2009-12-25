<?php
include_once("lib.php");
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
	header('Location: index.php?err=1');
	exit;	
	}
else
$disid = $_GET["id"];

include_once("includes/header.inc.php");
	$sql_query = "SELECT * FROM userdata WHERE uno=$disid;";  
	$result1 = $GLOBALS["DB"]->result($sql_query);
	
	$sql_query = "select * from prof where uid=$disid;";
	$result2 = $GLOBALS["DB"]->result($sql_query);
	
     if ( $result1[0][att] > 0 ) 
	{
	$wrong =  $result1[0][wat];
	} else {
	$accpts = "N/A";
	$result1[0]["att"] = "N/A";
	$wrong = "N/A";
 	$reply[0]["count(*)"] = "N/A";
	}

if ( $result1[0]["uno"] == NULL )
{
?> <td align='left' valign='top' bgcolor='#FFFFFF'><font color='red'><center><b>USER DOES NOT EXIST<b></center></font></td><?
}
else
{
?><td align='left' valign='top' bgcolor='#FFFFFF'>
<div align='left'>
                  
    <table width='100%' border='0' cellpadding='3' cellspacing='1' bgcolor='#D8D8D8'>
      <tr> 
                      
        <td width='100%' height='31' background="images/Qback.jpg" bgcolor='#C5E9FE'><font size='4' face="Arial, Helvetica, sans-serif"><b> 
          <?= $result1[0][uid] ?>
          's Profile </b></font></td>
                    </tr>
                    <tr>
                      <td align='center' valign='top' bgcolor='#FFFFFF'> 
                        <div align='center'><font face='Times New Roman, Times, serif'> 
                          Codefire Rank : <font color='#006600'>"<?= $result1[0][rank] ?>"</font><br>
                          <em>total points</em> : <?= $result1[0][tpts]  ?><br>
                          <em>username </em>: <font color='#993300'><?= $result1[0]["uid"] ?></font>&nbsp;<br>
                          <em>name :</em><?= $result1[0]["uname"] ?><br>
                          <em>Branch</em> : <?= $result2[0]["branch"] ?><br>
                          <em>E-Mail </em>: <?= $result1[0]["eid"] ?></font><br>
			  <em>Reg # </em>: <?= $result1[0]["bgc"] ?></font><br>
                          <em><font face='Times New Roman, Times, serif'>Languages I know</font></em><font size='2' face='Times New Roman, Times, serif'>: <?= $result2[0]["lang"] ?><br></font>
                          <em><font face='Times New Roman, Times, serif'>About Me</font></em><font size='2' face='Times New Roman, Times, serif'>: <?= $result2[0]["about"] ?><br></font><br>
<?
if ( $disid == $_SESSION['logged_in'] ) 
	{?>
	<input type='button' value='Edit Profile' onclick="location.href='myprof.php'"><br>
	<? } ?>
<br>
                          
            <table width='75%' border='0' cellpadding='2' cellspacing='2' bgcolor='#DFDFDF'>
              <tr align='center' valign='top' bgcolor='#F4F4F4'> 
                <td><font size='2' face="Verdana, Arial, Helvetica, sans-serif"><strong>Total Attempts</strong></font></td>
                <td><font size='2' face="Verdana, Arial, Helvetica, sans-serif"><strong>Solutions 
                  Accepted</strong></font></td>
                <td><font size='2' face="Verdana, Arial, Helvetica, sans-serif"><strong>Wrong 
                  Answers</strong></font></td>
                <td><font size='2' face="Verdana, Arial, Helvetica, sans-serif"><strong>Accuracy</strong></font></td>
              </tr>
              <tr align='center' valign='top' bgcolor='#FFFFFF'> 
                <td><font size='2'>
                  <?= $result1[0]["att"] ?>
                  </font></td>
                <td><font size='2'>
                  <?= $result1[0]["cat"]?>
                  </font></td>
                <td><font size='2'>
                  <?= $wrong ?>
                  </font></td>
                <td><font size='2'>
                  <?= (int)$accpts." %" ?>
                  </font></td>
              </tr>
            </table>
                          <br>
                        </div></td>
                    </tr>
                    <tr> 
                      <td width='100%' align='left' valign='top' bgcolor='#FFFFFF'> 
                        <strong><font face='Times New Roman, Times, serif'><em>Hall Of Fame</em></font></strong><br>
                        <table width='75%' border='0' align='center' cellpadding='2' cellspacing='1'>
            <tr align='center' valign='top' bgcolor='#E9E9E9'> 
              <td><strong><font size='2' face="Verdana, Arial, Helvetica, sans-serif">Date</font></strong></td>
              <td><strong><font size='2' face="Verdana, Arial, Helvetica, sans-serif">Problem 
                Title</font></strong></td>
              <td><strong><font size='2' face="Verdana, Arial, Helvetica, sans-serif">Points 
                Scored</font></strong></td>
            </tr>
            <?
			
			$sql_query = "SELECT * FROM `subm` WHERE uid='$disid' ";
			$result = $GLOBALS["DB"]->result($sql_query);
			foreach($result as $res)
			{
			$res[status]="Solved";$color="#CDE7C2";
			?>
              <tr align='left' valign='top' bgcolor='<?= $color ?>'>
              <td><small><font size="2" face='Arial'>
                <?= $res[date] ?>
                </td>
              <td><a href='submit.php?qid=<?= $res[id] ?>'>
                <?= $res[codename] ?>
                </a></td>
              <td>
                <?= $res[points] ?>
			</small>
				</td>
              <?}		

			}
			?>
          </table>
                        <br>
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
      <td valign='top' bgcolor='#336699'><?= $copyr ?></td>
    </tr>
  </table>
</div>
</body>
</html>