<?php
include $_SERVER['DOCUMENT_ROOT'].'/pbd3/koneksi/koneksi.php';

$id = $_GET['id'];
$sql = "DELETE FROM tipe where id_tipe='$id'";
$delete = pg_query($sql);
if ($delete){
    header('Location:/pbd3/admin/tipe.php');
}
else{
    echo 'There is something error with your SQL ! Check it again !';
}
?>