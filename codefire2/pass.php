<?php
include_once("lib.php");
include_once("./includes/header.inc.php");
?>
<td align="left" valign="top" bgcolor="#FFFFFF">
<div align="left">
                  <table width="100%" border="0" cellpadding="3" cellspacing="2" bgcolor="#D8D8D8">
                    <tr> 
                      <td width="100%" bgcolor="#FFFFFF" background="images/shade.JPG" height="31"><font size="4"><b>Change 
                        Password </b></font></td>
                    </tr>
<?php
$error = $_GET["err"];
if ( $error == 1 )
	echo "<tr><td width='100%' bgcolor='#FFFFFF' border='0' align='center'><font size='2' color='red'><b>Password Changed !</b></font></td></tr>";
if( $error == 2 )
	echo "<tr><td width='100%' bgcolor='#FFFFFF' border='0' align='center'><font size='2' color='red'><b>ReCheck Old Password !</b></font></td></tr>";
?>
                    <tr> 
                      <td width="100%" align="left" valign="top" bgcolor="#FFFFFF"><form name="form1" method="post" action="chpass.php">
                          <table width="500" border="0" align="center" cellpadding="2" cellspacing="2" bgcolor="#CCCCCC">
                            <tr align="left" valign="middle" bgcolor="#FFFFFF"> 
                              <td width="100"><font size="2" face="Arial, Helvetica, sans-serif">Old 
                                Password </font></td>
                              <td> <font size="2" face="Arial, Helvetica, sans-serif"> 
                                <input name="pssold" type="password" id="pssold">
                                <span id="oldp" style="color:ed1212;font-size:9px"></span>                                </font></td>
                            </tr>
                            <tr align="left" valign="middle" bgcolor="#FFFFFF"> 
                              <td><font size="2" face="Arial, Helvetica, sans-serif">New 
                                Password </font></td>
                              <td> <font size="2" face="Arial, Helvetica, sans-serif"> 
                                <input name="pssnew" type="password" id="pssnew">
                                <span id="newp" style="color:ed1212;font-size:9px"></span>
                                </font></td>
                            </tr>
                            <tr align="left" valign="middle" bgcolor="#FFFFFF">
                              <td height="25"><font size="2" face="Arial, Helvetica, sans-serif">Confirm</font></td>
                              <td><font size="2" face="Arial, Helvetica, sans-serif">
                                <input name="pssnew2" type="password" id="pssnew2">
                                <span id="conp" style="color:ed1212;font-size:9px"></span>
                                </font></td>
                            </tr>
                            <tr align="left" valign="middle" bgcolor="#FFFFFF"> 
                              <td><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
                              <td> <font size="2" face="Arial, Helvetica, sans-serif"> 
                                <input name="Button" type="button" onClick="javascript:validate();" value="Change">
                                </font></td>
                            </tr>
                          </table>
                        </form>
	<script language="JavaScript">
			function validate () {
					newp.innerText="";
					oldp.innerText="";
					conp.innerText="";
					if (document.form1.pssold.value.length<6) {
						//oldp.innerText = "please enter correct password.";
						alert("please enter correct password.");
						return 0;
						}
						
					else if  (document.form1.pssnew.value.length<6) {
						//newp.innerText = " password length  should be minimum 6 characters";
						alert("Password length  should be minimum 6 characters");
						return 0;
						}
					else if ( document.form1.pssnew.value != document.form1.pssnew2.value) {
					//conp.innerText = "Please re-enter password correctly";
					alert("Please re-enter password correctly")
					return 0;
				}
					
					form1.submit();
			}
						
	</script>
                        <p>&nbsp; </p>
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
