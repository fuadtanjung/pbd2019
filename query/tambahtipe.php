<?php
include $_SERVER['DOCUMENT_ROOT'].'/pbd3/koneksi/koneksi.php';

$nm_tipe = $_POST['nm_tipe'];
$sk_tipe = $_POST['sk_tipe'];

$sql = pg_query("INSERT INTO tipe (nm_tipe,sk_tipe) values 
                            ('$nm_tipe','$sk_tipe')");

if ($sql){
    header('Location:/pbd3/admin/tipe.php');
}else{
    echo 'There is something error your SQL ! Check it again !';
}
?>