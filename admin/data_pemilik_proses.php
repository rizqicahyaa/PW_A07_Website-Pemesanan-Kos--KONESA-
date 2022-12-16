<?php
include "../koneksi.php";
$kon = new koneksi ();
$aksi = @$_REQUEST['aksi'];

switch ($aksi){

    case 'hapus' :
    $id = @$_REQUEST['tid'];
    
    $yo = $kon->kueri("SELECT pemilik_gambar FROM pemilik_kos WHERE pemilik_id = '$id' ");
    $data = $kon->hasil_data($yo);
    if(file_exists($data['pemilik_gambar'])){
        unlink($data['pemilik_gambar']);
    }

    $abc = $kon->kueri ("DELETE FROM pemilik_kos WHERE pemilik_id = '$id' ");

    if($abc == TRUE) {
        echo "<script>alert('Hapus data sukses.');</script>";
    }else {
        echo "<script>alert('Hapus data gagal');</script>";
    }
    break;
}
?>
<meta http-equiv="refresh" content="0;URL=data_pemilik.php" />