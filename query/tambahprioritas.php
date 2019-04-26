<?php
include $_SERVER['DOCUMENT_ROOT'].'/pbd3/koneksi/koneksi.php';

$nm_prioritas = $_POST['nm_prioritas'];
$sk_prioritas = $_POST['sk_prioritas'];

$sql = pg_query("INSERT INTO prioritas (nm_prioritas,sk_prioritas) values 
                            ('$nm_prioritas','$sk_prioritas')");

if ($sql){
    header('Location:/pbd3/admin/prioritas.php');
}else{
    echo 'There is something error your SQL ! Check it again !';
}
?>