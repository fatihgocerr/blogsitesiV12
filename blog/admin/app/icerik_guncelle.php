<?php require 'inc/ustkisim.php'; ?>
<div id="wrapper">

    <!-- Navigation -->
    <?php
    require 'inc/top_nav.php'; 
    require 'inc/left_nav.php';
    ?>

</nav>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">İÇERİK GÜNCELLE</h1>
                <div class="row">
                   <div class="col-lg-12">
                    <?php 
                    if (!get("id")) {
                        header("location:index.php"); exit(); 
                    }

                    $id=(int)get("id");
                    $db->sql="select * from tb_icerik where icerik_id=?";
                    $db->veri=array($id);

                    $icerik=$db->select(1);

                    if ($icerik==false) {
                        header("location:index.php"); exit();
                    }

                    $icerik_baslik=$icerik->icerik_baslik;
                    $icerik_aciklama=$icerik->icerik_aciklama;
                    $icerik_detay=$icerik->icerik_detay;
                    $icerik_kat_id=$icerik->icerik_kat_id;

                    //buradan yukarısı içerikleri listelemek için kullandık aşağısı ise içeriği güncellemek için

                    
                    if (pisset()) {
                        $tarih=date("Y-m-d");
                        $icerik_kategori=post("icerik_kategori");
                        $icerik_baslik=post("icerik_baslik");
                        $icerik_aciklama=post("icerik_aciklama");
                        $icerik_detay=post("icerik_detay");

                        if ($icerik_kategori=="" and $icerik_baslik =="") {
                           echo'<div class="alert alert-warning">
                                    <strong>Uyarı</strong><br> İçerik Kategori veya İçerik Başlık Gerekli  </div>';
                        }else{
                            $db->sql ="update tb_icerik set icerik_baslik =?, icerik_aciklama=?, icerik_detay=?, icerik_kat_id=?, tarih=? where icerik_id=?";
                            $db->veri = array($icerik_baslik,$icerik_aciklama,$icerik_detay,$icerik_kategori,$tarih,$id);
                            $guncelle=$db->update();
                            if ($guncelle) {
                                echo '<div class="alert alert-success">
                                        <strong>Başarlı</strong><br> Değişiklikler Eklendi   </div>';
                            }else{
                                echo '<div class="alert alert-danger">
                                        <strong>Başarısız</strong><br> Değişiklikler Eklenemedi  </div>';
                            }
                        }
                    }

                    
                    ?>
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            İçerik Bilgileri
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="POST">
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="form-control" name="icerik_kategori">
                                                <option value="">Seçiniz</option>
                                                <?php 
                                                $db->sql ="select * from tb_kategori";
                                                $kategoriler=$db->select();
                                                if ($kategoriler !=false) {
                                                   foreach ($kategoriler as $key => $value) {
                                                    if ($icerik_kat_id==$value->kategori_id) {
                                                        $selected="selected";
                                                    }
                                                    else{$selected="";}
                                                    echo '<option value="' . $value->kategori_id . '"'.$selected.'>'.$value->kategori_baslik.'</option>';   
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>İçerik Başlık</label>
                                        <input class="form-control" name="icerik_baslik" value="<?=$icerik_baslik ; ?>">

                                    </div>
                                    <div class="form-group">
                                        <label>İçerik Açıklama</label>
                                        <textarea class="form-control" name="icerik_aciklama" id="" rows="3"><?=$icerik_aciklama; ?></textarea>

                                    </div> 
                                    <div class="form-group">
                                        <label>İçerik Detay</label>
                                        <textarea class="form-control ckeditor" name="icerik_detay" id="" rows="5"><?=$icerik_detay; ?></textarea>

                                    </div> 

                                    <input type="submit" Value="GÜNCELLE" class="btn btn-info">
                                </form>
                            </div>

                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<?php require 'inc/altkisim.php' ?>