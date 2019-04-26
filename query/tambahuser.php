<?php
include $_SERVER['DOCUMENT_ROOT'].'/pbd3/koneksi/koneksi.php';

$nm_user = $_POST['nm_user'];
$sk_user = $_POST['sk_user'];

$sql = pg_query("INSERT INTO users (nm_user,sk_user) values 
                            ('$nm_user','$sk_user')");

if ($sql){
    header('Location:/pbd3/admin/user.php');
}else{
    echo 'There is something error your SQL ! Check it again !';
}
?>