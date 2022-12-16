<?php
session_start();
include "../koneksi.php";
$kon = new Koneksi();

$idkos = @$_REQUEST['kos_id'];
$idpencari = @$_SESSION['pencari_id'];
$review = @$_POST['review'];
$rating = @$_POST['rating'];

$abc = $kon->kueri("INSERT INTO review VALUES ('','$review','$rating','$idkos','$idpencari')");

if ($abc == true) {
	include 'detail_kos.php';
	echo "<script>alert('Review berhasil ditambahkan');</script>";
}else{
	echo "<script>alert('Review gagal ditambahkan');</script>";
	include 'detail_kos.php';
}


?>
<meta http-equiv="refresh" content="1;/>