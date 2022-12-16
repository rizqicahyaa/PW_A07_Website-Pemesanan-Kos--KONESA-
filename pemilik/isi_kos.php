<?php 
@session_start();
require_once '../koneksi.php';
$kon = new Koneksi();
$idkos = @$_REQUEST['kos_id'];
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
            <a href="data_kos.php"
              ><i class="fa fa-circle-chevron-left"></i
            ></a>
          </div>
          <!-- Nav Start -->
          <div class="classy-navbar">
            <ul>
              <li><h2 class="font-weight-bold">Isi Data Kos</h2></li>
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
          <div class="col-12">
            <div class="section-heading wow fadeInUp">
              <form method="POST" action="isi_proses_kos.php" enctype="multipart/form-data">
                <div class="row">
                  <!-- Nama Kos -->
                  <div class="input-group col-lg-6 mt-4">
                    <label class="font-weight-bold">Nama Kos</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                          <i class="fa fa-id-card"></i>
                        </span>
                      </div>
                      <input id="tnamakos" type="text" name="tnamakos" placeholder="Masukkan Nama Kos" class="form-control bg-white border-left-0 border-md validate-input h-100" required="required">
                    </div>
                  </div>
                  <!-- Jenis Kos -->
                  <div class="input-group col-lg-6 mt-4">
                    <label class="font-weight-bold">Jenis Kos</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                          <i class="fa fa-house-user" style="color: #0054d7;"></i>
                        </span>
                      </div>
                      <select class="form-control bg-white border-left-0 border-md validate-input h-100" required="required" id="gender" name="gender">
                        <option selected>Pilih Jenis Kos</option>
                        <option value="Putra">Putra</option>
                        <option value="Putri">Putri</option>
                        <option value="Putra/i">Putra/i</option>
                      </select>
                    </div>
                  </div>
                  <!-- Tipe Kos -->
                  <div class="input-group col-lg-6 mt-4">
                    <label class="font-weight-bold">Tipe Kos</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                          <i class="fa fa-house" style="color: #0054d7;"></i>
                        </span>
                      </div>
                      <select class="form-control bg-white border-left-0 border-md validate-input h-100" required="required" id="tipekos" name="tipekos">
                        <option selected>Pilih Tipe Kos</option>
                        <option value="bulanan">Bulanan</option>
                        <option value="harian">Harian</option>
                        <option value="harianbulanan">Harian dan Bulanan</option>
                      </select>
                    </div>
                  </div>
                  <!-- fasilitas -->
                  <div class="input-group col-lg-12 mt-4">
                    <label class="font-weight-bold">fasilitas</label>
                    <div class="input-group mb-2">
                      <div data-toggle="buttons">
                        <label class="btn btn-block btn-outline-primary">
                          <input type="checkbox" name="fasilitas[]" id="fasilitas" value="Parkir" autocomplete="off"> Parkir
                        </label>
                        <label class="btn btn-block btn-outline-primary">
                          <input type="checkbox" name="fasilitas[]" id="fasilitas" value="Wifi" autocomplete="off"> Wifi
                        </label>
                        <label class="btn btn-block btn-outline-primary">
                          <input type="checkbox" name="fasilitas[]" id="fasilitas" value="Kamar Mandi Luar" autocomplete="off"> Kamar Mandi Luar
                        </label>
                        <label class="btn btn-block btn-outline-primary">
                          <input type="checkbox" name="fasilitas[]" id="fasilitas" value="Kamar Mandi Dalam" autocomplete="off"> Kamar Mandi Dalam
                        </label>
                        <label class="btn btn-block btn-outline-primary">
                          <input type="checkbox" name="fasilitas[]" id="fasilitas" value="Dapur" autocomplete="off"> Dapur
                        </label>
                        <label class="btn btn-block btn-outline-primary">
                          <input type="checkbox" name="fasilitas[]" id="fasilitas" value="Lemari" autocomplete="off"> Lemari
                        </label>
                        <label class="btn btn-block btn-outline-primary">
                          <input type="checkbox" name="fasilitas[]" id="fasilitas" value="Meja" autocomplete="off"> Meja
                        </label>
                        <label class="btn btn-block btn-outline-primary">
                          <input type="checkbox" name="fasilitas[]" id="fasilitas" value="Kasur" autocomplete="off"> Kasur
                        </label>
                        
                      </div>
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
                      <select class="form-control bg-white border-left-0 border-md validate-input h-100" required="required" id="lokasi" name="lokasi">
                        <option selected>Pilih Lokasi</option>
                        <option value="Ketintang">Ketintang</option>
                        <option value="Lidah Wetan">Lidah Wetan</option>
                      </select>
                    </div>
                  </div>
                  <!-- Jarak -->
                  <div class="input-group col-lg-6 mt-4">
                    <label class="font-weight-bold">Jarak Kos Ke Kampus Unesa</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                          <i class="fa fa-location-dot" style="color: #0054d7;"></i>
                        </span>
                      </div>
                      <select class="form-control bg-white border-left-0 border-md validate-input h-100" required="required" id="jarak" name="jarak">
                        <option selected>Pilih Jarak Kos </option>
                        <option value="50 meter">50 meter</option>
                        <option value=">50 - 250 meter">>50 - 250 meter</option>
                        <option value=">250 meter - 1km">>250 meter - 1km</option>
                        <option value=">1 - 2.5 meter">>1 - 2.5 km</option>
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
                        <textarea id="talamat" name="talamat" placeholder="Masukkan Alamat Kos (contoh: Jl.Mawar No.5, Rt.5 Rw.2 Kelurahan Ikan Lele, Kecamatan Toba, Kota Surabaya, Provinsi Jawa Timur, Kode Pos 61299)" class="form-control bg-white border-left-0 border-md validate-input" required="required" style="height: 150px;"></textarea>
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
                      <input id="tharga" type="text" name="tharga" placeholder="Masukkan Harga " class="form-control bg-white border-left-0 border-md validate-input h-100" required="required">
                    </div>
                  </div>
                  <!-- Upload Foto -->
                  <div class="input-group col-lg-12 mt-4 mb-4">
                    <label class="font-weight-bold">Foto</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                          <i class="fa fa-photo" style="color: #0054d7;"></i>
                        </span>
                      </div>
                      <input type="file" id="foto" name="foto" required="required" multiple/>
                      </div>
                      <div id="image_preview"></div>
                  </div>
                  <!-- Submit Button -->
                  <div class="form-group col-lg-4 mx-auto mt-4 mb-4">
                    <button type="submit" name="submit" class="btn btn-primary btn-block font-weight-bold py-2" id="button-login">Submit</button>
                    
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
