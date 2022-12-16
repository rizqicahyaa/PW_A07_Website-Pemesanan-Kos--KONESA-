<?php 
session_start();
include "../koneksi.php";
$kon = new Koneksi();

$email = @$_POST['temail'];
$password = @$_POST['tpassword'];
$abc = $kon->kueri("SELECT admin_id, admin_email, admin_nama, admin_password FROM admin WHERE admin_email = '$email' AND admin_password = MD5('$password')");
$jumlah = $kon->jumlah_data($abc);

if ($jumlah == 0) {
	include 'login_admin.php';
	echo "<script>alert('Login Gagal')</script>";
}else{
	$hasil = $kon->hasil_data($abc);
	$_SESSION['admin_id'] = $hasil['admin_id']; 
	$_SESSION['email'] = $hasil['admin_email'];
	$_SESSION['nama'] = $hasil['admin_nama'];
	echo "<script>alert('Login Berhasil');</script>";
	include 'index_admin.php';
}
?>