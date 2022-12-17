<?php 
@session_start();
require_once '../koneksi.php';
$kon = new Koneksi();
$idiklan = @$_REQUEST['iklan_id'];
$idpemilik = @$_SESSION['pemilik_id'];
$idkos = @$_REQUEST['kos_id'];

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
    <!-- <div id="preloader">
      <div class="south-load"></div>
    </div> -->

       <!-- Main Header Area -->
    <div class="main-header-area" id="stickyHeader">
      <div class="classy-nav-container">
        <!-- Classy Menu -->
        <nav class="classy-navbar justify-content-sm-start">
          <div class="col-4">
            <a href="paket_iklan.php"
              ><i class="fa fa-circle-chevron-left"></i
            ></a>
          </div>
          <!-- Nav Start -->
          <div class="classy-navbar">
            <ul>
              <li><h2 class="font-weight-bold">Form Sewa Kos</h2></li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Featured Properties Area Start ##### -->
    <section
      class="featured-properties-area section-padding-100-50"
      style="background-color: white; margin-top: 30px"
    >
      <div class="container">
        <div class="row">
          <?php
          $abc = $kon->kueri("SELECT b.iklan_id, b.iklan_paket, b.iklan_harga, b.lama_iklan, 
          c.kos_id, c.kos_nama
          FROM iklan b JOIN data_kos c
          WHERE b.iklan_id = '$idiklan' ");
          $data = $kon->hasil_data($abc);
          ?>
          <div class="col-12">
            <div class="section-heading wow fadeInUp">
              <form method="POST" action="" enctype="multipart/form-data">
                <div class="row">
                <div class="input-group col-lg-12 mt-4">
                    <label class="font-weight-bold">Nama Pemesan : <?php echo @$_SESSION['tnama'];?></label>
                </div>
                <div class="input-group col-lg-12">
                    <label class="font-weight-bold">Tanggal Pemesanan : <?php echo date("d/m/Y H:i");?></label>
                </div>
                  <!-- Nama Paket -->
                  <div class="input-group col-lg-6 mt-4">
                    <label class="font-weight-bold">Nama Paket iklan</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                          <i class="fa fa-id-card"></i>
                        </span>
                      </div>
                      <input id="namapaket" type="text" name="namapaket" class="form-control bg-white border-left-0 border-md validate-input h-100" value="<?php echo $data['iklan_paket']; ?>" readonly="readonly">
                    </div>
                  </div>
                  <!-- Harga -->
                  <div class="input-group col-lg-6 mt-4">
                    <label class="font-weight-bold">Harga Iklan</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                          <i class="fa fa-house-user" style="color: #0054d7;"></i>
                        </span>
                      </div>
                      <input id="harga" type="number" name="harga" class="form-control bg-white border-left-0 border-md validate-input h-100" value="<?php echo $data['iklan_harga']; ?>" readonly="readonly">
                    </div>
                  </div>
                  <!-- Lama Iklan -->
                  <div class="input-group col-lg-6 mt-4">
                    <label class="font-weight-bold">Lama Iklan</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                          <i class="fa fa-house" style="color: #0054d7;"></i>
                        </span>
                      </div>
                      <input id="lama" type="lama" name="text" class="form-control bg-white border-left-0 border-md validate-input h-100" value="<?php echo $data['lama_iklan']; ?>" readonly="readonly">
                    </div>
                  </div>
                  <!-- Nama kos -->
                  <div class="input-group col-lg-6 mt-4">
                    <label class="font-weight-bold">Nama kos</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                          <i class="fa fa-id-card"></i>
                        </span>
                      </div>
                      <input id="namapaket" type="text" name="namapaket" class="form-control bg-white border-left-0 border-md validate-input h-100" value="<?php echo $data['kos_nama']; ?>" readonly="readonly">
                    </div>
                  </div>
                  <!-- Upload Foto -->
                  <div class="input-group col-lg-12 mt-4 mb-4">
                    <label class="font-weight-bold">Upload Bukti Pembayaran</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                          <i class="fa fa-photo" style="color: #0054d7;"></i>
                        </span>
                      </div>
                      <input type="file" id="fotobukti" name="fotobukti" required="required"/>
                      </div>
                  </div>

                  <!-- Submit Button -->
                  <div class="form-group col-lg-4 mx-auto mt-4 mb-4">
                    <a href="sewa_proses.php?aksi=pesan&kos_id=<?= $data['kos_id']?>&iklan_id=<?= $data['iklan_id']?>" class="btn btn-primary btn-block font-weight-bold py-2" id="button-login">Submit</a>
                  </div>
                </div>
              </form>
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
