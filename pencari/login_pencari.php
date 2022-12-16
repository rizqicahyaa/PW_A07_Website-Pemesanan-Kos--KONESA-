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
              <a href="#" class="navbar-brand">
                  <img src="../images/logo.png" alt="logo" width="75">
              </a>
          </div>
      </nav>
    </header>

    <body>
      <div class="container">
        <div class="row py-2 align-items-center">
            <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
                <img src="../images/login.png" alt="Gambar Login" class="img-fluid img-login d-none d-md-block">
            </div>

            <!-- Login Form -->
            <div class="col-md-7 col-lg-6 ml-auto">
              <!-- card -->
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4"><a href="../opsi_login.html"><i class="fa fa-circle-chevron-left"></i></a></div>
                    <div class="col-8">
                    <h4 class="mb-4 pb-4 mt-0 font-weight-bold">Login Pencari Kos</h3></div>
                  </div>

                  <!-- Form -->
                  <form method="POST" action="login_proses_pencari.php">
                    <div class="row">
                      <!-- Email Address -->
                      <div class="input-group col-lg-12 mt-4">
                        <label class="font-weight-bold">Email</label>
                      </div>
                      <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-envelope"></i>
                          </span>
                        </div>
                        <input id="temail" type="email" name="temail" placeholder="Masukkan Email" class="form-control bg-white border-left-0 border-md">
                      </div>
            
                      <!-- Password -->
                      <div class="input-group col-lg-12">
                        <label class="font-weight-bold">Password</label>
                      </div>
                      <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-white px-4 border-md border-right-0">
                            <i class="fa fa-lock"></i>
                          </span>
                        </div>
                        <input id="tpassword" type="password" name="tpassword" placeholder="Masukkan Password" class="form-control bg-white border-left-0 border-md">
                      </div>
            
                      <!-- Submit Button -->
                      <div class="form-group col-lg-12 mx-auto mb-0">
                          <button type="submit" class="btn btn-primary btn-block font-weight-bold py-2" id="button-login">Login</button>
                        </a>
                      </div>
            
                      <!-- Link Daftar Sekarang-->
                        <div class="text-center w-100 mt-3">
                          <p class="font-weight-bold">Belum Punya Akun KONESA? <a href="daftar_pencari.php" class="text-primary ml-2">Daftar Sekarang</a></p>
                        </div>
            
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>
    </body>
</html>