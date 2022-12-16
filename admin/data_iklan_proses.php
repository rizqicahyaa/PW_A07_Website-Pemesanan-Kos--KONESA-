<?php
include "../koneksi.php";
$kon = new koneksi ();
$aksi = @$_REQUEST['aksi'];

switch ($aksi){

    case 'hapus' :
    $id = @$_REQUEST['tid'];
    
    $abc = $kon->kueri ("DELETE FROM pemesanan_iklan WHERE pemesanan_id = '$id' ");

    if($abc == TRUE) {
        echo "<script>alert('Hapus data sukses.');</script>";
    }else {
        echo "<script>alert('Hapus data gagal');</script>";
    }
    break;
}
?>
<meta http-equiv="refresh" content="0;URL=data_iklan.php" />