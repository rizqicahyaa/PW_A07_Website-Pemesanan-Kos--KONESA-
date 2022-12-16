<?php
session_start();
include "../koneksi.php"; 
$kon = new Koneksi();

$aksi = @$_REQUEST['aksi'];
$idkos = @$_REQUEST['kos_id'];
$tglpesan = date("Y-m-d");
$idpemilik = @$_REQUEST['pemilik_id'];
$idpencari = @$_SESSION['pencari_id'];
$status = "Menunggu Konfirmasi";

switch ($aksi) {
	case 'pesan':
$abc = $kon->kueri("INSERT INTO riwayat_pemesanan VALUES ('', NOW(), '$status','$idkos', '$idpemilik', '$idpencari')");

if ($abc == true) {
	include 'riwayat_transaksi.php';
	echo "<script>alert('Sewa Kamar Berhasil');</script>";
}else{
	echo "<script>alert('Sewa Kamar Gagal');</script>";
	include 'form_sewa.php';
}
break;
  }

?>
<meta http-equiv="refresh" content="1;/>