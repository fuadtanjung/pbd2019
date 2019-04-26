<?php

include $_SERVER['DOCUMENT_ROOT'].'/pbd3/koneksi/koneksi.php';

$nama_pengguna = $_POST['nama_pengguna'];
$kontak_pengguna = $_POST['kontak_pengguna'];
$waktu_pelaporan = date('d-m-Y');
$status = $_POST['status'];
$deskripsi = $_POST['deskripsi'];


$sql = pg_query("INSERT INTO informasi_pelaporan (nama_pengguna,kontak_pengguna,waktu_pelaporan,deskripsi,status)
                values ('$nama_pengguna','$kontak_pengguna','$waktu_pelaporan','$deskripsi','$status')");

if ($sql){
    echo "<script>alert('Pengaduan Sudah Di Sampaikan!');
    window.location='/pbd3/';</script>";
}else{
    echo 'There is something error your SQL` ! Check it again !';
}
?>