<html><head><meta http-equiv="Content-Language" content="en-us"><meta http-equiv="Content-Type" content="text/html; charset=windows-1252"><title>Welcome to CodeFire</title></head><body><div align="center">  <center>  <table border="0" cellpadding="0" style="border-collapse: collapse" bordercolor="#111111" width="760" id="AutoNumber1">    <tr>      <td width="760" height="220"  align="center" valign="top">      <div align="center">        <center>        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="90%" id="AutoNumber3" height="132">          <tr>            
                  <td width="100%" align="center" valign="top" height="81" bgcolor="#FFFFFF"> 
                    <p align="right"><i><b> <font size="6" face="Trebuchet MS" color="#FFFFFF"> 
                      <br>
                      <img src="images/logo2.jpg" width="800" height="130"> </font></b></i></td>          </tr>          <tr>            <td width="100%" align="center" valign="top" bgcolor="#FFFFFF" height="35">            <font face="Comic Sans MS"><font color="#00CCFF" size="5">code...</font>            <font color="#00CC66" size="4">compete...</font> <b>            <font color="#FF6600" size="5">ignite your fire!</font></b></font></td>          </tr>          <tr>            <td width="100%" align="center" valign="top" height="16">            <font face="Tahoma" size="2">welcome to CodeFire, an             online programming contest platform....</font></td>          </tr>        </table>        </center>      </div>      </td>    </tr>    <tr>      <td width="760" align="center" valign="top">      <table border="0" cellpadding="3" style="border-collapse: collapse" bordercolor="#111111" width="95%" id="AutoNumber2">        <tr>          <td bgcolor="#F7F7F7" align="left" valign="top">          <table border="0" cellpadding="2" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber5" bgcolor="#E6EAD7" cellspacing="1">            <tr>              <td width="100%" bgcolor="#FFFFFF" background="images/shade.JPG" height="31" align="left"><b>              <font face="Arial">Create Account</font></b></td>            </tr>            <tr>              <td width="100%" bgcolor="#FFFFFF">		<font face="Arial">
		<form action="register.php"  method="POST">
		<table>
	
		<?php
		$uide = $_GET["uid"];
		$eide = $_GET["eid"];
		$bgce = $_GET["bgc"];
		$pwde = $_GET["pwd"];
		$name = base64_decode($_GET["name"]);
		$email= base64_decode($_GET["email"]);
		$user = base64_decode($_GET["user"]); 
		echo "<tr><td>Real name : </td><td><input type='text' size='18' maxlength='80' name='name' value='$name'> <font face='arial' color='#c0c0c0' size='1'>your real name</font> </td></tr>";
		
		if ($uide == "err"){
			echo "<tr><td>Nickname : </td><td><input type='text' size='18' maxlength='80' name='uid' value='$user'> <font face='arial' color='red' size='1'><b>Username Exists</b></font></td></tr>";
			}
		elseif ($uide == "err1"){
			echo "<tr><td>Nickname : </td><td><input type='text' size='18' maxlength='80' name='uid' value='$user'> <font face='arial' color='red' size='1'><b>Username Too Short( Min 5 chars )</b></font></td></tr>";
			}
		else{
			echo "<tr><td>Nickname : </td><td><input type='text' size='18' maxlength='80' name='uid' value='$user'> <font face='arial' color='#b0b0b0' size='1'>Login/Site Username</font></td></tr>";
			}
		
		if ($pwde == "err"){
			echo "<tr><td>Password : </td><td><input type='password' size='18' maxlength='80' name='upwd' value='icpc2008'></td></tr><tr><td>Confirm password :</td><td><input type='password' size='18' maxlength='40' name='upwd2' value='icpc2008'><font face='arial' color='red' size='1'><b>ReCheck Password</b></font></td></tr>";
			}
		elseif ($pwde == "err1"){
			echo "<tr><td>Password : </td><td><input type='password' size='18' maxlength='80' name='upwd' value='icpc2008'></td></tr><tr><td>Confirm password :</td><td><input type='password' size='18' maxlength='40' name='upwd2' value='icpc2008'><font face='arial' color='red' size='1'><b>Password Too Short ( Min 6 chars )</b></font></td></tr>";
			}
		else
			echo "<tr><td>Password : </td><td><input type='password' size='18' maxlength='80' name='upwd' value='icpc2008'></td></tr><tr><td>Confirm password :</td><td><input type='password' size='18' maxlength='40' name='upwd2' value='icpc2008'></td></tr>";
		
			if ( $bgce == "err")
			echo "<tr><td>REG # : </td><td><input type='text' size='18' maxlength='80' name='bgc' value='---'> <font face='arial' color='red' size='1'><b>Reg Code Error</b></font></td></tr>";        
		elseif( $bgce == "err1")
			echo "<tr><td>REG # : </td><td><input type='text' size='18' maxlength='70' name='bgc' value='---'> <font face='arial' color='red' size='1'><b>Reg Code Exists</b></font></td></tr>";        
		else
			echo "<tr><td>REG # : </td><td><input type='text' size='18' maxlength='70' name='bgc' value='$bgce'></td></tr>";
		?>
		<tr><td align="center"><button type="SUBMIT">Register</button></td></tr>
		</table>
		</form>
		</font>              </td>            </tr>          </table>          </td>          <td width="250" align="left" valign="top">          <table border="0" cellpadding="2" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber4" bgcolor="#E8E8E8">            <tr>              <td width="100%" align="left" background="images/shade.JPG" height="31"><b>              <font face="Arial" color="#008000">&nbsp;</font><font face="Arial">Sign               in </font></b></td>            </tr>            <tr>              <td width="100%" bgcolor="#FFFFFF">              <form method="POST" action="login.php">             		<p>                <font face="Arial">&nbsp;username</font><br>			&nbsp;<input type="text" name="T1" size="20"><br>                <font face="Arial">&nbsp;password</font><br>			&nbsp;<input type="password" name="T2" size="20">                <input type="submit" value="Login" name="B1"><br>              </form>              </td>            </tr>          </table>          </td>        </tr>      </table>      </td>    </tr>    <tr>      <td width="760" bgcolor="#E9F0F8" background="images/shade.JPG" align="center">      <font face="Arial" size="1">Copyright Codefire 2008</font></td>    </tr>  </table>  </center></div></body></html>