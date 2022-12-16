<?php
include "../koneksi.php";
$kon = new koneksi ();
$aksi = @$_REQUEST['aksi'];

switch ($aksi){

    case 'hapus' :
    $id = @$_REQUEST['tid'];
    
    $yo = $kon->kueri("SELECT pencari_gambar FROM pencari_kos WHERE pencari_id = '$id' ");
    $data = $kon->hasil_data($yo);
    if(file_exists($data['pencari_gambar'])){
        unlink($data['pencari_gambar']);
    }

    $abc = $kon->kueri ("DELETE FROM pencari_kos WHERE pencari_id = '$id' ");

    if($abc == TRUE) {
        echo "<script>alert('Hapus data sukses.');</script>";
    }else {
        echo "<script>alert('Hapus data gagal');</script>";
    }
    break;
}
?>
<meta http-equiv="refresh" content="0;URL=data_pencari.php" />