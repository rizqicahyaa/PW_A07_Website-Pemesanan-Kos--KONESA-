<?php
include "../koneksi.php";
$kon = new koneksi ();
$aksi = @$_REQUEST['aksi'];

switch ($aksi) {
    case 'edit':
    $idx = @$_POST['hid'];
    $id = addslashes (@$_POST['id']);
    $jenisid = addslashes (@$_POST['jenisid']);

    $cekfoto = @$_POST['cbcek'];

    if ($cekfoto == 'GANTI') {
        $foto_temp = @$_FILES['fotoid']['tmp_name'];
        $foto_tujuan = uniqid().@$_FILES['fotoid']['name'];

            #--Jika upload file berhasil, maka file gambar lama di hapus
        if (move_uploaded_file($foto_temp, "foto/".$foto_tujuan) == TRUE){

            #--Hapus Dulu Fotonya 
            $yo = $kon->kueri("SELECT pemilik_foto_identitas FROM pemilik_kos WHERE pemilik_id = '$idx' ");
            $data = $kon->hasil_data($yo);
            if(file_exists($data['foto'])){
                unlink($data['foto']);
            }
        }

            #-- Update foto dlm tabel
        $abc = $kon->kueri("UPDATE pemilik_kos SET pemilik_foto_identitas = 'foto/$foto_tujuan' WHERE pemilik_id = '$idx' ");
    }
      // panggil kueri
    $abc = $kon->kueri("UPDATE pemilik_kos SET pemilik_jenis_identitas = '$jenisid' WHERE pemilik_id = '$idx' ");
    if($abc == TRUE) {
        echo "<script>alert('Edit data sukses.');</script>";
    }else{
        echo "<script>alert('Edit data gagal.');</script>";
    }
    break;
}
?>
<meta http-equiv="refresh" content="0;URL=data_diri_pemilik.php" />