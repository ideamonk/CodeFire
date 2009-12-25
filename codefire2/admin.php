<?php
include("includes/config.inc.php");
include(DOC_ROOT."/lib.php");
session_start();

if(isset($_SESSION['logged_in']))unset($_SESSION['logged_in']);

if (isset($_POST["user"])){
	if ($_POST[user] == USER && md5($_POST[pass]) == PASS)
		{
		$_SESSION['logged_in'] = "admin";
		load_page("adminmain.php");
		}
		else
		echo "BaD";
	}
?>
<html>
	<head>
		<title>:: Admin Login ::</title>
	</head>
<body bgcolor="#999999">
	
<table height="100%" width="100%">
  <tr align="center"> 
    <td align="center"><table width="600" border="0" cellpadding="2" cellspacing="2" bgcolor="#666666">
        <tr>
          <td background="images/header.jpg"><font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif"><strong>+ 
            Administrator Login</strong></font></td>
        </tr>
        <tr>
          <td height="210" align="center" valign="top" background="images/logBack.jpg"> 
            <table border=0 width="400" height="200">
              <tr> 
                <td> <center>
                    <form name="form1" action="" method="POST" bordercolor="black">
                      <strong><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif">Username</font><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
                      : 
                      <input type="text" name="user">
                      <br>
                      <br>
                      Password : 
                      <input type="password" name="pass">
                      </font></strong><br>
                      <br>
                      <input name="submit" type="submit" value="  Login  ">
                    </form>
                  </center></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td background="images/header.jpg">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
</table>
</body>
</html>