<?php
if(!empty($_SESSION['username_admin']))
{
    echo '<meta http-equiv="refresh" content="0;url=administrator/">';
}
else
{
?>
<h4><span class='icon-table'></span> Login Admin - Belimbing Manis</h4>
<form action="?page=logincek" method="post" name="form1" target="_self">
  
    <label for="menu">Username</label>
    <div class="cleaner_h5"></div>
    <input type="search" style="width:90%;" id="username" name="TxtUser" placeholder="Username" value="" required />
    <div class="cleaner_h10"></div>
  
    <label for="menu">Password</label>
    <div class="cleaner_h5"></div>
    <input type="password" style="width:90%;" id="password" name="TxtPasswd" placeholder="Password" value="" required />
    <div class="cleaner_h10"></div>
  
    <label for="menu">-</label>
    <div class="cleaner_h5"></div>
    <input type="submit" value="Register" class="btn btn-info" />
    <div class="cleaner_h10"></div>

</form>
<?php
}
?>
