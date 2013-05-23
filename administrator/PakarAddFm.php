<?php 
include "inc.session.php";
include "inc.header.php"; 
include "menu.php"; 
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";
?>
<html>
<head>
<title>Masukan Data Pakar Belimbing</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	background-color: #009966;
}
-->
</style></head>
<body>
<form action="PakarAddSim.php" method="post" name="form1" target="_self"><div align="center">
  <table width="800" border="0" cellpadding="2" cellspacing="1" bgcolor="#DBEAF5">
    <tr> 
      <td colspan="2" bgcolor="#77B6D0"><b>MASUKAN USERNAME</b></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td>UserName</td>
      <td><input name="TxtUsername" type="text" id="TxtUsername" size="25"  maxlength="25" >
      </td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="66">Password</td>
      <td width="686"><input name="TxtPassword" type="text" size="35" maxlength="25"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Simpan"></td>
    </tr>
  </table>
</form>
<tr>&nbsp;</tr>
<?php
include "inc.footer.php";
?>
</body>
</html>
