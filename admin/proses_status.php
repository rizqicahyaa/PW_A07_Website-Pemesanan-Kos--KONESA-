<?php
include '../koneksi.php';
$kon = new koneksi();
// proses

$aksi = @$_REQUEST['aksi'];
$idkos = @$_REQUEST['kos_id'];
$idpemilik = @$_REQUEST['pemilik_id'];
$idpemesanan = @$_REQUEST['pemesanan_id'];

switch ($aksi) {
  case 'Konfirmasi':
    $kon->kueri("UPDATE data_kos SET status = 'Telah dikonfirmasi' WHERE kos_id = '$idkos'");
  break;
  case 'Tolak':
    $kon->kueri("UPDATE data_kos SET status = 'Ditolak' WHERE kos_id = '$idkos'");
  default:
  break;
  case '30 Hari':
    $kon->kueri("UPDATE pemesanan_iklan SET status = 'Aktif 30 Hari' WHERE pemesanan_id = '$idpemesanan'");
    break;

    case '6 Bulan':
      $kon->kueri("UPDATE pemesanan_iklan SET status = 'Aktif 6 Bulan' WHERE pemesanan_id = '$idpemesanan'");
      break;
  
    case '1 Tahun':
      $kon->kueri("UPDATE pemesanan_iklan SET status = 'Aktif 1 Tahun' WHERE pemesanan_id = '$idpemesanan'");

      break;
  
}
?>
<meta http-equiv="refresh" content="0;URL=data_iklan.php" />