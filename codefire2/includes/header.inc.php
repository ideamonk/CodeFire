<?php
include_once("lib.php");
session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
header('Location: index.php?err=1');
exit;
}
?>
<html>
<head>
<style text="text/css">
body {font-family: Arial, Verdana, Tahoma}
.topMenu {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #FFFFFF;
	text-decoration:bold;
	display:block;
}

.topMenu a {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #FFFFFF;
	text-decoration: none;
	font-weight: bold;
}
.topMenu a:link {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #FFFFFF;
	text-decoration: none;
	font-weight: bold;
}
.topMenu a:hover {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #498fa1;
	text-decoration: none;
	font-weight: bold;
}
.centerMenu {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #FFFFFF;
	font-weight: bold;
	text-decoration: none;
	padding:2px;
}
.centerMenu a{
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #FFFFFF;
	font-weight: bold;
	display:inline-block;
	text-decoration: none;
	padding:2px;
	background:#0000ff;
}
.centerMenu a:hover {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #ffffff;
	font-weight: bold;
	text-decoration: underline;
	display:inline-block;
	background:#000000;
	padding:2px;
}

</style>
<title>Codefire Home</title>
<link href="style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<style type="text/css">
<!--
.leftMsg {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
	color: #0000CC;
	text-decoration: none;
}
.greenButton {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #333333;
	text-decoration: none;
	font-weight: bold;
}
-->
</style>
</head>

<body topmargin="1" leftmargin="1" bgcolor="#E0F3FE"><div align="left"><table width="100%" border="0" align="center" style="text-align: Left"> 
<tr>
      <td valign="middle" align="center"> 
        <div align="center">
          <center>
          
      <table width="100%" border="0" bgcolor="#72d9f6">
        <tr>
          <td align="right" valign="middle" background="images/centback.jpg" bgcolor="#72d9f6" class="topMenu"><a href="profile.php?id=<?php $uid = $_SESSION['logged_in'];  echo $uid; ?>">My 
            Profile</a> | <a href="javascript:alert('disabled for ICPC prelims :P')">Change Password</a> | <a href="logout.php">Logout 
            </a></td>
        </tr>
        <tr> 
          <td width="100%" height="130" align="center" valign="top" background="images/backtop.jpg" bgcolor="#FFFFFF"> 
            <div align="center"><img src="images/logo2.jpg" width="800" height="130"></div>
            </td>
        </tr>
        <tr> 
          <td width="100%" height="20" valign="middle" background="images/centback.jpg" bgcolor="#66CCFF"> 
            <p align="center" class="centerMenu">{ <a href="main.php"> Home</a> 
              | <a href="profile.php?id=<? echo $uid; ?>"> My Profile</a> | <a href="rules.php" target="_new"> 
              How to use CodeFire</a> | <a href="sitestats.php"> Stats</a> |  <a href="about.php"> About</a>  
              }</p></td>
        </tr>
      </table>
        </div>
      </td>
    </tr>
    <tr>
      <td valign="top" bgcolor="#F5F5F5"> 
        <div align="center">
          <center>
          <table width="100%" border="0" cellpadding="3" cellspacing="2" valign="top">
            <tr valign="top">
              <td width="200" align="left" valign="top" bgcolor="#FFFFFF"> 
                <table width="250" cellpadding="1" cellspacing="2" bgcolor="#72d9f6">
          <tr>
                    
            <td align="left" valign="middle" background="images/centback.jpg" bgcolor="#FFFFFF" style="display:inline-block;background:#FFFF00;color:#000000;padding:6px;" class="leftMsg">+ 
              Hello 
              <?php
			
			$sql_query = "SELECT * FROM userdata WHERE uno='$uid'";  
			$result = $GLOBALS["DB"]->result($sql_query);

			$sql_query = "SELECT sum(patt) FROM subm WHERE uid ='".$_SESSION['logged_in']."' AND status='p'";
			$result1 = $GLOBALS["DB"]->result($sql_query);
			
				echo $result[0][uid];
			if ( $result[0][att] > 0 ) $accpts = $result[0][cat] / ($result[0][att] + $result1[0]["sum(patt)"]) * 100; else $accpts = "N/A";
			?>
              ! </td>
                  </tr>
                  <tr> 
                    
            <td align="left" valign="top" bgcolor="#FFFFFF"> 
              <table width="100%" border="0" cellpadding="0" cellspacing="2" bgcolor="#00CC00">
                <tr> 
                  <td height="29" background="images/greenback.jpg" bgcolor="#DDF3C7"> 
                    <div align="center"><a href="main.php" class="greenButton">Problem List </a></div></td>
                </tr>
              </table>
              <table width="100%" border="0" cellpadding="0" cellspacing="2" bgcolor="#00CC00">
                <tr> 
                  <td height="29" background="images/greenback.jpg" bgcolor="#DDF3C7"> 
                    <div align="center"><a href="mysub.php" class="greenButton">My 
                      Submissions</a></div></td>
                </tr>
              </table>
              <table width="100%" border="0" cellpadding="0" cellspacing="2" background="images/statback.jpg">
                <tr align='left' valign='middle'> 
                  <td width='61%'><strong><font color='#006699' size='2' face='Arial, Helvetica, sans-serif'>Total 
                            points<br>
                            </font></strong></td>
                          <td width='39%'><strong><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'> <?php echo $result[0][tpts] ?></font></strong></td>
                        </tr>
                        
                <tr align='left' valign='middle'> 
                  <td><strong><font color='#006699' size='2' face='Arial, Helvetica, sans-serif'>Percentile</font></strong></td>
			<?php
			$sql_query = "SELECT count(uno) FROM `userdata`";
			$total = $GLOBALS["DB"]->result($sql_query);
			if ( $result[0][rank] >= 0 && $result[0][cat]>0) { 
					$perc = ( ( $total[0]["count(uno)"] - $result[0][rank]+1 ) / $total[0]["count(uno)"] ) * 100; 
					$ranker = $result[0][rank]; 
				} else { 
					$perc = "N/A";
					$ranker = "N/A";
				}
            ?>
			<td><strong><font color='#000000' size='2' face='Arial, Helvetica, sans-serif'><? echo (int)$perc ?></font></strong></td>
			
                        </tr>
                        
                <tr align='left' valign='middle'> 
                  <td><strong><font color='#006699' size='2' face='Arial, Helvetica, sans-serif'>Accuracy</font></strong></td>
                          <td><font size='2' face='Arial, Helvetica, sans-serif'><strong><? echo (int)$accpts ?> %</strong></font></td>
                        </tr>
                        
                <tr align='left' valign='middle'> 
                  <td><font color='#669900' size='2' face='Arial, Helvetica, sans-serif'><strong>Rank</strong></font></td>
                          <td><strong><font color='#009900' size='2'><? echo $ranker; ?></font></strong></td>
                        </tr>
                      </table></td>
                  </tr>
  <tr> 
                    
            <td background="images/centback.jpg" valign="middle" align="left" height="31" bgcolor="#F3F3F3"><b><font color="#000000">+ 
              Problems</font></b></td>
                  </tr>
                  <tr> 
                    
            <td height="31" align="left" valign="middle" background="images/statback.jpg" bgcolor="#FFFFFF"> 
              <ul>
                     
<?
$sql_query = "SELECT * FROM `quest`";
$result = $GLOBALS["DB"]->result($sql_query);

foreach($result as $res){ 
	echo "<li><font color='#000000' size='2'><a href='submit.php?qid=$res[qid]'>$res[name]</a></font></li>";
	
	}
?>
                      </ul></td>
                  </tr>                  <tr> 
                    
            
            <td bgcolor="#FFFFFF" background="images/centback.jpg" height="31" valign="middle"><b><font size="3">+ 
              Instructions</font></b></td>
                  </tr>
                  <tr> 
                    <td bgcolor="#FFFFFF" valign="top" align="left">
					<small>
					<ul>
  <li>Work environment is linux based gcc/g++ compiler.</li>
  <li>Stick to the input/output specification as defined by the problem.</li>
  <li>Your programs should read the inputs in same order as the problem mentions</li>
  <li>Remember, the programs you submit are autocompiled and tested with judge inputs automatically. So, you can appreciate how important it is to stick by the order &amp; number of inputs/outputs</li>
  <li>Once done, always test your code with sample input outputs given in the problem</li>
  <li>All problems have different points, if you try a problem again after getting a wrong answer flag from judge, you will get a lesser percentage of total points.</li>
  <li>Keep checking out the My Submissions link for status of the code you submitted.</li>
  <li>Rankings can be seen from the Stats link on top</li>
  <li>You can either copy-paste the code into submission box or you can even browse-upload your c/c++ source file</li>
  </ul>
</small>
					
					
					</td>
                  </tr>
                  <tr> 
                    <td bgcolor="#FFFFFF"></td>
                  </tr>
                  <tr> 
                    <td bgcolor="#FFFFFF" width="200">&nbsp;</td>
                  </tr>
                </table>
				
              </td>