<?php include $_SERVER['DOCUMENT_ROOT'].'/pbd3/template/dashboard.php' ?>

<?php startblock('atas') ?>
<div class="page-header float-left">
    <div class="page-title">
        <h1>Jenis</h1>
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
                    <form  role="form" action="/pbd3/query/updatejenis.php" method="post" class="" enctype="multipart/form-data">
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
                            <div class="form-group">
                                <strong>Jenis</strong> <br>
                                ket :
                                <?php
                                $sql = pg_query("SELECT * FROM jenis");
                                while($data =  pg_fetch_array($sql)){
                                    $id_jenis = $data['id_jenis'];
                                    $nm_jenis = $data['nm_jenis'];
                                    $sk_jenis = $data['sk_jenis'];
                                    ?>
                                    <td values = "<?php echo "$id_jenis" ?>"><?php echo "$nm_jenis" ?> (<?php echo "$sk_jenis" ?>).</td>
                                    <?php
                                }
                                ?>
                                <select name="id_jenis" class="form-control" >
                                    <?php
                                    $sql = pg_query("SELECT * FROM jenis");
                                    while($data =  pg_fetch_array($sql)){
                                        $id_jenis = $data['id_jenis'];
                                        $nm_jenis = $data['nm_jenis'];
                                        $sk_jenis = $data['sk_jenis'];
                                        ?>
                                        <option value="<?php echo "$id_jenis"; ?>"><?php echo "$sk_jenis"; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
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
