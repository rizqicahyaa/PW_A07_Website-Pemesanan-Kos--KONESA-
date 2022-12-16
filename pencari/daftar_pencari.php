<?php
@session_start();
require '../koneksi.php';
?>
<html>
    <head>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.css"/>
        <link rel="stylesheet" href="../css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../css/style.css"/>
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"> 
         <!-- Title  -->
         <title>Konesa - Website Penyedia Jasa Penyewaan Kos Sekitar Unesa</title>
         <!-- Favicon  -->
        <link rel="icon" href="../images/logo.png" />

    </head>

    <!-- Navbar-->
    <header class="header">
      <nav class="navbar navbar-expand-lg navbar-light py-2">
          <div class="container">
              <!-- Navbar Brand -->
              <a href="index.php" class="navbar-brand">
                  <img src="../images/logo.png" alt="logo" width="75">
              </a>
          </div>
      </nav>
    </header>

    <body>
      <div class="container">
        <div class="row py-2 align-items-center">
            <div class="col-md-5 pr-lg-5 mb-2 mb-md-0">
                <img src="../images/daftar.png" alt="Gambar Login" class="img-fluid img-login d-none d-md-block">
            </div>

            <!-- Login Form -->
            <div class="col-md-7 col-lg-6 ml-auto mb-4">
              <!-- card -->
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-2"><a href="login_pencari.php"><i class="fa fa-circle-chevron-left"></i></a></div>
                    <div class="col-10">
                    <h4 class="mb-4 pb-4 mt-0 font-weight-bold text-center">Daftar Akun Pencari Kos</h3></div>
                  </div>

                  <!-- Form -->
                  <form method="POST" action="daftar_proses_pencari.php" enctype="multipart/form-data">
                  <div class="row">
                      <!--foto profil-->
                      <div class="form-group col-lg-12">
                        <label class="font-weight-bold">Foto Profil</label>
                        <!-- Input foto profil-->
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                              <i class="fa fa-photo" style="color: #0054d7;"></i>
                            </span>
                          </div>
                          <input type="file" id="fotoprofil" name="fotoprofil" required="required"/>
                        </div>
                      </div>
                      <!-- Nama Lengkap -->
                      <div class="input-group col-lg-12 mt-2">
                        <label class="font-weight-bold">Nama Lengkap</label>
                      </div>
                      <div class="input-group col-lg-12 mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-id-card"></i>
                          </span>
                        </div>
                        <input id="tnama" type="text" name="tnama" placeholder="Masukkan Nama Lengkap" class="form-control bg-white border-left-0 border-md validate-input" required="required">
                      </div>
                      <!-- Tanggal Lahir -->
                      <div class="input-group col-lg-12 mt-2">
                        <label class="font-weight-bold">Tanggal Lahir</label>
                      </div>
                      <div class="input-group col-lg-12 mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-calendar" style="color: #0054d7;"></i>
                          </span>
                        </div>
                        <input id="tgllahir" type="date" name="tgllahir" class="form-control bg-white border-left-0 border-md validate-input" required="required">
                      </div>
                      <!-- Jenis Kelamin -->
                      <div class="input-group col-lg-12 mt-2">
                        <label class="font-weight-bold">Jenis Kelamin</label>
                      </div>
                      <div class="input-group col-lg-12 mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-user" style="color: #0054d7;"></i>
                          </span>
                        </div>
                        <select class="form-control bg-white border-left-0 border-md validate-input h-100" id="gender" name="gender" required="required">
                        <option selected>Pilih Jenis Kelamin</option>
                          <option value="L">Laki-laki</option>  
                          <option value="P">Perempuan</option>
                        </select>
                      </div>
                      <!-- Email-->
                      <div class="form-group col-lg-6">
                        <label class="font-weight-bold">Email</label>
                        <!-- Input Email-->
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                              <i class="fa fa-envelope"></i>
                            </span>
                          </div>
                          <input id="temail" type="email" name="temail" placeholder="Masukkan Email" class="form-control bg-white border-left-0 border-md validate-input" required="required">
                        </div>
                      </div>
                      
                      <!--No.Hp-->
                      <div class="form-group col-lg-6">
                        <label class="font-weight-bold">No.Hp</label>
                        <!-- Input No.Hp-->
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                              <i class="fa fa-phone"></i>
                            </span>
                          </div>
                          <input id="ttelp" type="telp" name="ttelp" placeholder="Masukkan No.Hp" class="form-control bg-white border-left-0 border-md validate-input" onkeypress="return Angkasaja(event)" required="required">
                        </div>
                      </div>

                      <!-- Jenis Identitas -->
                      <div class="input-group col-lg-12 mt-2">
                        <label class="font-weight-bold">Jenis Identitas</label>
                      </div>
                      <div class="input-group col-lg-12 mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-white px-4 border-md border-right-0">
                          <i class="fa-sharp fa-solid fa-id-card-clip" style="color: #0054d7;"></i>
                          </span>
                        </div>
                        <select class="form-control bg-white border-left-0 border-md validate-input"  id="jenisid" name="jenisid" required="required">
                        <option selected>Pilih Jenis Identitas</option>
                        <option value="KTP">KTP</option>  
                        <option value="SIM">SIM</option>
                        <option value="PASSPORT">PASSPORT</option>
                      </select>
                      </div>

                      <!-- Upload Foto -->
                  <div class="input-group col-lg-12 mt-4 mb-4">
                    <label class="font-weight-bold">Foto Identitas</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                          <i class="fa fa-photo" style="color: #0054d7;"></i>
                        </span>
                      </div>
                      <input type="file" id="fotoid" name="fotoid" required="required"/>
                      </div>
                  </div>

                  <!-- Password -->
                  <div class="form-group col-lg-12">
                        <label class="font-weight-bold">Password</label>
                        <!-- Input Password -->
                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                              <i class="fa fa-lock"></i>
                            </span>
                          </div>
                          <input id="tpassword" type="password" name="tpassword" placeholder="Password" class="form-control bg-white border-left-0 border-md validate-input" required="required">
                        </div>
                      </div>
            
                      <!-- Submit Button -->
                      <div class="form-group col-lg-12 mx-auto mb-0">
                        <button type="submit" class="btn btn-primary btn-block font-weight-bold py-2" id="button-login">Daftar</button>
                        </a>
                      </div>
            
                      <!-- Link Daftar Sekarang-->
                        <div class="text-center w-100 mt-3">
                          <p class="font-weight-bold">Sudah Punya Akun KONESA? <a href="login_pencari.php" class="text-primary ml-2">Login Disini</a></p>
                        </div>
            
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>

      <!-- js membuat input No.Hp hanya angka  -->
      <script type="text/javascript">
        function Angkasaja(evt){
          var charCode = (evt.which) ? evt.which : event.keyCode
          if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;
          return true;
        }
      </script>
    </body>
</html>