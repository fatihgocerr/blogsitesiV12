        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="description" content="">
                <meta name="author" content="">

                <title>Admin:Login</title>

                <!-- Bootstrap Core CSS -->
                <link href="<?php echo URL; ?>public/admin/css/bootstrap.min.css" rel="stylesheet">

                <!-- MetisMenu CSS -->
                <link href="<?php echo URL; ?>public/admin/css/metisMenu.min.css" rel="stylesheet">

                <!-- Timeline CSS -->
                <link href="<?php echo URL; ?>public/admin/css/timeline.css" rel="stylesheet">

                <!-- Custom CSS -->
                <link href="<?php echo URL; ?>public/admin/css/startmin.css" rel="stylesheet">

                <!-- Morris Charts CSS -->
                <link href="<?php echo URL; ?>public/admin/css/morris.css" rel="stylesheet">

                <!-- Custom Fonts -->
                <link href="<?php echo URL; ?>public/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css">

                <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
                <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
                <!--[if lt IE 9]>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
                <![endif]-->
            </head>
            <body>

                <div class= "container">

                    <div class="row">
                         <div class="col-lg-4 col-lg-offset-4" style="margin-top: 150px">
                                <div class="row">
                                    <div class="col-md-12">
                                     <?php 
                                  /* $a="14531453";
                                   $ya=md5($a); md5 ile şifre oluşturmak için
                                   echo $ya; */
                            if (pisset()) {
                                $kullanici=post("kullanici");
                                $sifre = post("sifre");
                                $ysifre=md5($sifre);
                                if ($kullanici=="" or $sifre=="") {
                                    echo '<div class="alert alert-warning"><strong>Uyarı</strong>Kullanıcı Bilgileri Girilmedi</div>';

                                }
                                else{
                                    $db->sql ="select * from tb_uye where uye_kullanici =? and uye_sifre =? and uye_onay =? and ( uye_yetki =? or uye_yetki =? )";
                                    $db->veri=array($kullanici,$ysifre,1,"admin","editor");

                                    $uye=$db->select(1);
                                    
                                    if ($uye != false) {
                                      echo '  <div class="alert alert-success"><strong>Başarılı</strong>Kullanıcı Bilgileri Doğru</div>';
                                      $_SESSION["admin"]=true;
                                      $_SESSION["uye_adsoyad"] =$uye->uye_adsoyad;
                                      $_SESSION["uye_yetki"] =$uye->uye_yetki;
                                       header("location:index.php");
                                    exit();
                                     }
                                      else{
                                    echo '<div class="alert alert-danger"><strong>Başarısız</strong>Kullanıcı Bilgileri Doğrulanamadı</div>';
                                         }
                                    }
                            }
                             ?> 
                                    </div>
                                </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">&nbsp</div>
                                        <div class="panel-body">
                                  
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <form role="form" method="post" action="index.php?url=login">
                                                        <div class="form-group">
                                                            <label>Kullanıcı: </label>
                                                            <input class="form-control" type="text" name="kullanici" placeholder="Kullanıcı">
                                                            <p class="help-block"></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Şifre</label>
                                                            <input class="form-control" type="text" name="sifre" placeholder="Şifreniz">
                                                        </div>
                                                                                                                                          
                                                     
                                                  
                                                            <button type="submit" class="btn btn-info">GİRİŞ</button>
                                                        
                                                    </form>
                                                </div>
                                           
                                            </div>
                                          
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                    
                </div>
                

                <!-- jQuery -->
                <script src="<?php echo URL; ?>public/admin/js/jquery.min.js"></script>

                <!-- Bootstrap Core JavaScript -->
                <script src="<?php echo URL; ?>public/admin/js/bootstrap.min.js"></script>

                <!-- Metis Menu Plugin JavaScript -->
                <script src="<?php echo URL; ?>public/admin/js/metisMenu.min.js"></script>

                <!-- Morris Charts JavaScript -->
                <script src="<?php echo URL; ?>public/admin/js/raphael.min.js"></script>
                <script src="<?php echo URL; ?>public/admin/js/morris.min.js"></script>
                <script src="<?php echo URL; ?>public/admin/js/morris-data.js"></script>

                <!-- Custom Theme JavaScript -->
                <script src="<?php echo URL; ?>public/admin/js/startmin.js"></script>

            </body>
        </html>
