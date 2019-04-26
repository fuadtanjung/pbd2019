<?php include $_SERVER['DOCUMENT_ROOT'].'/pbd3/koneksi/koneksi.php'; ?>

<?php

if(isset($_POST['rowid'])){
    $id = $_POST['rowid'];
    $sql = pg_query("SELECT informasi_pelaporan.id_pelaporan,
                                            informasi_pelaporan.no_tiket,
                                            informasi_pelaporan.nama_pengguna,
                                            informasi_pelaporan.kontak_pengguna,
                                            informasi_pelaporan.media_pelaporan,
                                            informasi_pelaporan.deskripsi,
                                            informasi_pelaporan.waktu_pelaporan,
                                            informasi_pelaporan.status,
                                            informasi_pelaporan.keterangan,
                                            informasi_pelaporan.tanggal_pemuktahiran,
                                            informasi_pelaporan.tipe,
                                            informasi_pelaporan.kategori,
                                            informasi_pelaporan.users,
                                            informasi_pelaporan.urgensi,
                                            informasi_pelaporan.dampak,
                                            informasi_pelaporan.prioritas,
                                            informasi_pelaporan.solusi,
                                            informasi_pelaporan.status_pengguna,
                                            informasi_pelaporan.tanggal_penyelesaian,
                                            jenis.sk_jenis,
                                            petugas.in_petugas
                                            FROM informasi_pelaporan 
                                            join detail_jenis ON detail_jenis.id_pelaporan=informasi_pelaporan.id_pelaporan
                                            join detail_petugas on detail_petugas.id_pelaporan=informasi_pelaporan.id_pelaporan
                                            join jenis ON detail_jenis.id_jenis=jenis.id_jenis
                                            join petugas on detail_petugas.id_petugas=petugas.id_petugas
                                      where nama_pengguna = '$id'");
    while($data = pg_fetch_array($sql)) {
        ?>
                <h4 style="color: #00c292"> <u>Informasi Pelaporan</u></h4>
                <table class="table table-sm">
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
                    <tr>
                        <td>Tanggal Pelaporan</td>
                        <td>:</td>
                        <?php
                        $waktu_pelaporan = $data['waktu_pelaporan'];
                        ?>
                        <td><?php echo date('d/m/Y',strtotime($waktu_pelaporan)); ?></td>
                    </tr>
                </table><br>



        <div class="form-row">
            <div class="form-group col-md-6">
        <h4 class="text-capitalize" style="color: #c2872f"> <u>Klasifikasi</u></h4>
                <table class="table-sm">
                    <tr>
                        <td>Tipe</td>
                        <td>:</td>
                        <td><?php echo $data['tipe']; ?></td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>:</td>
                        <td><?php echo $data['kategori']; ?></td>
                    </tr>
                    <tr>
                        <td>User</td>
                        <td>:</td>
                        <td><?php echo $data['users']; ?></td>
                    </tr>
                    <tr>
                        <td>jenis</td>
                        <td>:</td>
                        <td><?php echo $data['sk_jenis']; ?></td>
                    </tr>
                    <tr>
                        <td>urgensi</td>
                        <td>:</td>
                        <td><?php echo $data['urgensi']; ?></td>
                    </tr>
                    <tr>
                        <td>dampak</td>
                        <td>:</td>
                        <td><?php echo $data['dampak']; ?></td>
                    </tr>
                    <tr>
                        <td>prioritas</td>
                        <td>:</td>
                        <td><?php echo $data['prioritas']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="form-group col-md-6">
                <h4 class="text-capitalize" style="color: #c2872f"> <u>Informasi Penanganan</u></h4>
                <table class="table table-sm">
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

                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <?php
                        $tanggal_pemuktahiran = $data['tanggal_pemuktahiran'];
                        ?>
                        <td><?php echo date('d/m/Y',strtotime($tanggal_pemuktahiran)); ?></td>
                    </tr>
                </table>
            </div>
        </div>


        <h4 style="color: #00c292"> <u>Informasi Penyelesaian</u></h4>
        <table class="table table-sm">
            <tr>
                <td>Solusi</td>
                <td>:</td>
                <td><?php echo $data['solusi']; ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <?php
                $tanggal_penyelesaian= $data['tanggal_penyelesaian'];
                ?>
                <td><?php echo date('d/m/Y',strtotime($tanggal_penyelesaian)); ?></td>
            </tr>
            <tr>
                <td>Status Konfirmasi Kepada Pengguna</td>
                <td>:</td>
                <td><?php echo $data['status_pengguna']; ?></td>
            </tr>
        </table><br><br>
        <?php
    }
}
?>


