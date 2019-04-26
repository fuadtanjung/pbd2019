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

                $id = $_GET['id'];
                $sql = pg_query("SELECT id_pelaporan, nama_pengguna, kontak_pengguna, waktu_pelaporan, deskripsi FROM informasi_pelaporan where id_pelaporan='$id'");
                $data = pg_fetch_array($sql);

            ?>
            <form role="form" action="/pbd3/query/updatepenanganan.php" method="POST" enctype="multipart/form-data">

                <h5 class="text-white bg-info text-center">Informasi Pelaporan</h5><br>
                <input type="text" class="form-control" hidden id="id" name="id_pelaporan" value="<?php echo $data['id_pelaporan']?>">
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
                <div class="form-group col-md-4">
                    <strong>No Tiket:</strong>
                    <input type="text" name="no_tiket" class="form-control" value="2019-00<?php echo $data['id_pelaporan'] ?>" readonly>
                </div>

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
                        <textarea class="form-control" name="keterangan" rows="3" required autofocus></textarea>
                    </div>

                    <div class="form-group col-md-6">
                        <strong>Status:</strong>
                        <input type="text" name="status" class="form-control" value="ditangani" READONLY>
                    </div>
                </div>

                <br>
                <br>


                <div class="form-group row">
                    <div class="col-md-9">
                        <a href="/pbd3/admin/" class="btn btn-secondary">Kembali</a>
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
