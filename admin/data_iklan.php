<?php 
session_start();
include "../koneksi.php";
$kon = new Koneksi();
$admin = @$_REQUEST['admin_id'];
$admin = @$_REQUEST['pemesanan_id'];
$admin = @$_REQUEST['pemilik_id'];
$admin = @$_REQUEST['iklan_id'];
$idadmin = @$_SESSION['admin_id'];

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
                                              <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-21">Data Approve Kos</span>
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
                                      <li class="pcoded-hasmenu">
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
                                            <li class="">
                                                <a href="approve_kos.php" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Approval Kos</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                        </ul>
                                      </li>
                                      <li class="active">
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
                                                <h2>Data Pemesanan Iklan</h2>
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
                                                            <td>No</td>
                                                            <td>Nama Paket iklan</td>
                                                            <td>Lama iklan</td>
                                                            <td>Harga iklan</td>
                                                            <td>Nama Pemesanan</td>
                                                            <td>No.Hp</td>
                                                            <td>Tanggal Pemesanan</td>
                                                            <td>Bukti Pembayaran</td>
                                                            <th>Status</th>
                                                            <th>Tindakan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                            <?php 
                                                                $abc = $kon->kueri("SELECT a.pemesanan_id, a.tanggal_pemesanan, a.bukti_pembayaran, a.status, 
                                                                b.iklan_id, b.iklan_paket, b.iklan_harga, b.lama_iklan, c.kos_id, d.pemilik_id, d.pemilik_nama, d.pemilik_telp
                                                                FROM pemesanan_iklan a JOIN iklan b ON a.iklan_id = b.iklan_id
                                                                JOIN data_kos c ON a.kos_id = c.kos_id
                                                                JOIN pemilik_kos d ON a.pemilik_id = d.pemilik_id ORDER BY tanggal_pemesanan DESC");
                                                            $no = 1;
                                                            $jumlah = $kon->jumlah_data($abc);
                                                            if($jumlah == 0) {
                                                                echo "<tr><td colspan=12>Data Kosong...</td></tr>";
                                                            }else {
                                                                while($data = $kon->hasil_data($abc)) {
                                                                echo "<tr>";
                                                                echo "<td>$no</td>";
                                                                echo "<td>$data[iklan_paket]</td>";
                                                                echo "<td>$data[lama_iklan]</td>";
                                                                echo "<td>$data[iklan_harga]</td>";
                                                                echo "<td>$data[pemilik_nama]</td>";
                                                                echo "<td>$data[pemilik_telp]</td>";
                                                                echo "<td>$data[tanggal_pemesanan]</td>";
                                                                echo "<td><img src='$data[bukti_pembayaran]' width='100' /></td>";
                                                                echo "<td>$data[status]</td>";
                                                                if($data['status'] == 'Menunggu Konfirmasi') {
                                                                    echo "<td><a href='#' class='btn btn-success' onclick=\"javascript: window.location.href='proses_status.php?aksi=30 Hari&pemesanan_id=$data[pemesanan_id]&pemilik_id=$data[pemilik_id]'; \">Aktif 30 Hari</a>
                                                                    <a href='#' class='btn btn-success' onclick=\"javascript: window.location.href='proses_status.php?aksi=6 Bulan&pemesanan_id=$data[pemesanan_id]&pemilik_id=$data[pemilik_id]'; \">Aktif 6 Bulan</a>
                                                                    <a href='#' class='btn btn-success' onclick=\"javascript: window.location.href='proses_status.php?aksi=1 Tahun&pemesanan_id=$data[pemesanan_id]&pemilik_id=$data[pemilik_id]'; \">Aktif 1 Tahun</a>
                                                                    </td>";
                                                                  }elseif($data['status'] == 'Aktif 30 Hari') {
                                                                    echo "<td>
                                                                    <a href='#' class='btn btn-success' onclick=\"javascript: window.location.href='proses_status.php?aksi=6 Bulan&pemesanan_id=$data[pemesanan_id]&pemilik_id=$data[pemilik_id]'; \">Aktif 6 Bulan</a>
                                                                    <a href='#' class='btn btn-success' onclick=\"javascript: window.location.href='proses_status.php?aksi=1 Tahun&pemesanan_id=$data[pemesanan_id]&pemilik_id=$data[pemilik_id]'; \">Aktif 1 Tahun</a></td>";
                                                                  } elseif ($data['status'] == 'Aktif 6 Bulan') {
                                                                    echo "<td><a href='#' class='btn btn-success' onclick=\"javascript: window.location.href='proses_status.php?aksi=30 Hari&pemesanan_id=$data[pemesanan_id]&pemilik_id=$data[pemilik_id]'; \">Aktif 30 Hari</a>
                                                                    <a href='#' class='btn btn-success' onclick=\"javascript: window.location.href='proses_status.php?aksi=1 Tahun&pemesanan_id=$data[pemesanan_id]&pemilik_id=$data[pemilik_id]'; \">Aktif 1 Tahun</a></td>";
                                                                } elseif ($data['status'] == 'Aktif 1 Tahun') {
                                                                    echo "<td><a href='#' class='btn btn-success' onclick=\"javascript: window.location.href='proses_status.php?aksi=30 Hari&pemesanan_id=$data[pemesanan_id]&pemilik_id=$data[pemilik_id]'; \">Aktif 30 Hari</a>
                                                                    <a href='#' class='btn btn-success' onclick=\"javascript: window.location.href='proses_status.php?aksi=6 Bulan&pemesanan_id=$data[pemesanan_id]&pemilik_id=$data[pemilik_id]'; \">Aktif 6 Bulan</a></td>";
                                                                }else {
                                                                    echo "<td>Tidak Ada</td>";
                                                                  }
                                                                  echo "<td><a href='#' class='btn-small btn-outline-danger' onclick=\"javascript: if(confirm('Apakah pemesanan dengan nama pemesan ".addslashes($data['pemilik_nama'])." mau dihapus?')==true)
                                                                  {window.location.href='data_iklan_proses.php?aksi=hapus&tid=$data[pemesanan_id]'; } \"><i class='fas fa-fw fa-trash'></i><span>Hapus</span></a></td>";
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
