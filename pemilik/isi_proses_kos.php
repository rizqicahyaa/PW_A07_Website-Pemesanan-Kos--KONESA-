<?php
session_start();
include "../koneksi.php";
$kon = new Koneksi();

$idkos = @$_POST['idkos'];
$namakos = @$_POST['tnamakos'];
$gender = @$_POST['gender'];
$jenisid = @$_POST['jenisid'];
$tipekos = @$_POST['tipekos'];
$lokasi = @$_POST['lokasi'];
$jarak = @$_POST['jarak'];
$alamat = @$_POST['talamat'];
$tharga = @$_POST['tharga'];
$idpemilik = @$_SESSION['pemilik_id'];
$status = "Menunggu Konfirmasi";

#-- Upload Foto profil

$foto_awal = @$_FILES['foto']['tmp_name'];
$foto_tujuan = uniqid().@$_FILES['foto']['name'];

#-- Simpan gambar pada folder 'foto', jika belum ada maka buat saja :D
if(!file_exists('fotokos')){
    mkdir('fotokos');
}
move_uploaded_file($foto_awal, 'fotokos/'.$foto_tujuan);

if (isset($_POST['submit'])) {
	$data = implode(",", $_POST['fasilitas']);
	$abc = $kon->kueri("INSERT INTO data_kos VALUES ('$idkos', '$namakos', '$alamat','$tharga', '".$data."', '$tipekos', '$jarak','$gender' , '$lokasi', 'fotokos/$foto_tujuan', '$status', $idpemilik)");
   }

if ($abc == true) {
	include 'data_kos.php';
	echo "<script>alert('Isi Data Berhasil');</script>";
}else{
	echo "<script>alert('Isi Data Gagal');</script>";
	include 'isi_kos.php';
}
?>