<?php include $_SERVER['DOCUMENT_ROOT'].'/pbd3/template/dashboard.php' ?>

<?php startblock('atas') ?>
    <div class="page-header float-left">
        <div class="page-title">
            <h1>Tabel Penanganan</h1>
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

            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table id="table" class="table table-striped table-bordered table-sm " style="width: 100%; font-size: 14px">
                    <thead class="table-info" style="text-align: center">
                    <tr>
                        <th colspan="2">Informasi Pelaporan</th>
                        <th colspan="3">Informasi Penangangan</th>
                        <th rowspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th>Nama <br> Pengguna</th>
                        <th>Deskripsi</th>
                        <th>Nama <br> Petugas</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $sql = pg_query("SELECT DISTINCT informasi_pelaporan.id_pelaporan,informasi_pelaporan.nama_pengguna,
                                            informasi_pelaporan.deskripsi,informasi_pelaporan.status,
                                            informasi_pelaporan.keterangan,
                                            petugas.in_petugas
                                            FROM informasi_pelaporan 
                                            join detail_petugas ON detail_petugas.id_pelaporan=informasi_pelaporan.id_pelaporan
                                            join petugas ON detail_petugas.id_petugas=petugas.id_petugas
                                            where status = 'ditangani'");
                    while($data =  pg_fetch_array($sql)){
                        $id = $data['id_pelaporan'];
                        $nama_pengguna = $data['nama_pengguna'];
                        $deskripsi = $data['deskripsi'];
                        $petugas = $data['in_petugas'];
                        $status = $data['status'];
                        $keterangan = $data['keterangan'];
                        ?>
                        <tr>
                            <td><?php echo "$nama_pengguna"; ?></td>
                            <td><?php echo "$deskripsi"; ?></td>
                            <td><?php echo "$petugas"; ?></td>
                            <td><?php echo "$status"; ?></td>
                            <td><?php echo "$keterangan"; ?></td>
                            <td style="text-align: center">
                                <a href="#myModal" data-toggle='modal'
                                   data-id="<?php echo $data['nama_pengguna']; ?>">
                                    <button class="btn btn-primary btn-sm" title="Detail"><i class="fa fa-eye"></i></button>
                                </a>
                                <a href="/pbd3/update/updatepenyelesaian.php?nama_pengguna=<?php echo $nama_pengguna;?>"
                                style="font-size: small" class="btn btn-success btn-sm  " title='Update Penyelesaian'><i class="fa fa-location-arrow"></i></a>
<!--                                <a href="/pbd3/update/updatepetugas.php?id=--><?php //echo $id;?><!--"-->
<!--                                style="font-size: small" class="btn btn-warning btn-sm" title='Tambah Petugas'><i  class="fa fa-male"></i></a>-->
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Detail Penanganan</h3>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endblock() ?>

<?php startblock('js') ?>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#myModal').on('show.bs.modal', function (e) {
                var rowid = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type : 'post',
                    url : '/pbd3/detail/penanganan.php',
                    data :  'rowid='+ rowid,
                    success : function(data){
                        $('.fetched-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
    </script>
    <script>

        $.noConflict();
        jQuery( document ).ready(function( $ ) {

            var table = $('#table').DataTable(
            );

        });
        // Code that uses other library's $ can follow here.
    </script>
<?php endblock() ?>