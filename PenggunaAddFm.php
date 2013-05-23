<?php 
include "librari/inc.koneksidb.php";
?>
<html>
<head>
<title>Form Masukan Data Pengguna</title>
</head>
<body>
<form action="?page=daftarsim" method="post" name="form1" target="_self">
  <table width="594" border="0" cellpadding="2" cellspacing="1" bgcolor="#DBEAF5">
    <tr>
      <td bgcolor="#DBEAF5">&nbsp;</td>
      <td colspan="2" bgcolor="#DBEAF5">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#DBEAF5">&nbsp;</td>
      <td colspan="2" bgcolor="#DBEAF5"><b>MASUKAN DATA PENGGUNA </b></td>
    </tr>
    <tr> 
      <td bgcolor="#DBEAF5">&nbsp;</td>
      <td colspan="2" bgcolor="#DBEAF5">&nbsp;</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="39" bgcolor="#DBEAF5">&nbsp;</td> 
      <td bgcolor="#DBEAF5">Nama</td>
      <td bgcolor="#DBEAF5"> 
      <input name="TxtNama" type="text" size="35" maxlength="60"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="33" bgcolor="#DBEAF5">&nbsp;</td> 
      <td bgcolor="#DBEAF5">Kelamin</td>
      <td bgcolor="#DBEAF5"> 
        <input type="radio" name="RbKelamin" value="P" checked>
        Pria 
        <input type="radio" name="RbKelamin" value="W">
      Wanita</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="31" bgcolor="#DBEAF5">&nbsp;</td> 
      <td bgcolor="#DBEAF5">Usia</td>
      <td bgcolor="#DBEAF5"> 
      <input name="TxtUsia" type="text" id="TxtUsia" size="25" maxlength="60"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="61" height="32" bgcolor="#DBEAF5">&nbsp;</td> 
      <td width="91" bgcolor="#DBEAF5">Alamat</td>
      <td width="426" bgcolor="#DBEAF5"> 
      <input name="TxtAlamat" type="text" id="TxtAlamat" size="45" maxlength="70"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="40" bgcolor="#DBEAF5">&nbsp;</td> 
      <td bgcolor="#DBEAF5">&nbsp;</td>
      <td bgcolor="#DBEAF5"> 
      <input type="submit" name="Submit" value="Daftar"></td>
    </tr>
  </table>
</form>
</body>
</html>
