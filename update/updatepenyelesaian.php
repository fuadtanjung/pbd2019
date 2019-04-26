<?php include $_SERVER['DOCUMENT_ROOT'].'/pbd3/template/dashboard.php' ?>

<?php startblock('atas') ?>
<div class="page-header float-left">
    <div class="page-title">
        <h1>Update Penanganan</h1>
    </div>
</div>
</div>
<div class="col-sm-8">
    <div class="page-header float-right">
        <div class="page-title">
            <ol class="breadcrumb text-right">
            </ol>
        </div>
    </div>
</div>
<?php endblock() ?>

<?php startblock('content') ?>
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <?php

            $nama_Pengguna = $_GET['nama_pengguna'];
            $sql = pg_query(" SELECT informasi_pelaporan.id_pelaporan, informasi_pelaporan.nama_pengguna, 
                                        informasi_pelaporan.kontak_pengguna, informasi_pelaporan.waktu_pelaporan,
                                        informasi_pelaporan.keterangan,informasi_pelaporan.deskripsi,
                                        petugas.in_petugas 
                                        FROM informasi_pelaporan 
                                        join detail_petugas on detail_petugas.id_pelaporan=informasi_pelaporan.id_pelaporan
                                        join petugas on detail_petugas.id_petugas=petugas.id_petugas
                                        where nama_pengguna='$nama_Pengguna'");
            $data = pg_fetch_array($sql);

            ?>
            <form role="form" action="/pbd3/query/updatepenyelesaian.php" method="POST" enctype="multipart/form-data">

                <h5 class="text-white bg-info text-center">Informasi Pelaporan</h5><br>
                <input type="text" class="form-control" hidden id="id" name="id_pelaporan" value="<?php echo $data['id_pelaporan']?>">

                <div class="form-row">
                <div class="form-group col-md-4">
                    <strong>No Tiket:</strong>
                    <input type="text" name="no_tiket" class="form-control" value="2019-00<?php echo $data['id_pelaporan'] ?>" readonly>
                </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>Nama Pengguna:</strong>
                        <?php   ?>
                        <input type="text" name="nama_pengguna" class="form-control" value="<?php echo $data["nama_pengguna"] ?>" readonly >
                    </div>
                    <div class="col-md-6">
                        <strong>Kontak Pengguna:</strong>
                        <input type="number" name="kontak_pengguna" class="form-control" value="<?php echo $data['kontak_pengguna'] ?>" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>Media Pelaporan</strong>
                        <input type="text" name="media_pelaporan" class="form-control" value="Aplikasi Pengaduan" readonly >
                    </div>
                    <div class="form-group col-md-6">
                        <strong>Waktu Pelaporan:</strong>
                        <?php
                        $waktu_pelaporan = $data['waktu_pelaporan'];
                        ?>
                        <input type="text" name="waktu_pelaporan" class="form-control" value="<?php echo date('d/m/Y',strtotime($waktu_pelaporan)); ?>" readonly>

                    </div>
                </div><br>

                <div class="form-group row">
                    <div class="col-md-12">
                        <strong>Deskripsi:</strong>
                        <textarea class="form-control" readonly name="deskripsi" rows="3" placeholder="catatan" ><?php echo $data['deskripsi'] ?></textarea>
                    </div>
                </div>

                <br><br>

                <h5 class="text-white bg-info text-center">Informasi Penanganan</h5><br>

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <strong>Keterangan:</strong>
                        <textarea class="form-control" name="keterangan" placeholder="<?php echo $data['keterangan']?>" rows="3" readonly></textarea>
                    </div>

                    <div class="form-group col-md-6">
                        <strong>Status:</strong>
                        <input type="text" name="status" class="form-control" value="difasilitasi" READONLY>
                    </div>
                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <strong>Petugas:</strong>
                        <input type="text" name="petugas" class="form-control" value="<?php echo $data['in_petugas']?>" readonly>
                    </div>


                </div>
                <br>
                <br>

                <h5 class="text-white bg-info text-center">Klasifikasi</h5><br>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>Tipe</strong> <br>
                        ket :
                        <?php
                        $sql = pg_query("SELECT * FROM tipe");
                        while($data =  pg_fetch_array($sql)){
                            $id_tipe = $data['id_tipe'];
                            $nm_tipe = $data['nm_tipe'];
                            $sk_tipe = $data['sk_tipe'];
                            ?>
                          <td values = "<?php echo "$id_tipe" ?>"><?php echo "$nm_tipe" ?> (<?php echo "$sk_tipe" ?>).</td>
                            <?php
                        }
                        ?>
                        <select name="tipe" class="form-control" >
                            <?php
                            $sql = pg_query("SELECT * FROM tipe");
                            while($data =  pg_fetch_array($sql)){
                                $id_tipe = $data['id_tipe'];
                                $nm_tipe = $data['nm_tipe'];
                                $sk_tipe = $data['sk_tipe'];
                                ?>
                                <option value="<?php echo "$sk_tipe"; ?>"><?php echo "$sk_tipe"; ?></option>
                                <?php
                            }
                            ?>
                        </select>

                    </div>

                    <div class="form-group col-md-6">
                        <strong>Kategori</strong> <br>
                        ket :
                        <?php
                        $sql = pg_query("SELECT * FROM kategori");
                        while($data =  pg_fetch_array($sql)){
                            $id_kategori = $data['id_kategori'];
                            $nm_kategori = $data['nm_kategori'];
                            $sk_kategori = $data['sk_kategori'];
                            ?>
                            <td values = "<?php echo "$id_kategori" ?>"><?php echo "$nm_kategori" ?> (<?php echo "$sk_kategori" ?>).</td>
                            <?php
                        }
                        ?>
                        <select name="kategori" class="form-control" >
                            <?php
                            $sql = pg_query("SELECT * FROM kategori");
                            while($data =  pg_fetch_array($sql)){
                                $id_kategori = $data['id_kategori'];
                                $sk_kategori = $data['sk_kategori'];
                                ?>
                                <option value="<?php echo "$sk_kategori"; ?>"><?php echo "$sk_kategori"; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <br>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>User</strong> <br>
                        ket :
                        <?php
                        $sql = pg_query("SELECT * FROM users");
                        while($data =  pg_fetch_array($sql)){
                            $id_user = $data['id_user'];
                            $nm_user = $data['nm_user'];
                            $sk_user = $data['sk_user'];
                            ?>
                            <td values = "<?php echo "$id_user" ?>"><?php echo "$nm_user" ?> (<?php echo "$sk_user" ?>).</td>
                            <?php
                        }
                        ?>
                        <select name="users" class="form-control" >
                            <?php
                            $sql = pg_query("SELECT * FROM users");
                            while($data =  pg_fetch_array($sql)){
                                $id_user = $data['id_user'];
                                $nm_user = $data['nm_user'];
                                $sk_user = $data['sk_user'];
                                ?>
                                <option value="<?php echo "$sk_user"; ?>"><?php echo "$sk_user"; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <strong>Urgensi</strong> <br>
                        ket :
                        <?php
                        $sql = pg_query("SELECT * FROM urgensi");
                        while($data =  pg_fetch_array($sql)){
                            $id_urgensi = $data['id_urgensi'];
                            $nm_urgensi = $data['nm_urgensi'];
                            $sk_urgensi = $data['sk_urgensi'];
                            ?>
                            <td values = "<?php echo "$id_urgensi" ?>"><?php echo "$nm_urgensi" ?> (<?php echo "$sk_urgensi" ?>).</td>
                            <?php
                        }
                        ?>
                        <select name="urgensi" class="form-control" >
                            <?php
                            $sql = pg_query("SELECT * FROM urgensi");
                            while($data =  pg_fetch_array($sql)){
                                $id_urgensi = $data['id_urgensi'];
                                $nm_urgensi = $data['nm_urgensi'];
                                $sk_urgensi = $data['sk_urgensi'];
                                ?>
                                <option value="<?php echo "$sk_urgensi"; ?>"><?php echo "$sk_urgensi"; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <br>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>Dampak</strong> <br>
                        ket :
                        <?php
                        $sql = pg_query("SELECT * FROM dampak");
                        while($data =  pg_fetch_array($sql)){
                            $id_dampak = $data['id_dampak'];
                            $nm_dampak = $data['nm_dampak'];
                            $sk_dampak = $data['sk_dampak'];
                            ?>
                            <td values = "<?php echo "$id_dampak" ?>"><?php echo "$nm_dampak" ?> (<?php echo "$sk_dampak" ?>).</td>
                            <?php
                        }
                        ?>
                        <select name="dampak" class="form-control" >
                            <?php
                            $sql = pg_query("SELECT * FROM dampak");
                            while($data =  pg_fetch_array($sql)){
                                $id_dampak = $data['id_dampak'];
                                $nm_dampak = $data['nm_dampak'];
                                $sk_dampak = $data['sk_dampak'];
                                ?>
                                <option value="<?php echo "$sk_dampak"; ?>"><?php echo "$sk_dampak"; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <strong>Prioritas</strong> <br>
                        ket :
                        <?php
                        $sql = pg_query("SELECT * FROM prioritas");
                        while($data =  pg_fetch_array($sql)){
                            $id_prioritas = $data['id_prioritas'];
                            $nm_prioritas = $data['nm_prioritas'];
                            $sk_prioritas = $data['sk_prioritas'];
                            ?>
                            <td values = "<?php echo "$id_prioritas" ?>"><?php echo "$nm_prioritas" ?> (<?php echo "$sk_prioritas" ?>).</td>
                            <?php
                        }
                        ?>
                        <select name="prioritas" class="form-control" >
                            <?php
                            $sql = pg_query("SELECT * FROM prioritas");
                            while($data =  pg_fetch_array($sql)){
                                $id_prioritas = $data['id_prioritas'];
                                $nm_prioritas = $data['nm_prioritas'];
                                $sk_prioritas = $data['sk_prioritas'];
                                ?>
                                <option value="<?php echo "$sk_prioritas"; ?>"><?php echo "$sk_prioritas"; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <h5 class="text-white bg-info text-center">Informasi Penyelesaian</h5><br>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>Solusi:</strong>
                        <textarea class="form-control" name="solusi"  rows="3" required autofocus></textarea>
                    </div>

                    <div class="form-group col-md-6">
                        <strong>Status Konfirmasi Pada Pengguna:</strong>
                        <textarea class="form-control" name="status_pengguna"  rows="3" required autofocus></textarea>
                    </div>
                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <strong>Tanggal Penyelesaian dan Pemuktahiran:</strong>
                        <input type="date" name="tanggal_penyelesaian" class="form-control" required autofocus>
                    </div>

                    <div class="form-group col-md-6">
                        <strong>Tanggal Penyelesaian dan Pemuktahiran:</strong>
                        <input type="date" name="tanggal_pemuktahiran" class="form-control" required autofocus>

                    </div>
                </div>
                <br><br><br>

                <div class="form-group row">
                    <div class="col-md-9">
                        <a href="/pbd3/admin/penanganan.php" class="btn btn-secondary">Kembali</a>
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-primary btn-large text-white"><i class="fa fa-check"></i> &nbsp;Update</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>

<?php endblock() ?>
