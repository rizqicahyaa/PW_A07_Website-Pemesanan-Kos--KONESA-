<?php 
session_start();
include "../koneksi.php";
$kon = new Koneksi();
$idpencari = @$_SESSION['pencari_id'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
    <!-- Title  -->
    <title>Konesa - Website Penyedia Jasa Penyewaan Kos Sekitar Unesa</title>

    <!-- Favicon  -->
    <link rel="icon" href="../images/logo.png" />
  </head>

  <body>
    <!-- Preloader -->
    <div id="preloader">
      <div class="south-load"></div>
    </div>

    <!-- Main Header Area -->
    <div class="main-header-area" id="stickyHeader">
      <div class="classy-nav-container">
        <!-- Classy Menu -->
        <nav class="classy-navbar justify-content-sm-start">
          <div class="col-4">
            <a href="index_pencari.php"
              ><i class="fa fa-circle-chevron-left"></i
            ></a>
          </div>
          <!-- Nav Start -->
          <div class="classy-navbar">
            <ul>
              <li><h2 class="font-weight-bold">Data Diri</h2></li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
    <!-- ##### Header Area End ##### -->

    <!-- Featured Properties Area Start (Profil)-->
    <section
      class="featured-properties-area section-padding-50"
      style="background-color: white; margin-top: 30px;"
    >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="section-heading wow fadeInUp">
                <div class="row">
                  <!-- foto -->
                  <?php 
                    $que = $kon->kueri("SELECT * FROM pencari_kos WHERE pencari_id = '$idpencari'");
                    $hasil = $kon->hasil_data($que);
                  ?>
                  <div class="input-group col-lg-2 mt-2">
                    <div class="input-group">
                    <img src="<?= $hasil['pencari_gambar']; ?>" class="rounded-circle ml-3" style="width: 150px; height: 150px; object-fit:cover;">
                    </div>
                  </div>
                  <!-- Nama Lengkap -->
                  <div class="input-group col-lg-8 mt-2 mb-2">
                    <div class="input-group col-sm-6 mt-4">
                      <h5 class="font-weight-bold">Nama Lengkap</h5>
                    </div>
                    <div class="input-group col-sm-6 mt-4">
                      <h5 class="font-weight-bold"><?php echo $hasil['pencari_nama'] ?></h5>
                    </div>
                    <!-- Tanggal Lahir -->
                    <div class="input-group col-sm-6 mt-4">
                      <h5 class="font-weight-bold">Tanggal Lahir</h5>
                    </div>
                    <div class="input-group col-sm-6 mt-4">
                      <h5 class="font-weight-bold"><?php echo $hasil['pencari_tanggal_lahir'] ?></h5>
                    </div>
                      <!-- Jenis Kelamin -->
                      <div class="input-group col-sm-6 mt-4">
                        <h5 class="font-weight-bold">Jenis Kelamin</h5>
                      </div>
                      <div class="input-group col-sm-6 mt-4">
                        <h5 class="font-weight-bold"><?php echo $hasil['pencari_gender'] ?></h5>
                      </div>
                      <!-- Email -->
                      <div class="input-group col-sm-6 mt-4">
                        <h5 class="font-weight-bold">Email</h5>
                      </div>
                      <div class="input-group col-sm-6 mt-4">
                        <h5 class="font-weight-bold"><?php echo $hasil['pencari_email'] ?></h5>
                      </div>
                      <!-- No.Hp -->
                      <div class="input-group col-sm-6 mt-4">
                        <h5 class="font-weight-bold">No.Hp</h5>
                      </div>
                      <div class="input-group col-sm-6 mt-4">
                        <h5 class="font-weight-bold"><?php echo $hasil['pencari_telp'] ?></h5>
                      </div>     
                  </div>
                  
                  <div class="input-group col-lg-2 justify-content-sm-end">
                    <a href="data_edit.php" class="h5 font-weight-bold">Edit</a>
                  </div>
              </div>
            </div>
          </div>
        </div>
    </section>

    <!-- Featured Properties Area Start (Ubah identitas)-->
    <section
      class="featured-properties-area section-padding-50"
      style="background-color: white; margin-top: 30px;"
    >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="section-heading wow fadeInUp">
                <div class="row">
                  <!-- jenis dan foto identitas-->
                  <div class="input-group col-lg-6 mt-2 mb-2">
                    <div class="input-group col-sm-6 mt-4">
                      <h3 class="font-weight-bold">Identitas</h3>
                    </div>
                    <div class="input-group col-sm-12 mt-4">  
                    <h5 class="font-weight-bold">Foto Identitas</h5>
                  </div>
                  <div class="input-group col-sm-12 mt-2">
                  <img src="<?= $hasil['pencari_foto_identitas']; ?>" class="ml-3" style="width: 150px; height: 150px; object-fit:cover;">
                  </div>
                </div>
                <div class="input-group col-lg-6 justify-content-sm-end">
                    <a href="identitas_edit.php" class="h5 font-weight-bold">Edit</a>
                  </div>
                    <div class="input-group col-sm-12 mt-2">  
                    <h5 class="font-weight-bold">Jenis Identitas</h5>
                  </div>
                  <div class="input-group col-sm-12 mt-2">
                    <h5 class="font-weight-bold"><?php echo $hasil['pencari_jenis_identitas'] ?></h5>
                  </div>
                  
              </div>
            </div>
          </div>
        </div>
    </section>

    <!-- ##### Featured Properties Area End ##### -->
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="jquery.form.js"></script>
    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="../js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="../js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="../js/plugins.js"></script>
    <script src="../js/classy-nav.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <!-- Active js -->
    <script src="../js/active.js"></script>
  </body>
</html>
