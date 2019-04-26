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
            </ol>
        </div>
    </div>
</div>
<?php endblock() ?>

<?php startblock('content') ?>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3>Tambah petugas</h3>
        </div>

        <!--FORM-->
        <div class="card-body">
            <div class="card">
                <div class="card-body card-block">
                    <form  role="form" action="/pbd3/query/updatepetugas.php" method="post" class="" enctype="multipart/form-data">
                        <div class="form-group">
                            <?php
                                $sql = pg_query("SELECT * FROM informasi_pelaporan");
                                while ($data = pg_fetch_array($sql)) {
                                    $id = $data['id_pelaporan'];
                                    ?>
                                    <input type="text" class="form-control" id="id" name="id_pelaporan"
                                           value="<?php echo $data['id_pelaporan'] ?>" hidden>
                                    <?php
                                }
                                ?>
                            <label for="exampleFormControlInput1">Petugas</label>
                            <select name="id_petugas" class="form-control" >
                                <?php
                                $sql = pg_query("SELECT * FROM petugas");
                                while($data =  pg_fetch_array($sql)){
                                    $id = $data['id_petugas'];
                                    $in = $data['in_petugas'];
                                    ?>
                                    <option value="<?php echo "$id"; ?>"><?php echo "$in"; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="fab">
                            <button type="submit" class="btn btn-primary pull-left">Save <i class="fa fa-floppy-o"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endblock() ?>
