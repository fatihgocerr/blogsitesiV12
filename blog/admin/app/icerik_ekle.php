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
                <h1 class="page-header">İÇERİK EKLE</h1>
                <div class="row">
                 <div class="col-lg-12">
                    <?php 

                    if (pisset()) {
                        $tarih=date("Y-m-d");
                        $icerik_kategori=post("icerik_kategori");
                        $icerik_baslik=post("icerik_baslik");
                        $icerik_aciklama=post("icerik_aciklama");
                        $icerik_detay=post("icerik_detay");

                        if ($icerik_kategori=="" and $icerik_baslik =="") {
                           echo'<div class="alert alert-warning">
                                    <strong>Uyarı</strong><br> İçerik Kategori veya İçerik Başlık Gerekli  <a href="#" class="alert-link">Yeni Ekle</a>  </div>';
                        }else{
                            $db->sql ="insert into tb_icerik set icerik_baslik =?, icerik_aciklama=?, icerik_detay=?, icerik_kat_id=?,tarih=?";
                            $db->veri = array($icerik_baslik,$icerik_aciklama,$icerik_detay,$icerik_kategori,$tarih);
                            $ekle=$db->insert();
                            if ($ekle) {
                                echo '<div class="alert alert-success">
                                        <strong>Başarlı</strong><br> Bilgiler Eklendi  <a href="#" class="alert-link">Yeni Ekle</a> </div>';
                            }else{
                                echo '<div class="alert alert-danger">
                                        <strong>Başarısız</strong><br> Bilgiler Eklenemedi  <a href="#" class="alert-link">Yeni Ekle</a></div>';
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
                                                            echo '<option value="' . $value->kategori_id . '">'.$value->kategori_baslik.'</option>';   
                                                        }
                                                    }
                                                    ?>

                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label>İçerik Başlık</label>
                                             <input class="form-control" name="icerik_baslik">

                                            </div>
                                            <div class="form-group">
                                                <label>İçerik Açıklama</label>
                                                <textarea class="form-control" name="icerik_aciklama" id="" rows="3"></textarea>

                                            </div> 
                                            <div class="form-group">
                                                <label>İçerik Detay</label>
                                                <textarea class="form-control ckeditor" name="icerik_detay" id="" rows="5"></textarea>

                                            </div> 
                                               
                                            <input type="submit" Value="EKLE" class="btn btn-info">
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