<?php
session_start();
unset($_SESSION['login']);
setcookie(session_name(), '', time() - 3600, '/'); //Cookie'leri temizlemek icin.
echo "Çıkış yapıldı.";
header ("refresh:2 ; url=../index.php");
?>