<?php 
if (!defined("ADMIN")) {die("Kullanıcı Girişi Gerekmektedir..");} //admin kontrolü

if (!get("id")) {
	header("location:index.php"); exit();
}
$id=(int)get("id");

$db->sql ="select * from tb_icerik where icerik_id=?";
$db->veri=array($id);

$icerik =$db->select(1);

if ($icerik==false) {
	header("location:index.php"); exit();
}

$db->sql = "delete from tb_icerik where icerik_id=?";
$db->veri=array($id);

$sil =$db->delete();

if ($sil==true) {
	header("location:index.php?url=icerikler&islem=silindi");
}
else{
	header("location:index.php?url=icerikler&islem=silinemedi");
}


 ?>