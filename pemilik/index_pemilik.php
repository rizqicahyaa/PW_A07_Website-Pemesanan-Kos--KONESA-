<?php 
@session_start();
require_once '../koneksi.php';
$kon = new Koneksi();
$pemilik = @$_REQUEST['pemilik_id'];
$idpemilik = @$_SESSION['pemilik_id'];
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

    <!-- Title  -->
    <title>Konesa - Website Penyedia Jasa Penyewaan Kos Sekitar Unesa</title>

    <!-- Favicon  -->
    <link rel="icon" href="../images/logo.png" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/classy-nav.min.css" />
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/nice-select.css" />
    <link rel="stylesheet" href="../css/animate.css" />
    <link rel="stylesheet" href="../css/owl.carousel.css" />
    <link rel="stylesheet" href="../css/themify-icons.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
  </head>

  <body>
    <!-- Preloader -->
    <!--<div id="preloader">
      <div class="south-load"></div>
    </div>-->

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

      <!-- Main Header Area -->
      <div class="main-header-area" id="stickyHeader">
        <div class="classy-nav-container breakpoint-off bg-white">
          <!-- Classy Menu -->
          <nav class="classy-navbar justify-content-between" id="southNav">
            <!-- Logo -->
            <a class="nav-brand" href="index_pemilik.php"
              ><img src="../images/logo.png" alt="Logo Konesa" style="width:75px;"
            /></a>

            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
              <span class="navbarToggler"
                ><span></span><span></span><span></span
              ></span>
            </div>

            <!-- Menu -->
            <div class="classy-menu" style="color: black;">
              <!-- close btn -->
              <div class="classycloseIcon">
                <div class="cross-wrap">
                  <span class="top"></span><span class="bottom"></span>
                </div>
              </div>

              <!-- Nav Start -->
              <div class="classynav">
              <?php 
                $que = $kon->kueri("SELECT * FROM pemilik_kos WHERE pemilik_id = '$idpemilik'");
                $hasil = $kon->hasil_data($que);
              ?>
                <ul>
                  <li><a href="#beranda" class="nav-link text-dark font-weight-bold">Beranda</a></li>
                  <li>
                    <a href="#tentang" class="text-dark font-weight-bold">Tentang</a>
                  </li>
                  <li><a href="#pusatbantuan" class="text-dark font-weight-bold">Pusat Bantuan</a></li>
                  <li><a href="paket_iklan.php" class="text-dark font-weight-bold">Pasang Iklan</a></li>
                  </li>
                  <li><i class="fa fa-bell fa-lg" style="color: #0054d7;"></i>
                    <ul class="dropdown bg-white border">
                      <li><h6 class="text-dark font-weight-bold text-center">Notifikasi</h6> <hr></li>
                    </ul></li>
                  <li><i class="fa-solid fa-message fa-lg" style="color: #0054d7;"></i></li>
                  </li>
                  <li><img src="<?= $hasil['pemilik_gambar']; ?>" class="rounded-circle ml-3" style="width: 50px; height: 50px; object-fit:cover;"></li>
                  <li><a href="#" class="text-dark font-weight-bold"><?php echo $hasil['pemilik_nama'] ?><i class="fa fa-chevron-down"></i></a>
                    <ul class="dropdown bg-white border">
                      <li><a href="data_diri_pemilik.php" class="text-dark font-weight-bold">Data Diri</a></li>
                      <li><a href="data_kos.php" class="text-dark font-weight-bold">Data Kos</a></li>
                      <li><a href="pesanan.php" class="text-dark font-weight-bold">Pesanan Saya</a></li>
                      <li><a href="data_iklan.php" class="text-dark font-weight-bold">Iklan Saya</a></li>
                      <li><a href="../logout.php" class="text-dark font-weight-bold">Log Out</a></li>
                    </ul></li>
                </ul>
              </div>
              <!-- Nav End -->
            </div>
          </nav>
        </div>
      </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
      <div class="hero-slides owl-carousel">
        
        <!-- Single Hero Slide -->
        <div
          class="single-hero-slide bg-img"
          style="background-image: url(../images/kamar.jpg)"
        >
          <div class="container h-100">
            <div class="row h-100 align-items-center">
              <div class="col-12">
                <div class="hero-slides-content">
                  <h2 data-animation="fadeInUp" data-delay="100ms">
                    Temukan Kosmu!
                  </h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Single Hero Slide -->
        <div
          class="single-hero-slide bg-img"
          style="background-image: url(../images/kamar.png)"
        >
          <div class="container h-100">
            <div class="row h-100 align-items-center">
              <div class="col-12">
                <div class="hero-slides-content">
                  <h2 data-animation="fadeInUp" data-delay="100ms">
                    Temukan Kos Impianmu!
                  </h2>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Featured Properties Area Start ##### -->
    <section class="featured-properties-area section-padding-100-50" id="beranda">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-heading wow fadeInUp">
              <h1 class="text-weight-bold">Rekomendasi Kos</h1>
            </div>
          </div>
        </div>

        <div class="row">
        <?php 
        $kos = $kon->kueri("SELECT * FROM data_kos WHERE status = 'Kosong' ");
        while ($hasil = $kon->hasil_data($kos)) { ?>
          <!-- Single Featured Property -->
          <div class="col-12 col-md-6 col-xl-4 mt-4">
            <div
              class="single-featured-property mb-50 wow fadeInUp"
              data-wow-delay="100ms"
            >
              <!-- Property Thumbnail -->
              <div class="property-thumb">
                <img src="<?php echo $hasil['kos_gambar']; ?>" style="width: 400px; height: 300px; object-fit:cover;" alt="kamar"/>

                <div class="tag">
                  <span><?php echo $hasil['status']; ?></span>
                </div>
                <div class="list-price">
                  <p>Rp. <?php echo $hasil['kos_harga']; ?></p>
                </div>
              </div>
              <!-- Property Content -->
              <div class="property-content">
                <h5><?php echo $hasil['kos_nama']; ?></h5>
                <p class="location mr-4 mb-0"  style="color:#0054d7;">
                  <i class="fa fa-location-dot"> <?php echo $hasil['kos_lokasi']; ?></i>
                </p>
                <p class="address"  style="color:#0054d7;">
                  <i class="fa fa-map-location-dot mt-2"> <?php echo $hasil['kos_alamat']; ?></i>
                </p>
                <div
                  class="property-meta-data d-flex align-items-end justify-content-between"
                >
                  <div class="new-tag">
                    <span><?php echo $hasil['kos_fasilitas']; ?></span>
                  </div>
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

    <!-- ##### Editor Area Start ##### -->
    <section class="south-editor-area d-flex align-items-center mb-50" id="tentang">
       <!-- Editor Thumbnail -->
       <div class="editor-thumbnail">
        <img src="../images/feature6.jpg" alt="" style="width: 100%;" />
      </div>
      <!-- Editor Content -->
      <div class="editor-content-area">
        <!-- Section Heading -->
        <div class="section-heading wow fadeInUp" data-wow-delay="250ms">
          <i class="fa-sharp fa-solid fa-award fa-xl"  style="color: #0054d7;"></i>
          <h1 class="text-weight-bold">KONESA</h1>
        </div>
        <h4 class="wow fadeInUp text-secondary" data-wow-delay="500ms">
          KONESA adalah website pencarian kos khusus mahasiswa UNESA. KONESA diciptakan dengan tujuan 
          untuk mempermudah mahasiswa UNESA dalam mencari tempat tinggal. KONESA dapat menjadi alternatif baru
          dalam mencari kos yang nyaman dengan fasilitas yang lengkap dan harga sesuai kantong mahasiswa.
        </h4>
      </div>
    </section>
    <!-- ##### Editor Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer
      class="footer-area section-padding-100-0 bg-img gradient-background-overlay"
      style="background-image: url(../images/hero1.jpg)" id="pusatbantuan"
    >
      <!-- Main Footer Area -->
      <div class="main-footer-area">
        <div class="container">
          <div class="row">
            <!-- Single Footer Widget -->
            <div class="col-12 col-sm-4 ">
              <div class="footer-widget-area mb-100">
                <!-- Widget Title -->
                <div class="widget-title">
                  <h6>konesa</h6>
                </div>
                <div class="footer-logo my-4">
                  <img src="../images/logo.png" alt="" />
                </div>
                <p>
                  Cari Kos dengan fasilitas lengkap dan harga sesuai kantong mahasiswa? Hanya di KONESA!
                </p>
              </div>
            </div>

            <!-- Single Footer Widget -->
            <div class="col-12 col-sm-4 ">
              <div class="footer-widget-area mb-100">
                <!-- Widget Title -->
                <div class="widget-title">
                  <h6>Kebijakan</h6>
                </div>
               <!-- Nav -->
               <ul class="useful-links-nav align-items-center">
                <li><a href="#">Kebijakan Privasi</a></li>
                <li><a href="#">Syarat dan Ketentuan Umum</a></li>
              </ul>
                
              </div>
            </div>

            <!-- Single Footer Widget -->
            <div class="col-12 col-sm-4 ">
              <div class="footer-widget-area mb-100">
                <!-- Widget Title -->
                <div class="widget-title">
                  <h6>Hubungi Kami</h6>
                <!-- Address -->
                <div class="address">
                  <h6>
                    <i class="fa fa-phone fa-lg"></i>081 2345 67890
                  </h6>
                  <h6>
                  <i class="fa fa-envelope fa-lg"></i>
                    cs@konesa.com
                  </h6>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Copywrite Text -->
      <div
        class="copywrite-text d-flex align-items-center justify-content-center"
      >
        <p>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;
          <script>
            document.write(new Date().getFullYear());
          </script>
          All rights reserved
          <i class="fa fa-heart-o" aria-hidden="true"></i> Oleh Kelompok 7
        </p>
      </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

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
