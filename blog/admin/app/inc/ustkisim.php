<?php
/*bu birinci yol
     //   require_once '../../system/sabitler.php';
    if (!isset($_SESSION["admin"])){
     //   $adres = URL."admin/index.php?url=login";
        echo "Kullanıcı Girişi Gerekmektedir...";
      //  header("location:$adres");
      //echo "kullanıcı girisi yapılmadı..";
      exit();}
*/
if (!defined("ADMIN")) {die("Kullanıcı Girişi Gerekmektedir..");}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>ADMİN İNDEX</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo URL; ?>public/admin/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo URL; ?>public/admin/css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo URL; ?>public/admin/css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo URL; ?>public/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>
