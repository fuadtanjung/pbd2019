<?php
include $_SERVER['DOCUMENT_ROOT'].'/pbd3/koneksi/koneksi.php';

$in_petugas = $_POST['in_petugas'];

$sql = pg_query("INSERT INTO petugas (in_petugas) values 
                            ('$in_petugas')");

if ($sql){
    header('Location:/pbd3/admin/petugas.php');
}else{
    echo 'There is something error your SQL ! Check it again !';
}
?>