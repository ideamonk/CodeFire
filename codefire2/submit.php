<?php
	include_once("lib.php");
	include_once(DOC_ROOT."/includes/header.inc.php");

	$qid = $_GET["qid"];
	$did = $_SESSION['logged_in'];

	$sql_query = "SELECT * FROM `quest` WHERE qid='".$qid."';";
	$result = $GLOBALS["DB"]->result($sql_query);

	if ( $result[0]["qid"] == NULL )
		echo "<td align='left' valign='top' bgcolor='#FFFFFF'><font color='red'><center><b>QUESTION DOES NOT EXIST<b></center></font></td>";
		else
		{
			switch($result[0]["type"])
				{
				case 'b' : $result[0]["type"] = "Beginner";break;
				case 'i' : $result[0]["type"] = "Intermediate";break;
				case 'a' : $result[0]["type"] = "Advance";break;
				}
		}

echo "<td align='left' valign='top' bgcolor='#FFFFFF'>
<div align='left'>
<table width='100%' border='0' cellpadding='3' cellspacing='2' bgcolor='#D8D8D8'>
	<tr> 
        <td width='100%' bgcolor='#FFFFFF' background='images/shade.JPG' height='31'><font size='4'><b>Submission for </b></font><strong><font color='#990000' size='2' face='Arial, Helvetica, sans-serif'><font color='#336600'>[".$result[0]["code"]."] 
        </font><font size='4'><b></b></font><font size='1' color='#003399'>(".$result[0]["type"].")</font> 
        <strong><font color='#990000' size='2' face='Arial, Helvetica, sans-serif'> [ ".$result[0]["pts"]." points ]</font></strong><font color='#336600'> </font></font></strong></td>
        </tr>
        <tr> 
        <td width='100%' bgcolor='#FFFFFF'> <font size='2'><textarea style='width:95%;height:300px;'>".$result[0]["desc"]."</textarea></font></td></td>
        </tr>
        <tr> 
        <td width='100%' bgcolor='#FFFFFF' background='images/shade.JPG'><font size='4'><b>Solution</b></font> for ".$result[0]["code"]." <font color='#666666' size='1'>".$result[0]["date"]."</font></td></tr>
        <tr> 
        <td width='100%' align='left' valign='top' bgcolor='#FFFFFF'>";


$sql_query = "SELECT * FROM `subm` WHERE qid=".$qid." AND uid=".$did;
$result = $GLOBALS["DB"]->result($sql_query);

$sql_query = "SELECT code FROM `quest` WHERE qid=".$qid;
$result1 = $GLOBALS["DB"]->result($sql_query);
?>
<table width='90%' border='0' align='center' cellpadding='2' cellspacing='2' bgcolor='#CFCFCF'>
	<tr> 
        <td align='left' valign='top' bgcolor='#333333'><font color='#F3F3F3' face="Arial, Helvetica, sans-serif"><strong>Copy-Paste or Upload your code:</strong></font></td>
        </tr>
	<tr> 

<?php
if( $result[0]["status"] != 's')
	{
	echo    "<td align='center' valign='top' bgcolor='#EBEBEB'>
		<form enctype='multipart/form-data' action='upfile.php' method='POST'>
          		<br>
        		<input type='hidden' name='MAX_FILE_SIZE' value='30000' />
          		Browse your file: <input name='userfile' type='file' />
					  <input type='hidden' name='qid' value='".$qid."'>
					  <input type='hidden' name='action' value='"; if($result[0]["qid"] == $qid) echo "update"; else echo "add"; echo"'>
					  <input type='hidden' name='codename' value='".$result1[0]["code"]."'>
           				  <input type='submit' value='Send File' />
           				 <br>
          	</form>
	</td>";
	}
?>

        </tr>
	<tr>
		<form name='frmcode' method='post' action='submitcode.php'>
                	<td align='center' valign='top' bgcolor='#EBEBEB'><textarea name='txtCode' <?php if($result[0]["status"] == 's') echo "DISABLED"; ?> cols='80' rows='14' wrap='off' class='textback' id='txtCode'><?= stripslashes($result[0]["code"]); ?></textarea></td>
				<input type='hidden' name='qid' value='<?= $qid ?>'>
				<input type='hidden' name='action' value='<?php if($result[0]["qid"] == $qid) echo "update"; else echo "add"; ?>'>
				<input type='hidden' name='codename' value='<?= $result1[0][code]; ?>'>
			</td>
                        </tr>
                        <tr> 
                        <td align='center' valign='top' bgcolor='#D6D6D6'>
			<input name='Submit' type='button' onClick='<?php if($result[0][status] == 's') echo "DISABLED"; else echo "javascript:validate();"; ?>' value='Update'></td>
		</form>		
	</tr>
</table>
                        
                    
						<script language="JavaScript">
						function validate() {
									if (document.frmcode.txtCode.value.length<=10)  {
										alert ("Put some more code  please..."); }
										else {
											document.frmcode.submit (); }
							} 
						</script>
			</td>
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