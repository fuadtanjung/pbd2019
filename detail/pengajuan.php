<?php include $_SERVER['DOCUMENT_ROOT'].'/pbd3/koneksi/koneksi.php'; ?>

<?php

if(isset($_POST['rowid'])){
    $id = $_POST['rowid'];
    $sql = pg_query("SELECT * FROM informasi_pelaporan where id_pelaporan= '$id'");
while($data = pg_fetch_array($sql)) {
    ?>
    <table class="table">
        <tr>
            <td>Nama Pengguna</td>
            <td>:</td>
            <td><?php echo $data['nama_pengguna']; ?></td>
        </tr>
        <tr>
            <td>Kontak Pengguna</td>
            <td>:</td>
            <td><?php echo $data['kontak_pengguna']; ?></td>
        </tr>
        <tr>
            <td>Waktu Pengaduan</td>
            <td>:</td>
            <td><?php echo $data['waktu_pelaporan']; ?></td>
        </tr>
        <tr>
            <td>Deskripsi Pengaduan</td>
            <td>:</td>
            <td><?php echo $data['deskripsi']; ?></td>
        </tr>
    </table>

    <?php
}
}
?>


