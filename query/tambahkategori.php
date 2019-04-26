<?php
include $_SERVER['DOCUMENT_ROOT'].'/pbd3/koneksi/koneksi.php';

$nm_kategori = $_POST['nm_kategori'];
$sk_kategori = $_POST['sk_kategori'];

$sql = pg_query("INSERT INTO kategori (nm_kategori,sk_kategori) values 
                            ('$nm_kategori','$sk_kategori')");

if ($sql){
    header('Location:/pbd3/admin/kategori.php');
}else{
    echo 'There is something error your SQL ! Check it again !';
}
?>