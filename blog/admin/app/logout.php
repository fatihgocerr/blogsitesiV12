<?php
if (!defined("ADMIN")) {die("Kullanıcı Girişi Gerekmektedir..");}
session_destroy();
header("location:index.php?url=login");
?>