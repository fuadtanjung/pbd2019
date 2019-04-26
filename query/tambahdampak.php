<?php
include $_SERVER['DOCUMENT_ROOT'].'/pbd3/koneksi/koneksi.php';

$nm_dampak = $_POST['nm_dampak'];
$sk_dampak = $_POST['sk_dampak'];

$sql = pg_query("INSERT INTO dampak (nm_dampak,sk_dampak) values 
                            ('$nm_dampak','$sk_dampak')");

if ($sql){
    header('Location:/pbd3/admin/dampak.php');
}else{
    echo 'There is something error your SQL ! Check it again !';
}
?>