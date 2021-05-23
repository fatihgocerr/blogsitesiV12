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
                <h1 class="page-header">İÇERİKLER</h1>
                <?php 
                $db->sql="select * from tb_icerik order by icerik_id desc";
                $icerikler=$db->select();
                if ($icerikler == false) {
                    echo '<p> İçerik bulunamadı..</p>';
                }else{
                 ?>
                   
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tüm İçerikler
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <?php 
                            if (get("islem")=="silindi") {
                                echo '<div class="alert alert-success"><strong>BAŞARILI</strong> Bilgiler Silindi</div> ';
                            }elseif (get("islem")=="silinemedi") {
                                echo '<div class="alert alert-danger"><strong>BAŞARISIZ</strong> Bilgiler Silinemedi</div> ';
                            }
                             ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>İçerik Başlık</th>
                                            <th>Hit</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no=1;
                                        foreach ($icerikler as $key => $value) {
                                            
                                          ?>
                                        <tr>
                                            <td><?=$no++?></td>
                                            <td><?php echo $value->icerik_baslik; ?></td>
                                            <td><?php echo $value->hit; ?></td>
                                            <td> 
                                                <a href="index.php?url=icerik_guncelle&id=<?=$value->icerik_id;?>" class="btn btn-info" onclick="return confirm('İçeriği düzenlemek istediğinizden emin misiniz?');">Düzelt</a> <!-- return ile onaya sunduk-->
                                                <a href="index.php?url=icerik_sil&id=<?=$value->icerik_id;?>" class="btn btn-danger"class="btn btn-info" onclick="return confirm('İçeriği SİLMEK istediğinizden emin misiniz?');">Sil</a>
                                            </td>
                                            
                                        </tr>
                                      <?php
                                      }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                <?php } ?>
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