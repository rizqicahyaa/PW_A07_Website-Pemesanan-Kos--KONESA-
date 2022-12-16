<?php 
@session_start();
require_once '../koneksi.php';
$kon = new Koneksi();
$id = @$_SESSION['pemilik_id'];
$idpemilik = @$_REQUEST['pemilik_id'];
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
    <div id="preloader">
      <div class="south-load"></div>
    </div>

    <!-- Main Header Area -->
    <div class="main-header-area" id="stickyHeader">
      <div class="classy-nav-container">
        <!-- Classy Menu -->
        <nav class="classy-navbar justify-content-sm-start">
          <div class="col-4">
            <a href="index_pemilik.php"
              ><i class="fa fa-circle-chevron-left"></i
            ></a>
          </div>
          <!-- Nav Start -->
          <div class="classy-navbar">
            <ul>
              <li><h2 class="font-weight-bold">Data Kos</h2></li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
    <!-- ##### Header Area End ##### -->

<!-- ##### Featured Properties Area Start ##### -->
<section
      class="featured-properties-area section-padding-100-10" style="margin-top: 30px"
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

                  <div class="mb-4" style="float:right;">
                    <a href="isi_kos.php" class="btn btn-small btn-primary"><i class="fa-sharp fa-solid fa-circle-plus"></i>
                          <span>Tambah</span>
                        </a>
                      </div>
      
                  <!-- tabel -->
                  <table class="table table-bordered order-table" id="dataTable" width="100%" cellspacing="0">
                    <thead style="background-color: #0054d7; color: white;">
                      <tr class="text-center">
                        <td>No</td>
                        <td>Nama Kos</td>
                        <td>Alamat</td>
                        <td>Harga</td>
                        <td>Fasilitas</td>
                        <td>Tipe</td>
                        <td>Jarak ke Kampus</td>
                        <td>Jenis</td>
                        <td>Lokasi</td>
                        <td>Foto</td>
                        <td>Status</td>
                        <td  colspan="3">Tindakan</td>
                      </tr>
                    </thead>
                    <tbody id="myTable" style="background:white; color:black;">
                      <tr>
                      <?php 
                           $que = $kon->kueri("SELECT a.kos_id, a.kos_nama, a.kos_alamat, a.kos_harga, a.kos_fasilitas, a.kos_tipe, a.kos_jarak, a.kos_gender, a.kos_lokasi, a.kos_gambar, a.status, b.pemilik_id FROM data_kos a INNER JOIN pemilik_kos b ON a.pemilik_id = b.pemilik_id WHERE a.pemilik_id = '$id' ");
                           $no = 1;
                           $jumlah = $kon->jumlah_data($que);
                           if($jumlah == 0) {
                            echo "<tr><td colspan=12>Data Kosong...</td></tr>";
                          }else {
                            while($data = $kon->hasil_data($que)) {
                              echo "<tr>";
                              echo "<td>$no</td>";
                              echo "<td>$data[kos_nama]</td>";
                              echo "<td>$data[kos_alamat]</td>";
                              echo "<td>$data[kos_harga]</td>";
                              echo "<td>$data[kos_fasilitas]</td>";
                              echo "<td>$data[kos_tipe]</td>";
                              echo "<td>$data[kos_jarak]</td>";
                              echo "<td>$data[kos_gender]</td>";
                              echo "<td>$data[kos_lokasi]</td>";
                              echo "<td><img src='$data[kos_gambar]' width='100' /></td>";
                              echo "<td>$data[status]</td>";
                              if($data['status'] == 'Telah dikonfirmasi') {
                                echo "<td><a href='#' class='btn btn-success' onclick=\"javascript: window.location.href='proses_status.php?aksi=Kosong&kos_id=$data[kos_id]&pemilik_id=$data[pemilik_id]'; \">Kosong</a>
                                <a href='#' class='btn btn-danger mt-2' onclick=\"javascript: window.location.href='proses_status.php?aksi=Penuh&kos_id=&status= $data[kos_id]'; \">Penuh</a></td>";
                              }elseif($data['status'] == 'Kosong') {
                                echo "<td><a href='#' class='btn btn-danger' onclick=\"javascript: window.location.href='proses_status.php?aksi=Penuh&kos_id=$data[kos_id]&pemilik_id=$data[pemilik_id]'; \">Penuh</a></td>";
                              } elseif ($data['status'] == 'Penuh') {
                                echo "<td><a href='#' class='btn btn-success' onclick=\"javascript: window.location.href='proses_status.php?aksi=Kosong&kos_id=$data[kos_id]&pemilik_id=$data[pemilik_id]'; \">Kosong</a></td>";
                            }else {
                                echo "<td>Tidak Ada</td>";
                              }
                              echo "<td><a href='#' class='btn-small btn-outline-danger' onclick=\"javascript: if(confirm('Apakah kos ".addslashes($data['kos_nama'])." mau dihapus?')==true)
                              {window.location.href='data_kos_proses.php?aksi=hapus&tid=$data[kos_id]'; } \"><i class='fas fa-fw fa-trash'></i><span>Hapus</span></a></td>";
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

    <!-- js membuat input No.Hp hanya angka  -->
    <script type="text/javascript">
      function Angkasaja(evt) {
        var charCode = evt.which ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
        return true;
      }
    </script>

    <!-- js Upload Gambar -->
    <script>
      $(document).ready(function () {
        $("form").ajaxForm(function () {
          alert("Uploaded SuccessFully");
        });
      });

      function preview_image() {
        var total_file = document.getElementById("upload_file").files.length;
        for (var i = 0; i < total_file; i++) {
          $("#image_preview").append(
            "<img src='" + URL.createObjectURL(event.target.files[i]) + "'><br>"
          );
          $("#image_preview img").css({
            height: "200px",
            "margin-top": "10px",
          });
        }
      }
    </script>

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
