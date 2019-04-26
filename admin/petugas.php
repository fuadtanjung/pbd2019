<?php include $_SERVER['DOCUMENT_ROOT'].'/pbd3/template/dashboard.php' ?>

<?php startblock('atas') ?>
    <div class="page-header float-left">
        <div class="page-title">
            <h1>Petugas</h1>
        </div>
    </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Komponen</a></li>
                    <li><a href="#">Klasifikasi</a></li>
                    <li class="active">Petugas</li>
                </ol>
            </div>
        </div>
    </div>
<?php endblock() ?>

<?php startblock('content') ?>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <a href="/pbd3/tambah/tambah_petugas.php" class="btn btn-primary" role="button" aria-pressed="true"><i class="fa fa-star"></i>&nbsp;&nbsp;Tambah Petugas</a>
        </div>
        <div class="card-body">
            <table id="table" class="table table-striped table-bordered">
                <thead class="table-info">
                <tr>
                    <th>Inisial Petugas</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php

                $sql = pg_query("SELECT * FROM petugas");
                while($data =  pg_fetch_array($sql)){
                    $id = $data['id_petugas'];
                    $nama = $data['in_petugas'];
                    ?>
                    <tr>
                        <td><?php echo "$nama"; ?></td>
                        <td> <a href="/pbd3/query/hapuspetugas.php?id=<?php echo $id; ?>"
                                class="btn btn-danger">Hapus</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

