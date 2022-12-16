<?php 
session_start();
include "../koneksi.php";
$kon = new Koneksi();
$admin = @$_REQUEST['admin_id'];
$idadmin = @$_SESSION['admin_id'];
$idkos = @$_REQUEST['kos_id'];
$idpemilik = @$_REQUEST['pemilik_id'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Konesa - Website Penyedia Jasa Penyewaan Kos Sekitar Unesa</title>
    <!-- Favicon  -->
    <link rel="icon" href="../images/logo.png" />
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
      <!-- themify icon -->
      <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
      <!-- scrollbar.css -->
      <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
      <!-- Fontawesome CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"> 
  </head>

  <body>
  <!-- Pre-loader start -->
  <div class="theme-loader">
      <div class="loader-track">
          <div class="preloader-wrapper">
              <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>  
          </div>
      </div>
  </div>
  <!-- Pre-loader end -->
  <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
          <nav class="navbar header-navbar pcoded-header">
              <div class="navbar-wrapper">
                <div class="navbar-logo">
                    <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                        <i class="ti-menu"></i>
                    </a>
                    <a href="index_admin.php">
                          <img class="img-fluid ml-4" src="../images/logo1.png" alt="Logo Konesa" />
                      </a>
                </div>
                  <div class="navbar-container container-fluid">
                      <ul class="nav-right">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                                    </div>
                                </div>
                            </li>
                          
                          <li class="user-profile header-notification">
                              <?php 
                                    $que = $kon->kueri("SELECT * FROM admin WHERE admin_id = '$idadmin'");
                                    $hasil = $kon->hasil_data($que);
                                ?>
                              <a href="#!" class="waves-effect waves-light">
                                  <img src="<?= $hasil['admin_gambar']; ?>" class="img-radius" alt="User-Profile-Image" style="width: 50px; height: 50px; object-fit:cover;">
                                  <span><?php echo $hasil['admin_nama'] ?></span>
                                  <i class="ti-angle-down"></i>
                              </a>
                              <ul class="show-notification profile-notification">
                                  <li class="waves-effect waves-light">
                                      <a href="data_diri_admin.php">
                                          <i class="ti-user"></i> Profil
                                      </a>
                                  </li>
                                  <li class="waves-effect waves-light">
                                      <a href="../logout.php">
                                          <i class="ti-layout-sidebar-left"></i> Logout
                                      </a>
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </div>
              
          </nav>

          <div class="pcoded-main-container">
              <div class="pcoded-wrapper">
                  <nav class="pcoded-navbar">
                      <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                      <div class="pcoded-inner-navbar main-menu">
                          <div class="">
                              <div class="main-menu-header">
                                   <img class="img-radius" alt="User-Profile-Image" style="width: 80px; height: 80px; object-fit:cover;" src="<?= $hasil['admin_gambar']; ?>" alt="Logo Konesa">
                                  <div class="user-details font-weight-bold"><h5><?php echo $hasil['admin_nama'] ?></h5></div>
                              </div>
                          </div>
                          <ul class="pcoded-item pcoded-left-item" style="margin-top: 10px;">
                              <li class="">
                                  <a href="index_admin.php" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="fa fa-house"></i><b>D</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                              </li>
                          </ul>
                          <ul class="pcoded-item pcoded-left-item">
                              <li class="pcoded-hasmenu active">
                                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                                      <span class="pcoded-micon"><i class="fa fa-folder"></i><b>M</b></span>
                                      <span class="pcoded-mtext" data-i18n="nav.menu-levels.main">Data</span>
                                      <span class="pcoded-mcaret"></span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                      <li class="">
                                          <a href="data_pemilik.php" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-21">Data Pemilik</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                      <li class="">
                                          <a href="data_pencari.php" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-23">Data Pencari</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                                      <li class="pcoded-hasmenu active">
                                          <a href="javascript:void(0)" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-direction-alt"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.main">Data Kos</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                          <ul class="pcoded-submenu">
                                              <li class="">
                                                  <a href="data_kos.php" class="waves-effect waves-dark">
                                                      <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                      <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Data Kos</span>
                                                      <span class="pcoded-mcaret"></span>
                                                  </a>
                                              </li>
                                          </ul>
                                          <ul class="pcoded-submenu">
                                            <li class="active">
                                                <a href="approve_kos.php" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Approval Kos</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                        </ul>
                                      </li>
                                      <li class="">
                                          <a href="data_iklan.php" class="waves-effect waves-dark">
                                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                              <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-23">Data Pasang Iklan</span>
                                              <span class="pcoded-mcaret"></span>
                                          </a>
                                      </li>
                
                                  </ul>
                              </li>
                          </ul>
                          <ul class="pcoded-item pcoded-left-item">
                            <li>
                                <a href="../logout.php" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="fa-sharp fa-solid fa-right-from-bracket"></i><b>L</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Logout</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            </ul>
                      </div>
                  </nav>
                  <div class="pcoded-content">
                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <!-- Basic table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h2>Approve Kos</h2>
                                                <div class="card-header-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                            <th>No.</th>
                                                                <th>Nama Kos</th>
                                                                <th>Nama Pemilik</th>
                                                                <th>Alamat</th>
                                                                <th>Tipe Kos</th>
                                                                <th>Fasilitas</th>
                                                                <th>Lokasi</th>
                                                                <th>Jenis Kos</th>
                                                                <th>Jarak Kos Ke Kampus</th>
                                                                <th>Harga</th>
                                                                <th>Foto</th>
                                                                <th>Status</th>
                                                                <th>Tindakan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                            <?php 
                                                                $que = $kon->kueri("SELECT a.kos_id, a.kos_nama, a.kos_alamat, a.kos_tipe, a.kos_fasilitas, a.kos_lokasi, a.kos_gender, a.kos_jarak, a.kos_harga , a.status,  a.kos_gambar, b.pemilik_id , b.pemilik_id, b.pemilik_nama FROM data_kos a JOIN pemilik_kos b ON a.pemilik_id = b.pemilik_id WHERE status = 'Menunggu Konfirmasi'");
                                                                $no = 1;
                                                                $jumlah = $kon->jumlah_data($que);
                                                                if($jumlah == 0) {
                                                                    echo "<tr><td colspan=13>Tidak Ada Permintaan Approve Kos..</td></tr>";
                                                                }else {
                                                                    while($data = $kon->hasil_data($que)) {
                                                                    echo "<tr>";
                                                                    echo "<td>$no</td>";
                                                                    echo "<td>$data[kos_nama]</td>";
                                                                    echo "<td>$data[pemilik_nama]</td>";
                                                                    echo "<td>$data[kos_alamat]</td>";
                                                                    echo "<td>$data[kos_tipe]</td>";
                                                                    echo "<td>$data[kos_fasilitas]</td>";
                                                                    echo "<td>$data[kos_lokasi]</td>";
                                                                    echo "<td>$data[kos_gender]</td>";
                                                                    echo "<td>$data[kos_jarak]</td>";
                                                                    echo "<td>$data[kos_harga]</td>";
                                                                    echo "<td><img src='../pemilik/$data[kos_gambar]' width='100' /></td>";
                                                                    echo "<td>$data[status]</td>";
                                                                    if($data['status'] == 'Menunggu Konfirmasi') {
                                                                        echo "<td><a href='#' class='btn btn-success' onclick=\"javascript: window.location.href='proses_status.php?aksi=Konfirmasi&kos_id=$data[kos_id]&pemilik_id=$data[pemilik_id]'; \">Konfirmasi</a>
                                                                        <a href='#' class='btn btn-danger' onclick=\"javascript: window.location.href='proses_status.php?aksi=Tolak&kos_id=$data[kos_id]'; \">Tolak</a></td>";
                                                                    }else{
                                                                        echo "<td>Tidak Ada</td>";
                                                                    }
                                                                    echo "</tr>";
                                                                    $no++;
                                                                    }
                                                                }
                                                                ?>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                            <!-- task, page, download counter  end -->
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    <script type="text/javascript" src="assets/pages/widget/excanvas.js "></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="assets/js/modernizr/modernizr.js "></script>
    <!-- slimscroll js -->
    <script type="text/javascript" src="assets/js/SmoothScroll.js"></script>
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
    <!-- menu js -->
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical-layout.min.js "></script>
    <!-- custom js -->
    <script type="text/javascript" src="assets/pages/dashboard/custom-dashboard.js"></script>
    <script type="text/javascript" src="assets/js/script.js "></script>
</body>

</html>
