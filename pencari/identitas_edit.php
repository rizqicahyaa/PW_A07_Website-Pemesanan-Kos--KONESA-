<?php
session_start();
include "../koneksi.php";
$kon = new Koneksi();
$id = @$_SESSION['pencari_id'];
$abc = $kon->kueri("SELECT * FROM pencari_kos WHERE pencari_id = '$id'");
$data = $kon->hasil_data($abc);
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
            <a href="data_diri_pencari.php"
              ><i class="fa fa-circle-chevron-left"></i
            ></a>
          </div>
          <!-- Nav Start -->
          <div class="classy-navbar">
            <ul>
              <li><h2 class="font-weight-bold">Edit Identitas</h2></li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Featured Properties Area Start ##### -->
    <section
      class="featured-properties-area section-padding-50"
      style="background-color: white; margin-top: 30px"
    >
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-heading wow fadeInUp">
              <form method="POST" action="identitas_edit_proses.php" enctype="multipart/form-data" name="form_pencari">
              <input type="hidden" name="aksi" id="aksi" value="edit" />
              <input type="hidden" name="hid" id="hid" value="<?php echo $data['pencari_id']; ?>" />
                <div class="row">
                  <!-- Upload Foto Identitas -->
                  <div class="input-group col-lg-12 mb-4">
                    <label class="font-weight-bold">Foto Identitas</label>
                    <div class="input-group">
                      <div class="input-group-prepend mt-2">
                      <img src="<?php echo $data['pencari_foto_identitas']; ?>" width="200px;" id="fotoid">
                      </div>
                      <div class="input-group">
                      <input type="checkbox" name="cbcek" id="cbcek" value="GANTI" onclick="javascript: if(this.checked==true){
                              document.getElementById('fotoid').style.display='none';
                            }else{
                              document.getElementById('fotoid').style.display='block'; }" /> Centang jika foto mau diganti 
                              <input type="file" name="fotoid" id="fotoid"/>
                      </div>
                      </div>
                  </div>

                  <!-- Jenis Identitas-->
                  <div class="input-group col-lg-6 mt-4 mb-4">
                    <label class="font-weight-bold">Jenis Identitas</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                          <i class="fa fa-user" style="color: #0054d7;"></i>
                        </span>
                      </div>
                      <select class="form-control bg-white border-left-0 border-md validate-input h-100" id="jenisid" name="jenisid" required="required">
                          <option value="KTP" <?php if ($data['pencari_jenis_identitas']=='KTP') echo "selected";
                              ?>>KTP</option>  
                          <option value="SIM" <?php if ($data['pencari_jenis_identitas']=='SIM') echo "selected";
                              ?>>SIM</option>
                          <option value="PASSPORT" <?php if ($data['pencari_jenis_identitas']=='PASSPORT') echo "selected";
                              ?>>PASSPORT</option>
                        </select>
                    </div>
                  </div>
                  
                  <!-- Submit Button -->
                  <div class="form-group col-lg-8 mx-auto">
                    <button type="submit" class="btn btn-primary btn-block font-weight-bold py-2 mt-4" id="button-login" value="Perbarui">Perbarui</button>
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
      var total_file=document.getElementById("fotoid").files.length;
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
