<?php
session_start();
include "../koneksi.php"; 
$kon = new Koneksi();

$aksi = @$_REQUEST['aksi'];
$idkos = @$_REQUEST['kos_id'];
$idadmin = @$_REQUEST['admin_id'];
$tglpesan = date("d-m-Y");
$idpemilik = @$_SESSION['pemilik_id'];
$idiklan = @$_REQUEST['iklan_id'];
$status = "Menunggu Konfirmasi";

switch ($aksi) {
	case 'pesan':
		$foto_awal = @$_FILES['fotobukti']['tmp_name'];
		$foto_tujuan = uniqid().@$_FILES['fotobukti']['name'];

		if(!file_exists('foto')){
			mkdir('foto');
		}
		move_uploaded_file($foto_awal, 'foto/'.$foto_tujuan);
	   
		$abc = $kon->kueri("INSERT INTO pemesanan_iklan VALUES ('', NOW(), 'foto/$foto_tujuan','$status', '$idiklan', '$idkos', '$idpemilik', '$idadmin')");
		break;
		
		var_dump($abc);

  }

?>
<meta http-equiv="refresh" content="0;URL=data_iklan.php"/>