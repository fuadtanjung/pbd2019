<?php include $_SERVER['DOCUMENT_ROOT'].'/pbd3/template/dashboard.php' ?>

<?php startblock('atas') ?>
<div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dampak</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Table</a></li>
                                    <li class="active">Data table</li>
                                </ol>
                            </div>
                        </div>
                    </div>
<?php endblock() ?>

<?php startblock('content') ?>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <a href="/pbd3/tambah/tambah_dampak.php" class="btn btn-primary" role="button" aria-pressed="true"><i class="fa fa-star"></i>&nbsp;&nbsp;Tambah Dampak</a>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead class="table-info">
                <tr>
                    <th>Nama</th>
                        <th>Singkatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                $sql = pg_query("SELECT * FROM dampak");
                while($data =  pg_fetch_array($sql)){
                    $id = $data['id_dampak'];
                    $nama = $data['nm_dampak'];
                    $sk = $data['sk_dampak'];
                    ?>
                    <tr>
                        <td><?php echo "$nama"; ?></td>
                        <td><?php echo "$sk"; ?></td>
                        <td> <a href="/pbd3/query/hapusdampak.php?id=<?php echo $id; ?>"
                                    class="btn btn-danger">Hapus</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php endblock() ?>


