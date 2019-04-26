<?php include $_SERVER['DOCUMENT_ROOT'].'/pbd3/template/dashboard.php' ?>

<?php startblock('atas') ?>
    <div class="page-header float-left">
        <div class="page-title">
            <h1>Tabel Penyelesaian</h1>
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
                <table id="table" class="table table-striped table-bordered table-sm" width="100%">
                    <thead class="table-info" style="text-align: center">
                    <tr style="text-align: center;font-size: 13px">
                        <th colspan="2" >Informasi Pengaduan</th>
                        <th colspan="3" >Informasi Penangangan</th>
                        <th colspan="2" >Klasifikasi</th>
                        <th colspan="3" >Informasi Penyelesaian</th>
                    </tr>
                    <tr style="text-align: center;font-size: 13px">
                        <th>Nama <br> Pengguna</th>
                        <th>Deskripsi</th>
                        <th>Nama <br> Petugas</th>
                        <th>Status</th>
                        <th>Tanggal <br> Pemuktahiran</th>
                        <th>Jenis</th>
                        <th>Urgensi</th>
                        <th>Solusi</th>
                        <th>Konfirmasi <br> Kepada <br> Pengguna</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $sql = pg_query("SELECT distinct informasi_pelaporan.id_pelaporan,informasi_pelaporan.nama_pengguna,
                                            informasi_pelaporan.deskripsi,informasi_pelaporan.status,
                                            informasi_pelaporan.keterangan,informasi_pelaporan.tanggal_pemuktahiran,
                                            informasi_pelaporan.urgensi,
                                            informasi_pelaporan.solusi,informasi_pelaporan.status_pengguna,
                                            jenis.sk_jenis,
                                            petugas.in_petugas
                                            FROM informasi_pelaporan 
                                            join detail_jenis ON detail_jenis.id_pelaporan=informasi_pelaporan.id_pelaporan
                                            join detail_petugas on detail_petugas.id_pelaporan=informasi_pelaporan.id_pelaporan
                                            join jenis ON detail_jenis.id_jenis=jenis.id_jenis
                                            join petugas on detail_petugas.id_petugas=petugas.id_petugas
                                            where status = 'difasilitasi'");

                    while($data =  pg_fetch_array($sql)){
                        $id = $data['id_pelaporan'];
                        $nama_pengguna = $data['nama_pengguna'];
                        $deskripsi = $data['deskripsi'];
                        $status = $data['status'];
                        $tanggal_pemuktahiran = $data['tanggal_pemuktahiran'];
                        $urgensi = $data['urgensi'];
                        $solusi = $data['solusi'];
                        $status_pengguna = $data['status_pengguna'];
                        $jenis = $data['sk_jenis'];
                        $petugas = $data['in_petugas'];

                        ?>
                        <tr style="font-size: 12px">
                            <td><?php echo "$nama_pengguna"; ?></td>
                            <td><?php echo "$deskripsi"; ?></td>
                            <td><?php echo "$petugas"; ?></td>
                            <td><?php echo "$status"; ?></td>
                            <td><?php echo date('d/m/Y',strtotime($tanggal_pemuktahiran)); ?></td>
                            <td><?php echo "$jenis"; ?></td>
                            <td><?php echo "$urgensi"; ?></td>
                            <td><?php echo "$solusi"; ?></td>
                            <td><?php echo "$status_pengguna"; ?></td>
                            <td style="align-self: center">   <a href="#myModal" data-toggle='modal'
                                      data-id="<?php echo $data['nama_pengguna']; ?>">
                                    <button class="btn btn-primary btn-sm" title="Detail"><i class="fa fa-eye"></i></button>
                                </a>
                                <a target="_blank" href="/pbd3/admin/rekap2.php?nama_pengguna=<?php echo $nama_pengguna;?>"
                                   class="btn btn-warning btn-sm" title='Update Penanganan'><i class="fa fa-print"></i></a>
<!--                                <a href="/pbd3/update/updatepetugas.php?id=--><?php //echo $id;?><!--"-->
<!--                                class="btn btn-success btn-xs" title='Tambah Petugas'><i class="fa fa-male"></i></a>-->
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
                    <h3>Detail Penyelesaian</h3>
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
                    url : '/pbd3/detail/penyelesaian.php',
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

            $('#table').DataTable(
                {
                } );

        });
        // Code that uses other library's $ can follow here.
    </script>

<?php endblock() ?>