<?php
session_start();
include "../koneksi.php";
$kon = new Koneksi();

$id = @$_POST['id'];
$nama = @$_POST['tnama'];
$email = @$_POST['temail'];
$telp = @$_POST['ttelp'];
$tgllahir= @$_POST['tgllahir'];
$gender = @$_POST['gender'];
$jenisid = @$_POST['jenisid'];
$password = @$_POST['tpassword'];

 #-- Upload Foto profil

 $foto_awal = @$_FILES['fotoprofil']['tmp_name'];
 $foto_tujuan = uniqid().@$_FILES['fotoprofil']['name'];

#-- Simpan gambar pada folder 'foto', jika belum ada maka buat saja :D
 if(!file_exists('foto')){
     mkdir('foto');
 }
 move_uploaded_file($foto_awal, 'foto/'.$foto_tujuan);

 #-- Upload Foto Identitas

  $gambar_awal = @$_FILES['fotoid']['tmp_name'];
  $gambar_tujuan = uniqid().@$_FILES['fotoid']['name'];
 
 #-- Simpan gambar pada folder 'foto', jika belum ada maka buat saja :D
  move_uploaded_file($gambar_awal, 'foto/'.$gambar_tujuan);

$abc = $kon->kueri("INSERT INTO pemilik_kos(pemilik_id, pemilik_nama, pemilik_email, pemilik_telp, pemilik_gender, pemilik_password, pemilik_gambar, pemilik_tanggal_lahir,pemilik_foto_identitas, pemilik_jenis_identitas) VALUES ('$id', '$nama', '$email', '$telp','$gender', MD5('$password'), 'foto/$foto_tujuan' , '$tgllahir' , 'foto/$gambar_tujuan', '$jenisid')");

if ($abc == true) {
	include 'login_pemilik.php';
	echo "<script>alert('Daftar Berhasil');</script>";
}else{
	echo "<script>alert('Daftar Gagal');</script>";
	include 'daftar_pemilik.php';
}


?>
<meta http-equiv="refresh" content="1;/>