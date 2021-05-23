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
                <h1 class="page-header">KATEGORİ EKLE</h1>
                <div class="row">
                   <div class="col-lg-12">
                    <?php 
                            if (pisset()) {         //pisset=> POST isset => POST varsa
                                $kategori_baslik= post("kategori_baslik");
                                if ($kategori_baslik=="") {
                                    echo'<div class="alert alert-warning">
                                    <strong>Uyarı</strong><br> Kategori Başlık Gerekli  <a href="#" class="alert-link">Yeni Ekle</a>  </div>';
                                }else {
                                    $db->sql = "insert into tb_kategori set kategori_baslik=?";
                                    $db->veri =array($kategori_baslik);
                                    $ekle = $db->insert();
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
                                    Kategori Bilgileri
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form role="form" method="POST">
                                                <div class="form-group">
                                                    <label>Kategoriler</label>
                                                    <select class="form-control">
                                                        <?php 
$db->sql ="select * from tb_kategori";
$kategoriler=$db->select();
if ($kategoriler !=false) {
   foreach ($kategoriler as $key => $value) {
    echo '<option value="">'.$value->kategori_baslik.'</option>';   
}
}
                                                         ?>
                                                        
                                                    </select>

                                                </div>
                                                <div class="form-group">
                                                    <label>Kategori Başlık</label>
                                                    <input class="form-control" name="kategori_baslik">

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