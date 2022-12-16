<?php 
@session_start();
require_once '../koneksi.php';
$kon = new Koneksi();

$idiklan = @$_REQUEST['iklan_id'];
$idpemesanan = @$_REQUEST['pemesanan_id'];
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
          <div class="col-4"><a href="index_pemilik.php"><i class="fa fa-circle-chevron-left"></i></a></div>
              <!-- Nav Start -->
              <div class="classy-navbar">
                <ul>
                  <li><h2 class="font-weight-bold">Data Iklan Saya</h2></li>
                </ul>
              </div>
          </nav>
        </div>
      </div>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Featured Properties Area Start ##### -->
    <section
      class="featured-properties-area section-padding-100-50" style="margin-top: 30px"
    >
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 mt-1">
             <div class="section-heading wow fadeInUp">
               <div class="table-responsive">
                  <!-- search -->
                  <div class="searching input-group col-lg-4 mb-4">
                      <input type="search" class="search-field light-table-filter form-control border-right-0" data-table="order-table" placeholder="Cari"> 
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-white px-4 border-md border-left-0">
                          <i class="fa fa-search"></i>
                        </span>
                    </div>
                  </div>
                  <!-- tabel -->
                  <table class="table table-bordered order-table" id="dataTable" width="100%" cellspacing="0">
                    <thead style="background-color: #0054d7; color: white;">
                      <tr class="text-center">
                        <td>No</td>
                        <td>Nama Paket iklan</td>
                        <td>Lama iklan</td>
                        <td>Harga iklan</td>
                        <td>Tanggal Pemesanan</td>
                        <td>Bukti Pembayaran</td>
                        <td>Status</td>
                      </tr>
                    </thead>
                    <tbody id="myTable" style="background:white; color:black;">
                      <tr>
                      <?php 
                            $abc = $kon->kueri("SELECT a.pemesanan_id, a.tanggal_pemesanan, a.bukti_pembayaran, a.status, 
                            b.iklan_id, b.iklan_paket, b.iklan_harga, b.lama_iklan, c.kos_id, d.pemilik_id
                            FROM pemesanan_iklan a JOIN iklan b ON a.iklan_id = b.iklan_id
                            JOIN data_kos c ON a.kos_id = c.kos_id
                            JOIN pemilik_kos d ON a.pemilik_id = d.pemilik_id
                            WHERE a.pemilik_id = '$idpemilik' ");
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
                              echo "<td>$data[tanggal_pemesanan]</td>";
                              echo "<td><img src='$data[bukti_pembayaran]' width='100' /></td>";
                              var_dump($data['bukti_pembayaran']);
                              echo "<td>$data[status]</td>";
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
