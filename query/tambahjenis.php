<?php
include $_SERVER['DOCUMENT_ROOT'].'/pbd3/koneksi/koneksi.php';

$nm_jenis = $_POST['nm_jenis'];
$sk_jenis = $_POST['sk_jenis'];

$sql = pg_query("INSERT INTO jenis (nm_jenis,sk_jenis) values 
                            ('$nm_jenis','$sk_jenis')");

if ($sql){
    header('Location:/pbd3/admin/jenis.php');
}else{
    echo 'There is something error your SQL ! Check it again !';
}
?>