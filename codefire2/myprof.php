<?php
include_once("lib.php");
include_once(DOC_ROOT."/includes/header.inc.php");

$did = $_SESSION['logged_in'];
//echo $_POST["sub"];
?>
<td align="left" valign="top" bgcolor="#FFFFFF">
<div align="left">
                  <table width="100%" border="0" cellpadding="3" cellspacing="2" bgcolor="#D8D8D8">
                    <tr> 
                      <td width="100%" bgcolor="#FFFFFF" background="images/shade.JPG" height="31"><font size="4"><b>Edit 
                        your profile</b></font></td>
                    </tr>
                    <tr> 
                      <td width="100%" align="center" valign="top" bgcolor="#FFFFFF"> 
                        <form name="form1" method="post" action="profsave.php">
                          <br>
                          <table width="65%" border="0" cellpadding="2" cellspacing="2" bgcolor="#F0F0F0">
 
<?php
$sql_query = "SELECT uname, eid, bgc FROM userdata WHERE uno=$did";
$result = $GLOBALS["DB"]->result($sql_query);
?>
<tr bgcolor='#FFFFFF'>
	<td align='left' valign='top'>
	<font size='2'>Full Name</font>
	</td>
	<td align='left' valign='top'>
	<input name='txtFname' readonly='true' disabled type='text' id='txtFname' value='<?= $result[0][uname] ?>'>
	</td>
</tr>
<tr bgcolor='#FFFFFF'><br>
	<td align='left' valign='top'>
	<font size='2'>E-mail</font>
	</td>
	<td align='left' valign='top'>
		<input name='txtMail' type='text' id='txtMail' disabled value='<?= $result[0][eid] ?>'></td></tr>
<tr bgcolor='#FFFFFF'><br>
	<td align='left' valign='top'>
	<font size='2'>Reg #</font>
	</td>
	<td align='left' valign='top'>
		<input name='txtReg' type='text' id='txReg' disabled value='<?= $result[0][bgc] ?>'></td></tr>
                            <tr bgcolor="#FFFFFF"> 
                              <td align="left" valign="top"><font size="2">Branch</font></td>
                              <td align="left" valign="top"> 
<select name="lstBranch" id="lstBranch">
<?php

$sql_query = "SELECT branch, about, lang FROM prof WHERE uid = '$did'";
$result = $GLOBALS["DB"]->result($sql_query);

$arr["0"] = "<option selected></option>";
$arr["1"] = "<option>CSE</option>";
$arr["2"] = "<option>MECH</option>";
$arr["3"] = "<option>IT</option>";
$arr["4"] = "<option>ECE</option>";
$arr["5"] = "<option>EEE</option>";
$arr["6"] = "<option>EIE</option>";
switch($result[0]["branch"]){
	case 'CSE':$arr["1"] = "<option selected>CSE</option>";break;
	case 'MECH':$arr["2"] = "<option selected>MECH</option>";break;
	case 'IT':$arr["3"] = "<option selected>IT</option>";break;
	case 'ECE':$arr["4"] = "<option selected>ECE</option>";break;
	case 'EEE':$arr["5"] = "<option selected>EEE</option>";break;
	case 'EIE':$arr["6"] = "<option selected>EIE</option>";break;
	}

foreach ($arr as $ar)
	echo $ar;
?>
</select></td></tr>
<tr bgcolor='#FFFFFF'><td align='left' valign='top'><font size='2'>Languages I know</font></td><td align='left' valign='top'><input name='txtLang' type='text' id='txtLang' value='<?= $result[0][lang] ?>'></td></tr>
<tr bgcolor='#FFFFFF'><td align='left' valign='top'><font size='2' face='Arial, Helvetica, sans-serif'>About  me</font></td><td align='left' valign='top'><textarea name='txtabout' cols='32' rows='3'><?= $result[0][about] ?></textarea></td></tr>                            
                            <tr bgcolor="#FFFFFF"> 
                              <td align="left" valign="top">&nbsp;</td>
                              <td align="left" valign="top"> <input type="submit" name="Submit" value="Save"></td>
                            </tr>
                          </table>
                        </form>
                        <br> <hr> </td>
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

