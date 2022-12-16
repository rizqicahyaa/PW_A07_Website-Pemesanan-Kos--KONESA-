<?php 
@session_start();
require_once '../koneksi.php';
$kon = new Koneksi();
$idkos = @$_REQUEST['kos_id'];
$idpemilik = @$_REQUEST['pemilik_id'];
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
            <a href="detail_kos.php"
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
          $abc = $kon->kueri("SELECT a.kos_id, a.kos_nama, a.kos_lokasi, a.kos_alamat, a.kos_harga, b.pemilik_id, b.pemilik_nama, b.pemilik_email, b.pemilik_telp FROM data_kos a JOIN pemilik_kos b ON a.pemilik_id = b.pemilik_id WHERE a.kos_id = '$idkos' ");
          $data = $kon->hasil_data($abc);
          ?>
          <div class="col-12">
            <div class="section-heading wow fadeInUp">
              <form method="POST" action="" enctype="multipart/form-data">
                <div class="row">
                <div class="input-group col-lg-12 mt-4">
                    <label class="font-weight-bold">Nama Pemesan : <?php echo @$_SESSION['nama'];?></label>
                </div>
                <div class="input-group col-lg-12">
                    <label class="font-weight-bold">Tanggal Pemesanan : <?php echo date("d/m/Y H:i");?></label>
                </div>
                  <!-- Nama Pemilik -->
                  <div class="input-group col-lg-6 mt-4">
                    <label class="font-weight-bold">Nama Pemilik</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                          <i class="fa fa-id-card"></i>
                        </span>
                      </div>
                      <input id="namapemilik" type="text" name="namapemilik" class="form-control bg-white border-left-0 border-md validate-input h-100" value="<?php echo $data['pemilik_nama']; ?>" readonly="readonly">
                    </div>
                  </div>
                  <!-- Email -->
                  <div class="input-group col-lg-6 mt-4">
                    <label class="font-weight-bold">Email</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                          <i class="fa fa-house-user" style="color: #0054d7;"></i>
                        </span>
                      </div>
                      <input id="email" type="email" name="email" placeholder="Masukkan Nama Kos" class="form-control bg-white border-left-0 border-md validate-input h-100" value="<?php echo $data['pemilik_email']; ?>" readonly="readonly">
                    </div>
                  </div>
                  <!-- No.Hp -->
                  <div class="input-group col-lg-6 mt-4">
                    <label class="font-weight-bold">No.Hp</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                          <i class="fa fa-house" style="color: #0054d7;"></i>
                        </span>
                      </div>
                      <input id="telp" type="number" name="telp" class="form-control bg-white border-left-0 border-md validate-input h-100" value="<?php echo $data['pemilik_telp']; ?>" readonly="readonly">
                    </div>
                  </div>
                  <!-- Nama Kos -->
                  <div class="input-group col-lg-6 mt-4">
                    <label class="font-weight-bold">Nama Kos</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                          <i class="fa fa-house" style="color: #0054d7;"></i>
                        </span>
                      </div>
                      <input id="namakos" type="text" name="namakos" class="form-control bg-white border-left-0 border-md validate-input h-100" value="<?php echo $data['kos_nama']; ?>" readonly="readonly">
                    </div>
                  </div>
                  <!-- Lokasi -->
                  <div class="input-group col-lg-6 mt-4">
                    <label class="font-weight-bold">Lokasi</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                          <i class="fa fa-location-dot" style="color: #0054d7;"></i>
                        </span>
                      </div>
                      <select class="form-control bg-white border-left-0 border-md validate-input h-100" id="lokasi" name="lokasi" readonly="readonly">
                        <option value="Ketintang" <?php if ($data['kos_lokasi']=='Ketintang') echo "selected"; ?>>Ketintang</option>
                        <option value="Lidah Wetan" <?php if ($data['kos_lokasi']=='Lidah Wetan') echo "selected"; ?>>Lidah Wetan</option>
                      </select>
                    </div>
                  </div>
                  
                  <!-- Alamat -->
                  <div class="input-group col-lg-12 mt-4 mb-4">
                    <label class="font-weight-bold">Alamat</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                          <i class="fa fa-map-location-dot" style="color: #0054d7;"></i>
                        </span>
                      </div>
                        <input type="text" id="talamat" name="talamat" class="form-control bg-white border-left-0 border-md validate-input" style="height: 150px;" value="<?php echo $data['kos_alamat']; ?>" readonly="readonly"></input>
                      </div>
                  </div>
                  <!-- Harga -->
                  <div class="input-group col-lg-12 mt-4 mb-4">
                    <label class="font-weight-bold">Harga</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                          <i class="fa fa-money-check-dollar" style="color: #0054d7;"></i>
                        </span>
                      </div>
                      <input id="tharga" type="text" name="tharga" class="form-control bg-white border-left-0 border-md validate-input h-100" value="<?php echo $data['kos_harga']; ?>" readonly="readonly">
                    </div>
                  </div>
                  <!-- Submit Button -->
                  <div class="form-group col-lg-4 mx-auto mt-4 mb-4">
                    <a href="riwayat_proses.php?aksi=pesan&kos_id=<?= $data['kos_id']?>&pemilik_id=<?= $data['pemilik_id']?>" class="btn btn-primary btn-block font-weight-bold py-2" id="button-login">Submit</button>
                    
                    </a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- js membuat input No.Hp hanya angka  -->
    <script type="text/javascript">
        function Angkasaja(evt){
          var charCode = (evt.which) ? evt.which : event.keyCode
          if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;
          return true;
        }
      </script>

     <!-- js Upload Gambar --> 
    <script>
      $(document).ready(function() 
      { 
      $('form').ajaxForm(function() 
      {
        alert("Uploaded SuccessFully");
      });
      });

      function preview_image() 
      {
      var total_file=document.getElementById("foto").files.length;
      for(var i=0;i<total_file;i++)
      {
        $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'><br>");
        $('#image_preview img').css({"height":"200px", "margin-top":"10px"});
      }
      }
      
    </script>


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
