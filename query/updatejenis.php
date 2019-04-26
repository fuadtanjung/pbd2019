<?php
include $_SERVER['DOCUMENT_ROOT'].'/pbd3/koneksi/koneksi.php';

$id_jenis = $_POST['id_jenis'];
$id_pelaporan = $_POST['id_pelaporan'];

$sql = pg_query("INSERT INTO detail_jenis (id_jenis,id_pelaporan) values 
                            ('$id_jenis','$id_pelaporan')");

if ($sql){
    header('Location:/pbd3/admin/penyelesaian.php');
}else{
    echo 'There is something error your SQL ! Check it again !';
}
?>