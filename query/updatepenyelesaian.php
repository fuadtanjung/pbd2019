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
$tipe = $_POST['tipe'];
$kategori = $_POST['kategori'];
$users = $_POST['users'];
$urgensi = $_POST['urgensi'];
$dampak = $_POST['dampak'];
$prioritas = $_POST['prioritas'];
$status = $_POST['status'];
$solusi = $_POST['solusi'];
$tanggal_penyelesaian = $_POST['tanggal_penyelesaian'];
$tanggal_penyelesaian = $_POST['tanggal_pemuktahiran'];
$status_pengguna = $_POST['status_pengguna'];


$sql  = "UPDATE informasi_pelaporan SET  nama_pengguna='$nama_pengguna', kontak_pengguna='$kontak_pengguna', 
                                         media_pelaporan='$media_pelaporan', 
                                         waktu_pelaporan='$waktu_pelaporan', no_tiket='$no_tiket',
                                         deskripsi='$deskripsi',keterangan='$keterangan',status='$status'
                                         ,tipe='$tipe',kategori='$kategori',users='$users',urgensi='$urgensi'
                                         ,dampak='$dampak',prioritas='$prioritas',solusi='$solusi'
                                         ,tanggal_penyelesaian='$tanggal_penyelesaian',tanggal_pemuktahiran='$tanggal_penyelesaian'
                                         ,status_pengguna='$status_pengguna'
                                          WHERE nama_pengguna='$nama_pengguna'";
$update = pg_query($sql);

if ($update){
    header('Location:/pbd3/update/updatejenis.php');
}else{
    echo 'error';
}
?>