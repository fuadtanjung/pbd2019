<?php
include $_SERVER['DOCUMENT_ROOT'].'/pbd3/koneksi/koneksi.php';

$id_petugas = $_POST['id_petugas'];
$id_pelaporan = $_POST['id_pelaporan'];

$sql = pg_query("INSERT INTO detail_petugas (id_petugas,id_pelaporan) values 
                            ('$id_petugas','$id_pelaporan')");

if ($sql){
    header('Location:/pbd3/admin/penanganan.php');
}else{
    echo 'There is something error your SQL ! Check it again !';
}
?>