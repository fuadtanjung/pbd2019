<?php include $_SERVER['DOCUMENT_ROOT'].'/pbd3/koneksi/koneksi.php'; ?>

<?php

if(isset($_POST['rowid'])){
    $id = $_POST['rowid'];
    $sql = pg_query("SELECT informasi_pelaporan.nama_pengguna,informasi_pelaporan.kontak_Pengguna,
                                      informasi_pelaporan.kontak_Pengguna,informasi_pelaporan.waktu_pelaporan,
                                      informasi_pelaporan.deskripsi,informasi_pelaporan.status,
                                      informasi_pelaporan.keterangan,
                                      petugas.in_petugas
                                      FROM informasi_pelaporan 
                                      join detail_petugas ON detail_petugas.id_pelaporan=informasi_pelaporan.id_pelaporan
                                      join petugas ON detail_petugas.id_petugas=petugas.id_petugas 
                                      where nama_pengguna = '$id'");
    while($data = pg_fetch_array($sql)) {
        ?>
        <h4 style="color: #00c292"> <u>Informasi Pelaporan</u></h4>
            <table class="table-sm">
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
            </table><br><br>
        <h4 class="text-capitalize" style="color: #c2872f"> <u>Informasi Penanganan</u></h4>
        <table class="table-sm">
            <tr>
                <td>Inisial Petugas</td>
                <td>:</td>
                <td><?php echo $data['in_petugas']; ?></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td><?php echo $data['keterangan']; ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td><?php echo $data['status']; ?></td>
            </tr>
        </table>
        <?php
    }
}
?>


