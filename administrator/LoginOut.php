<? session_start();
unset($_SESSION['username']);
session_destroy();
echo "<meta http-equiv='refresh' content='0; url=Login.php'>";
exit;
?>