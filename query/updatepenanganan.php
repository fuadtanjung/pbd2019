<?php
include $_SERVER['DOCUMENT_ROOT'].'/pbd3/koneksi/koneksi.php';

$id_pelaporan = $_POST['id_pelaporan'];
$nama_pengguna = $_POST['nama_pengguna'];
$kontak_pengguna = $_POST['kontak_pengguna'];
$media_pelaporan = $_POST['media_pelaporan'];
$waktu_pelaporan = $_POST['waktu_pelaporan'];
$no_tiket = $_POST['no_tiket'];
$deskripsi = $_POST['deskripsi'];
$keterangan = $_POST['keterangan'];
$status = $_POST['status'];

$sql  = "UPDATE informasi_pelaporan SET  nama_pengguna='$nama_pengguna', kontak_pengguna='$kontak_pengguna', 
                                         media_pelaporan='$media_pelaporan', 
                                         waktu_pelaporan='$waktu_pelaporan', no_tiket='$no_tiket',
                                         deskripsi='$deskripsi',keterangan='$keterangan',status='$status'
                                          WHERE id_pelaporan='$id_pelaporan'";
$update = pg_query($sql);

if ($update){
    header('Location:/pbd3/update/updatepetugas.php');
}else{
    echo 'error';
}
?>