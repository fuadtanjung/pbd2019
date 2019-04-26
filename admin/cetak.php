<?php include $_SERVER['DOCUMENT_ROOT'].'/pbd3/template/dashboard.php' ?>



<?php startblock('content') ?>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3>Cetak</h3>
        </div>

        <!--FORM-->
        <div class="card-body">
            <div class="card">
                <div class="card-body card-block">
                    <form  role="form" action="/pbd3/admin/rekap.php" method="get" target="_blank" enctype="multipart/form-data">
                        <small style="font-size: inherit">Ex. 2019-01-01</small>
                        <div class="form-group">
                            <label for="exampleFormControlInput1"></label>
                            <input type="text" class="form-control" name="cari">
                        </div>
                        <div class="form-group row">
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-primary pull-left">print <i class="fa fa-print"></i></button>
                            </div>
                            &nbsp;&nbsp;&nbsp;&nbsp;
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
