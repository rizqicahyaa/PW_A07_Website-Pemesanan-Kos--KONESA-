<?php 
@session_start();
require_once '../koneksi.php';
$kon = new Koneksi();
$idpemilik = @$_REQUEST['pemilik_id'];
$idkos = @$_REQUEST['kos_id'];
$id = @$_SESSION['pencari_id'];
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
    <div id="preloader">
      <div class="south-load"></div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

      <!-- Main Header Area -->
      <div class="main-header-area" id="stickyHeader">
        <div class="classy-nav-container breakpoint-off bg-white">
          <!-- Classy Menu -->
          <nav class="classy-navbar justify-content-between" id="southNav">
            <!-- Logo -->
            <a class="nav-brand" href="index_pencari.php"
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
                $que = $kon->kueri("SELECT * FROM pencari_kos WHERE pencari_id = '$idpencari'");
                $hasil = $kon->hasil_data($que);
              ?>
                <ul>
                  <li><a href="index_pencari.php" class="nav-link text-dark font-weight-bold">Beranda</a></li>
                  <li>
                    <a href="index_pencari.php#tentang" class="text-dark font-weight-bold">Tentang</a>
                  </li>
                  <li><a href="#pusatbantuan" class="text-dark font-weight-bold">Pusat Bantuan</a></li>
                  <li><a href="pencarian.php" class="text-dark font-weight-bold">Cari Kos</a></li>
                  </li>
                  <li><i class="fa fa-bell fa-lg" style="color: #0054d7;"></i>
                    <ul class="dropdown bg-white border" style="margin-top: 25px;">
                      <li><h6 class="text-dark font-weight-bold text-center">Notifikasi</h6> <hr></li>
                    </ul></li>
                  <li><i class="fa-solid fa-message fa-lg" style="color: #0054d7;"></i></li>
                  </li>
                  <li><img src="<?= $hasil['pencari_gambar']; ?>" class="rounded-circle ml-3" style="width: 50px; height: 50px; object-fit:cover;"></li>
                  <li><a href="#" class="text-dark font-weight-bold"><?php echo $hasil['pencari_nama'] ?><i class="fa fa-chevron-down"></i></a>
                    <ul class="dropdown bg-white border" style="width: 200px; margin-left: -90px; margin-top: 25px;">
                      <li><a href="data_diri_pencari.php" class="text-dark font-weight-bold">Data Diri</a></li>
                      <li><a href="riwayat_transaksi.php" class="text-dark font-weight-bold">Riwayat Transaksi</a></li>
                      <li><a href="../logout.php" class="text-dark font-weight-bold ">Log Out</a></li>
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
    <?php 
      $xyz = $kon->kueri("SELECT * FROM data_kos WHERE kos_id = '$idkos'");
      $hasil = $kon->hasil_data($xyz);
    ?>
      <div class="hero-slides owl-carousel">
        
        <!-- Single Hero Slide -->
        <div
          class="single-hero-slide bg-img"
          style="background-image: url(../pemilik/<?php echo $hasil['kos_gambar']; ?>)"
        >
          <div class="container h-100">
            <div class="row h-100 align-items-center">
              <div class="col-12">
                <div class="hero-slides-content">
                  
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
                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Featured Properties Area Start ##### -->
    <section class="south-editor-area d-flex">
    <?php 
        $kos = $kon->kueri("SELECT * FROM  data_kos a INNER JOIN pemilik_kos b ON a.pemilik_id = b.pemilik_id WHERE a.kos_id = '$idkos' ");
        while ($hasil = $kon->hasil_data($kos)) { 
    ?>
       <!-- Rincian -->
       <div class="editor-content-area wow fadeInUp">
       <h1 class="text-weight-bold"><?php echo $hasil['kos_nama']; ?></h1>
       <p class="location mr-4 mt-2 mb-1"  style="color:#0054d7;">
        <i class="fa fa-location-dot"> <?php echo $hasil['kos_lokasi']; ?></i>
        <p class="location mr-4 mt-2 mb-1"  style="color:#0054d7;">
        <i class="fa fa-map-location-dot"> <?php echo $hasil['kos_alamat']; ?></i>
        <div class ="row mt-4">
          <div class="input-group col-sm-4">
            <img src="../pemilik/<?= $hasil['pemilik_gambar']; ?>" class="rounded-circle" style="width: 100px; height: 100px; object-fit:cover;">
          </div>
          <div class="input-group col-sm-6 mt-4">
            <h4 class="" data-wow-delay="500ms"> <?php echo $hasil['pemilik_nama']; ?></h4>
            <div class="input-group col-sm-12 p-0 ">
              <h4 class="text-secondary">Pemilik</h4>
            </div>
          </div>
          </div>
        </div>
      <!-- Content -->
      <div class="editor-content-area p-50">
        <!-- Section Heading -->
        <div class="section-heading wow fadeInUp" data-wow-delay="250ms">
         <!-- <p class="font-weight-bold" style="font-size:24px; color: black; text-align:right;">Rating
          <i class="fa-sharp fa-solid fa-star" style="color:orange;"><?php echo $hasil['review_rating']; ?></i></p>-->
          <h5 class="text-weight-bold" style="text-align:right;">Kos <?php echo $hasil['kos_gender']; ?></h5>
        </div>
        <div style="float:right;">
          <h4 class="wow fadeInUp text-secondary" data-wow-delay="500ms">
          <a href="#"><i class="fa fa-phone fa-2x"  style="color: #0054d7;"></i></a>
          <a href="chat.php"><i class="fa fa-message fa-2x ml-3"  style="color: #0054d7;"></i></a>
          </h4>
        </div>
      </div>
      <?php
    }
    ?>
    
    </section>

    <!-- ##### Featured Properties Area End ##### -->
    <hr style="border: 1px solid gray; border-radius: 5px;">
    <div class="editor-content-area">
    <?php 
      $xyz = $kon->kueri("SELECT * FROM data_kos WHERE kos_id = '$idkos'");
      $hasil = $kon->hasil_data($xyz);
    ?>
    <section class="featured-properties-area section-padding-50" id="beranda">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-heading wow fadeInUp">
              <h1 class="text-weight-bold">Fasilitas</h1>
              <h4 class="wow fadeInUp text-secondary mt-4" data-wow-delay="500ms">
              <?php echo $hasil['kos_fasilitas']; ?>
              </h4>
              <h4 class="wow fadeInUp text-secondary mt-4" data-wow-delay="500ms"> Jarak ke kampus UNESA 
              <?php echo $hasil['kos_jarak']; ?>
              </h4>
            </div>
          </div>
        </div>
        </section>
        </div>
      <hr style="border: 1px solid gray; border-radius: 5px;">
    <!-- ##### Fasilitas End ##### -->

     <!-- ##### Testimonials Area Start ##### -->
     <div class="south-editor-area comments-area">
        <div class="section-heading wow fadeInUp mt-4" data-wow-delay="250ms">
              <h1 class="text-weight-bold">Review</h1>
            </div>
              <?php 
                $rev = $kon->kueri("SELECT * FROM review a JOIN data_kos b ON a.kos_id = b.kos_id JOIN pencari_kos c ON a.pencari_id = c.pencari_id WHERE a.kos_id = '$idkos' ");
                while ($hasil = $kon->hasil_data($rev)) {
              ?>
      <ol>
        <!-- Single Comment Area -->
        <li class="single_comment_area ml-4">
            <div class="comment-wrapper d-flex">
                <!-- Comment Meta -->
                <div class="comment-author ml-4 mb-4">
                    <img src="<?php echo $hasil['pencari_gambar']; ?>" class="rounded-circle" style="width: 100px; height: 100px; object-fit:cover;">
                </div>
                <!-- Comment Content -->
                <div class="comment-content">
                    <div class="comment-meta">
                        <h6 class="comment-author-name mt-3 ml-2"><?php echo $hasil['pencari_nama']; ?></h6>
                        <i class="fa-sharp fa-solid fa-star  ml-2" style="color:orange;"><a href="#" class="comment-meta  ml-2" style="color:orange;"><?php echo $hasil['review_rating']; ?></a></i>
                    <p class="ml-2"> <?php echo $hasil['review_isi']; ?></p>
                </div>
            </div> 
      </ol>
      <?php
              }
              ?>
  </div>                 
    <!-- ##### Testimonials Area End ##### -->

    <!-- <section class="south-contact-area section-padding-50">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="contact-heading">
                        <h3>Tambahkan Review</h3>
                    </div>
                </div>
            </div>

            <div class="row">
            <?php 
              $xyz = $kon->kueri("SELECT a.review_id, a.review_isi, a.review_rating, b.kos_id, c.pencari_id FROM review a JOIN data_kos b ON a.kos_id = b.kos_id JOIN pencari_kos c ON a.pencari_id = c.pencari_id WHERE a.kos_id = '$idkos'");
              $hasil = $kon->hasil_data($xyz);
            ?>
                <div class="col-12 col-lg-8">
                    <div class="contact-form">
                        <form action="" method="POST">
                            <div class="form-group">
                              <input type="number" class="form-control" name="rating" id="rating" cols="30" rows="10" placeholder="Beri rating dari angka 1-5.." min="1" max="5"/>
                            </div>
                            <div class="form-group">
                              <textarea class="form-control" name="review" id="review" cols="30" rows="10" placeholder="Masukkan review.."></textarea>
                            </div>
                            <a href="review_proses.php?<?=$hasil['kos_id']?>" class="btn btn-primary">Kirim</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

     <!-- ##### Sewa Area Start ##### -->
    <section class="featured-properties-area section-padding-50">
       <?php 
         $xyz = $kon->kueri("SELECT * FROM data_kos  WHERE kos_id = '$idkos'");
         $hasil = $kon->hasil_data($xyz);
       ?>
        <div class="card ml-4 mr-4">
          <div class="card-body">
            <h4 class="card-title ml-4 text-primary">Rp.<?php echo $hasil['kos_harga']; ?> (<?php echo $hasil['kos_tipe']; ?>) <a href="form_sewa.php?kos_id=<?=$hasil['kos_id']?>" class="btn btn-primary" style="float:right;"><h5>Ajukan Sewa</h5></a></h4>
            
          </div>
        </div>
    </section>
    <!-- ##### Sewa Area End ##### -->

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
