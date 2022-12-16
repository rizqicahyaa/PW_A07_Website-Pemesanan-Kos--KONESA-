<?php 
@session_start();
require_once '../koneksi.php';
$kon = new Koneksi();

$idpemilik = @$_SESSION['pemilik_id'];
$idiklan = @$_REQUEST['iklan_id'];
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
            <a href="index_pemilik.php"
              ><i class="fa fa-circle-chevron-left"></i
            ></a>
          </div>
          <!-- Nav Start -->
          <div class="classy-navbar">
            <ul>
              <li><h2 class="font-weight-bold">Iklan</h2></li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
    <!-- ##### Header Area End ##### -->

    <!-- Featured Properties Area Start -->
    <section
      class="featured-properties-area section-padding-100-50"
      style="margin-top: 30px"
    >
      <!-- iklan -->
      <div class="container">
        
        <div class="row">
          <?php
                    
          $que = $kon->kueri("SELECT * FROM iklan");
          while ($hasil = $kon->hasil_data($que)) { ?>
          <div class="col-sm-4 mt-4">
            <div class="pricing card-deck flex-column flex-md-row mb-3">
              <div class="card card-pricing shadow px-3 mb-4">
                <span
                  class="h6 w-60 mx-auto px-4 py-4 rounded-bottom bg-primary text-white font-weight-bold shadow-sm"
                  ><?php echo $hasil['iklan_paket']; ?></span
                >
                <div class="bg-transparent card-header pt-4 border-0">
                  <h3
                    class="h3 font-weight-bold text-primary text-center mb-0 mt-4"
                  >
                    <span class="price">Rp.<?php echo $hasil['iklan_harga']; ?></span
                    ><span class="h6 text-muted ml-2">(<?php echo $hasil['lama_iklan']; ?>)</span>
                    <br>
                    <span class="h5 ml-2"><?php echo $hasil['iklan_detail']; ?></span>
                  </h3>
                </div>
                <div class="bg-transparent card-body pt-4 border-0">
                  <a href ="form_sewa_iklan.php?iklan_id=<?=$hasil['iklan_id']?>"
                    class="btn btn-outline-primary mb-3 mt-3"
                  >
                    Pilih Paket
          </a>
                </div>
              </div>
            </div>
          </div>
        <?php
          }
          ?>
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
