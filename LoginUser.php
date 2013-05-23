<?php
if(!empty($_SESSION['username_pengguna']))
{
    echo '<meta http-equiv="refresh" content="0;url=?page=datadiagnosa">';
}
else
{
?>
<h4><span class='icon-inbox'></span> Login User - Belimbing Manis</h4>
<form action="?page=actloginuser" method="post" name="form1" target="_self">
  
    <label for="menu">Username</label>
    <div class="cleaner_h5"></div>
    <input type="search" style="width:90%;" id="username" name="username" placeholder="Username" value="" required />
    <div class="cleaner_h10"></div>
  
    <label for="menu">Password</label>
    <div class="cleaner_h5"></div>
    <input type="password" style="width:90%;" id="password" name="password" placeholder="Password" value="" required />
    <div class="cleaner_h10"></div>
  
    <label for="menu">-</label>
    <div class="cleaner_h5"></div>
    <input type="submit" value="Register" class="btn btn-info" />
    <div class="cleaner_h10"></div>

</form>
<?php
}
?>