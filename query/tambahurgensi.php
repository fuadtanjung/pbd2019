<?php
include $_SERVER['DOCUMENT_ROOT'].'/pbd3/koneksi/koneksi.php';

$nm_urgensi = $_POST['nm_urgensi'];
$sk_urgensi = $_POST['sk_urgensi'];

$sql = pg_query("INSERT INTO urgensi (nm_urgensi,sk_urgensi) values 
                            ('$nm_urgensi','$sk_urgensi')");

if ($sql){
    header('Location:/pbd3/admin/urgensi.php');
}else{
    echo 'There is something error your SQL ! Check it again !';
}
?>