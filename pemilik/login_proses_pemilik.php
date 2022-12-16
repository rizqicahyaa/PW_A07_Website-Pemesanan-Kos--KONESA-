<?php 
session_start();
include '../koneksi.php';
$kon = new Koneksi();

$email = @$_POST['temail'];
$password = @$_POST['tpassword'];
$abc = $kon->kueri("SELECT pemilik_id, pemilik_email, pemilik_nama, pemilik_password FROM pemilik_kos WHERE pemilik_email = '$email' AND pemilik_password = MD5('$password')");
$jumlah = $kon->jumlah_data($abc);

if ($jumlah == 0) {
	include 'login_pemilik.php';
	echo "<script>alert('Login Gagal')</script>";
}else{
	$hasil = $kon->hasil_data($abc);
	$_SESSION['pemilik_id'] = $hasil['pemilik_id'];
	$_SESSION['temail'] = $hasil['pemilik_email'];
	$_SESSION['tnama'] = $hasil['pemilik_nama'];
	echo "<script>alert('Login Berhasil');</script>";
	include 'index_pemilik.php';
}

?>