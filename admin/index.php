<?php include $_SERVER['DOCUMENT_ROOT'].'/pbd3/template/dashboard.php' ?>

<?php startblock('atas') ?>
<div class="page-header float-left">
                            <div class="page-title">
                                <h1>Tabel Pengajuan</h1>
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
            <table id="table" class="table table-striped table-bordered table-hover table-sm" style="width:100%">
                <thead class="table-info" style="text-align: center" >
                <tr>
                    <th>no</th>
                    <th>Nama Pengguna</th>
                    <th>Kontak Pengguna</th>
                    <th>Deskripsi</th>
                    <th>Waktu Pengguna</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=0;
                $sql = pg_query("SELECT * FROM informasi_pelaporan where status = 'diajukan'");
                while($data =  pg_fetch_array($sql)){
                    $no++;
                    $id = $data['id_pelaporan'];
                    $nama_pengguna = $data['nama_pengguna'];
                    $kontak_pengguna = $data['kontak_pengguna'];
                    $deskripsi = $data['deskripsi'];
                    $waktu_pelaporan = $data['waktu_pelaporan'];
                    ?>
                    <tr style="text-align: center">
                        <td><?php echo"$no"?></td>
                        <td><?php echo "$nama_pengguna"; ?></td>
                        <td><?php echo "$kontak_pengguna"; ?></td>
                        <td><?php echo "$deskripsi"; ?></td>
                        <td><?php echo date('d/m/Y',strtotime($waktu_pelaporan)); ?></td>
                        <td>
                            <a href="#myModal" data-toggle='modal'
                               data-id="<?php echo $data['id_pelaporan']; ?>">
                                <button class="btn btn-primary btn-sm" title="Detail"><i class="fa fa-eye"></i></button>
                            </a>
                            <a href="/pbd3/update/updatepenanganan.php?id=<?php echo $id;?>"
                                class="btn btn-success btn-sm" title='Update Penanganan'><i class="fa fa-location-arrow"></i></a>
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
                    <h3>Detail Pengajuan</h3>
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
                        url : '/pbd3/detail/pengajuan.php',
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
                {
                });
        });
        // Code that uses other library's $ can follow here.
    </script>
<?php endblock() ?>