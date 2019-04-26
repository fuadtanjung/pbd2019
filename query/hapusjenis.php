<?php
include $_SERVER['DOCUMENT_ROOT'].'/pbd3/koneksi/koneksi.php';

$id = $_GET['id'];
$sql = "DELETE FROM jenis where id_jenis='$id'";
$delete = pg_query($sql);
if ($delete){
    header('Location:/pbd3/admin/jenis.php');
}
else{
    echo 'There is something error with your SQL ! Check it again !';
}
?>