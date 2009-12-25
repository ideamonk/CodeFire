<html>
<head>
<meta http-equiv="Content-Language" content="en-us"> <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Welcome to CodeFire</title>
</head>  
<body bgcolor="#F0F0EE">
<div align="center">
<center>
    <table width="800" border="0" cellpadding="0" bgcolor="#DDDDDD" id="AutoNumber1" style="border-collapse: collapse">
      <tr>
        <td width="800" height="220"  align="center" valign="top" bgcolor="#FFFFFF"> 
          <div align="center">
<center>
              <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber3" height="132"> 
                <tr>
		          <td width="100%" height="130" align="center" valign="middle" background="images/backtop.jpg" bgcolor="#FFFFFF"> 
                    <p align="center"><img src="images/logo2.jpg" width="800" height="130"><i><b><font size="6" face="Trebuchet MS" color="#FFFFFF"> 
                      </font></b></i></td>           </tr>           <tr>             <td width="100%" align="center" valign="top" bgcolor="#FFFFFF" height="35">             <font face="Comic Sans MS"><font color="#00CCFF" size="5">code...</font>             <font color="#00CC66" size="4">compete...</font> <b>             <font color="#FF6600" size="5">ignite your fire!</font></b></font></td>           </tr>           <tr>             
                  <td width="100%" height="16" align="center" valign="top" background="images/centback.jpg" bgcolor="#FFFFFF"> 
                    <font color="#FFFFFF" size="2" face="Tahoma"><strong>welcome to CodeFire, 
                    an online programming contest platform....</strong></font></td>
    </tr>
<tr>
<td>
<center><font face="Tahoma" size="3" color="red">
<?php
include_once("includes/config.inc.php");
include_once("./lib.php");
$err = $_GET["err"];
switch($err){
	case 1 :
		echo "<b>You are not logged in</b>";break;
	case 2 :
		echo "<b>Invalid Username/Password</b>";break;
	case 4 :
		echo "<b>Account Successfully Created...!</b>";
	}
?>
</font>
</center>
</td>
</tr>
</table>
</center>
</div>
</td>
</tr>
<tr>
        <td align="center" valign="top" bgcolor="#FFFFFF"> 
          <table width="95%" border="0" cellpadding="3" cellspacing="0" bordercolor="#111111" id="AutoNumber2" style="border-collapse: collapse">
            <tr>
<td bgcolor="#F7F7F7" align="left" valign="top">           
<table border="0" cellpadding="2" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber5" bgcolor="#E6EAD7" cellspacing="1">
                  <tr> 
                    <td width="100%" bgcolor="#FFFFFF" background="images/centback.jpg" height="31" align="left"> 
                      <b><font color="#FFFFFF" face="Arial">&nbsp;Schedule</font></b></td>
                  </tr>
                  <tr>
                    <td width="100%" bgcolor="#FFFFFF"> 
					<ul>
                       <small>
					   <li><b>Contest starts :</b> 1400 24 Sep. 2008</li>
					   <li><b>Contest ends :</b> 16:15 24 Sep. 2008</li>
					   <li><b><i>Finalized Rank list will be put up after a few days of contest.</b></i></li>
					   </small>
					</ul>
                     </td>
                  </tr>
                  <tr>
                    <td height="8" align="left" bgcolor="#F7F7F7"></td>
                  </tr>
                  <tr> 
                    <td width="100%" bgcolor="#FFFFFF" background="images/centback.jpg" align="left" height="31"> 
                      <b> <font color="#FFFFFF" face="Arial">&nbsp;Instructions</font></b></td>
                  </tr>
                  <tr> 
                    <td width="100%" bgcolor="#FFFFFF"> 
					<ul>
                       <small>
  <li>Work environment is linux based gcc/g++ compiler.</li>
  <li>Stick to the input/output specification as defined by the problem.</li>
  <li>Your programs should read the inputs in same order as the problem mentions</li>
  <li>Remember, the programs you submit are autocompiled and tested with judge inputs automatically. So, you can appreciate how important it is to stick by the order &amp; number of inputs/outputs</li>
  <li>Once done, always test your code with sample input outputs given in the problem</li>
  <li>All problems have different points, if you try a problem again after getting a wrong answer flag from judge, you will get a lesser percentage of total points.</li>
  <li>Keep checking out the My Submissions link for status of the code you submitted.</li>
  <li>Rankings can be seen from the Stats link on top</li>
  <li>You can either copy-paste the code into submission box or you can even browse-upload your c/c++ source file</li>
  <li>Checkout the </small><a href='rules.php' target='_new'>codefire walkthrough...</a></li><small>
  </ul></small>

					
					</td>
                  </tr>
                </table><br></td>
<td width="250" align="left" valign="top">
<table border="0" cellpadding="2" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber4" bgcolor="#E8E8E8">
<tr>
                    <td width="100%" align="left" background="images/centback.jpg" height="31"> 
                      <b><font face="Arial" color="#FFFFFF">&nbsp;Sign 
                      in </font></b> </td>
</tr>
<tr>
<td width="100%" bgcolor="#FFFFFF">
<form method="POST" action="login.php">
<p><font face="Arial">&nbsp;username</font><br> &nbsp;<input type="text" name="T1" size="20"><br>
<font face="Arial">&nbsp;password</font><br> &nbsp;<input type="password" name="T2" size="20">
<input type="submit" value="Login" name="B1">
<br><font face="Arial" size="2">Don't have password ? <a href="reg.php">Regster Now!</a>
</font></p>
</form></td></tr></table></td>
		</tr>
		</table>
		</td>
		</tr>
		<tr>       
        <td width="760" bgcolor="#E9F0F8" background="images/centback.jpg" align="center"><font face="Arial" size="1"><? echo $copyr ?></font></td>
      </tr></table>
	  </center>
	  </div>
	  </body>
	  </html>