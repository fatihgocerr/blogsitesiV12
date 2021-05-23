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
                            <?php 
                            if ($_SESSION["uye_yetki"]=="admin") {
                                # code...
                            ?>
                            <h1 class="page-header">AYARLAR</h1>
                            <?php  
                            }else 
                            {
                                echo '<h1 class="page-header">UYARI</h1>';
                                echo '<p>Bu Sayfaya Editörlerin Erişim İzni Yoktur..</p>';
                            }
                            ?>
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