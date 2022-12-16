<?php
session_start();
include "../koneksi.php";
$kon = new Koneksi();

$id = @$_POST['id'];
$nama = @$_POST['tnama'];
$email = @$_POST['temail'];
$telp = @$_POST['ttelp'];
$password = @$_POST['tpassword'];

 #-- Upload Foto profil

 $foto_awal = @$_FILES['fotoprofil']['tmp_name'];
 $foto_tujuan = uniqid().@$_FILES['fotoprofil']['name'];

#-- Simpan gambar pada folder 'foto', jika belum ada maka buat saja :D
 if(!file_exists('foto')){
     mkdir('foto');
 }
 move_uploaded_file($foto_awal, 'foto/'.$foto_tujuan);

$abc = $kon->kueri("INSERT INTO admin(admin_id, admin_nama, admin_email, admin_telp, admin_password, admin_gambar) VALUES ('$id', '$nama', '$email', '$telp', MD5('$password'), 'foto/$foto_tujuan')");

if ($abc == true) {
	include 'login_admin.php';
	echo "<script>alert('Daftar Berhasil');</script>";
}else{
	echo "<script>alert('Daftar Gagal');</script>";
	include 'daftar_admin.php';
}


?>
<meta http-equiv="refresh" content="1;/>