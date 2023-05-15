<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['nama_user']);

session_destroy();
echo "
<script>
alert('Anda Telah Keluar');
window.location = 'login.php';
</script>
";

?>