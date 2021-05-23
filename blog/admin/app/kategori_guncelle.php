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
                <h1 class="page-header">KATEGORİ GÜNCELLE</h1>
                <div class="row">
                 <div class="col-lg-12">
                    <?php 
                    if (!get("id")) {
                        header("location:index.php"); exit(); 
                    }

                    $id=(int)get("id");
                    $db->sql="select * from tb_kategori where kategori_id=?";
                    $db->veri=array($id);

                    $kategori=$db->select(1);

                    if ($kategori==false) {
                        header("location:index.php"); exit();
                    }

                    $kategori_baslik=$kategori->kategori_baslik;
                    

                    //buradan yukarısı içerikleri listelemek için kullandık aşağısı ise içeriği güncellemek için

                    
                    if (pisset()) {
                        $kategori_baslik=post("kategori_baslik");
                        

                        if ($kategori_baslik=="") {
                         echo'<div class="alert alert-warning">
                         <strong>Uyarı</strong><br> Kategori Başlık Gerekli  </div>';
                     }else{
                        $db->sql ="update tb_kategori set kategori_baslik=? where kategori_id=?";
                        $db->veri = array($kategori_baslik,$id);
                        $guncelle=$db->update();
                        if ($guncelle) {
                            echo '<div class="alert alert-success">
                            <strong>Başarlı</strong><br> Güncelleme Başarılı   </div>';
                        }else{
                            echo '<div class="alert alert-danger">
                            <strong>Başarısız</strong><br> Güncelleme Başarısız!  </div>';
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
                                        <label>Kategori Başlık</label>
                                        <p> Güncellenecek Kategori::  <?=$kategori_baslik ?></p>
                                        <input class="form-control" name="kategori_baslik" value="<?=$kategori_baslik ; ?>">

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