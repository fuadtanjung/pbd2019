<?php include $_SERVER['DOCUMENT_ROOT'].'/pbd3/template/dashboard.php' ?>

<?php startblock('atas') ?>
<div class="page-header float-left">
    <div class="page-title">
    </div>
</div>
</div>
<div class="col-sm-8">
    <div class="page-header float-right">
        <div class="page-title">
            <ol class="breadcrumb text-right">
                <li><a href="#">Komponen</a></li>
                <li><a href="#">Klasifikasi</a></li>
                <li class="active">Tambah Dampak</li>
            </ol>
        </div>
    </div>
</div>
<?php endblock() ?>

<?php startblock('content') ?>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Dampak</h3>
        </div>

        <!--FORM-->
        <div class="card-body">
            <div class="card">
                <div class="card-body card-block">
                    <form  role="form" action="/pbd3/query/tambahdampak.php" method="post" class="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Dampak</label>
                            <input type="text" class="form-control" name="nm_dampak">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Singkatan Dampak</label>
                            <input type="text" class="form-control" name="sk_dampak">
                        </div>

                        <div class="form-group row">
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-primary pull-left">Save <i class="fa fa-floppy-o"></i></button>
                            </div>

                            <div class="col-md-1">
                                <a href="/pbd3/admin/dampak.php" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<?php endblock() ?>
