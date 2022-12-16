<?php
include '../koneksi.php';
$kon = new koneksi();
// proses

$aksi = @$_REQUEST['aksi'];
$idriwayat = @$_REQUEST['riwayat_id'];
$idpemilik = @$_REQUEST['pencari_id'];
$idkos = @$_REQUEST['kos_id'];

switch ($aksi) {
  case 'Terima':
    $kon->kueri("UPDATE riwayat_pemesanan SET status = 'Pemesanan diterima' WHERE riwayat_id = '$idriwayat'");
  break;
  case 'Tolak':
    $kon->kueri("UPDATE riwayat_pemesanan SET status = 'Pemesanan ditolak' WHERE riwayat_id = '$idriwayat'");
    break;
    default:
}
?>
<meta http-equiv="refresh" content="0;URL=pesanan.php" />