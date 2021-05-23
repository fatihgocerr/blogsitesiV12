<div class="kutu">
	<h2>KATEGORİLER</h2>
	<div>
		<ul class="sag_kategori">
			<?php  
			$db->sql ="select * from tb_kategori";
			$sag_kategori=$db->select();
			if ($sag_kategori!=false) {
				foreach ($sag_kategori as $key => $value) {
					?>
					<li><a href="index.php?url=kategori&id=<?=$value->kategori_id;?>"><?=$value->kategori_baslik;?></a></li>	
					<?php 
				}
			}
			?>


		</ul>
	</div>
	<div>
		<h2>SON YORUMLANANLAR</h2>
		<ul class="sag_son_yorumlananlar">
			<?php 
			$db->sql ="select * from tb_yorum where yorum_onay=1 order by yorum_id desc limit 5"; //yorum onay kontrolü var
			$son_yorumlananlar=$db->select();
			if ($son_yorumlananlar) {
				foreach ($son_yorumlananlar as $key => $value) {
					$icerik_id=$value->yorum_icerik_id;
					$db->sql="select * from tb_icerik where icerik_id=?";
					$db->veri=array($icerik_id);
					$icerik=$db->select(1);

					?>	
					<li><a href="index.php?url=icerik&id=<?php echo $icerik->icerik_id; ?>"><?php echo $icerik->icerik_baslik;?> <b>İçin</b> <?php echo $value->yorum_adsoyad; ?></a></li>
					<?php 
				}
			}
			?>
		</ul>
	</div>
	<div>
		<h2>En Çok Görüntülenenler</h2>

		<ul class="sag_goruntulenenler">
			<?php 
			$db->sql="select * from tb_icerik order by hit desc limit 5"; //hit almasına göre listeleme
			$en_cok_goruntulenenler=$db->select();
			if ($en_cok_goruntulenenler!=false) {
				foreach ($en_cok_goruntulenenler as $key => $value) {

					?>
			<li><a href="index.php?url=icerik&id=<?php echo $value->icerik_id; ?>"><?php echo $value->icerik_baslik; ?>(<?php echo $value->hit; ?>)</a></li>

								
									<?php 
				}
			}
			 ?>
			
		</ul>
	</div>
</div>