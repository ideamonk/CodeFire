<?php
include("includes/adminheader.inc.php");

?>
<center><br><br>
<form method="POST" action="">
  <table width="80%" border="0" align="center" cellpadding="2" cellspacing="2" bgcolor="#999999">
    <tr>
    <td background="images/header.jpg"><strong><font color="#FFFFFF" size="4" face="Arial, Helvetica, sans-serif">+ 
      Add News</font></strong></td>
  </tr>
  <tr>
      <td bgcolor="#CCCCCC" align="center"> 
        <p> <strong><font size="2" face="Arial, Helvetica, sans-serif">Title</font></strong> 
          <input name="head" type="text" size="80" length="30">
          <br>
          <font size="2" face="Arial, Helvetica, sans-serif">Description</font><br>
          <textarea name="news" rows="20"cols="80"></textarea>
        </p>
        </td>
  </tr>
  <tr>
      <td bgcolor="#FFFFFF">
	<div align="right"><input type="submit" name="Submit" value="Submit"></div>
      </td>
  </tr>

  <tr>
      <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>
  </form>
</center>