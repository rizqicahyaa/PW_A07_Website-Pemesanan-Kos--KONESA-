<?php
include '../koneksi.php';
$kon = new koneksi();
// proses

$aksi = @$_REQUEST['aksi'];
$idkos = @$_REQUEST['kos_id'];
$idpemilik = @$_REQUEST['pemilik_id'];

switch ($aksi) {
  case 'Kosong':
    $kon->kueri("UPDATE data_kos SET status = 'Kosong' WHERE kos_id = '$idkos'");
  break;
  case 'Penuh':
    $kon->kueri("UPDATE data_kos SET status = 'Penuh' WHERE kos_id = '$idkos'");
  break;
}
?>
<meta http-equiv="refresh" content="0;URL=data_kos.php" />