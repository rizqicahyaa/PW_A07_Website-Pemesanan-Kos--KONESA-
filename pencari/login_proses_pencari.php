<?php 
session_start();
include "../koneksi.php";
$kon = new Koneksi();

$email = @$_POST['temail'];
$password = @$_POST['tpassword'];
$abc = $kon->kueri("SELECT pencari_id, pencari_email, pencari_nama, pencari_password FROM pencari_kos WHERE pencari_email = '$email' 
AND pencari_password = MD5('$password')");
$jumlah = $kon->jumlah_data($abc);
if ($jumlah == 0) {
	include 'login_pencari.php';
	echo "<script>alert('Login Gagal')</script>";
}else{
	$hasil = $kon->hasil_data($abc);
	$_SESSION['pencari_id'] = $hasil['pencari_id']; 
	$_SESSION['email'] = $hasil['pencari_email'];
	$_SESSION['nama'] = $hasil['pencari_nama'];
	echo "<script>alert('Login Berhasil');</script>";
	include 'index_pencari.php';
}
?>
<meta http-equiv="refresh" content="0; />