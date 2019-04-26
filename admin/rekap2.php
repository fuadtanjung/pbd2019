<?php include $_SERVER['DOCUMENT_ROOT'].'/pbd3/koneksi/koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .letak{

            margin-top: 20px;
            margin-left: 1%;
            margin-right: 1%;

        }

    </style>

</head>
<body>
<br><br>

<table style="margin-left: 100px; font-size: 10px" width="85%">
    <th>
        <img src="/pbd3/images/lpse.png" width="90" height="40"> &nbsp;
        <a style="text-align: center;margin-left: 200px">Formulir Pencatatan Gangguan/Permasalahan dan Permintaan Layanan</a></th>
    <th style="font-size: 7px"> Priode :...............................<br>
        Lpse: Kota Padang</th>
</table>

<style type="text/css" media="print">
    @page {
        size: landscape;
    }
</style>

<div class="letak">
    <div >
        <table  class="table-sm" >

            <thead class="table-info" style="font-size: 9px;text-align: center">
            <tr>
                <th rowspan="4">No tiket</th>
                <th colspan="4">informasi pelaporan</th>
                <th rowspan="4">deskripsi</th>
                <th colspan="7">klasifikasi</th>
                <th colspan="4">informasi penanganan</th>
                <th colspan="4">informasi penyelesaian</th>
            </tr>
            <tr >
                <th rowspan="3">nama <br> pengguna</th>
                <th rowspan="3">kontak <br> pengguna</th>
                <th rowspan="3">media <br> pelaporan <br> (email,telp<br>,surat,dll</th>
                <th rowspan="3">waktu <br> pelaporan</th>
                <th rowspan="1">tipe</th>
                <th rowspan="1">kategori</th>
                <th rowspan="1">user</th>
                <th rowspan="1">jenis</th>
                <th rowspan="1">urgensi</th>
                <th rowspan="1">dampak</th>
                <th rowspan="1">Prioritas</th>
                <th rowspan="3">nama petugas</th>
                <th rowspan="3">status</th>
                <th rowspan="3">keterangan</th>
                <th rowspan="3">tanggal <br> pemuktahiran</th>
                <th rowspan="3">solusi</th>
                <th rowspan="3">tanggal <br>penyelesaian</th>
                <th rowspan="3">status <br>konfirmasi <br>kepada <br>pengguna</th>
            </tr>

            <tr >
                <th>Gangguan,<br>Masalah,<br>Permintaan Layanan</th>
                <th>Teknis,<br>Non teknis</th>
                <th>Panitia,<br>Penyedia,PPK,<br> Auditor,Publik <br> Lainnya</th>
                <th>Hardware,<br>Software,<br>Prosedur,Lain- <br> lainnya</th>
                <th>Mendesak,<br>Tidak Mendesak</th>
                <th>Besar,<br>Sedang,<br>Kecil</th>
                <th>Tinggi,<br>Menengah,<br>Rendah</th>
            </tr>
            <tr>
                <th>G,M,P</th>
                <th>T,N</th>
                <th>P,Py,PPK,A,L</th>
                <th>H,S,U,P,L</th>
                <th>M,T</th>
                <th>B,S,K</th>
                <th>T,M,R</th>
            </tr>
            </thead>

            <tbody>
            <?php
                $id= $_GET['nama_pengguna'];
                $sql = pg_query("select distinct informasi_pelaporan.id_pelaporan,
                                            informasi_pelaporan.no_tiket,
                                            informasi_pelaporan.nama_pengguna,
                                            informasi_pelaporan.kontak_pengguna,
                                            informasi_pelaporan.media_pelaporan,
                                            informasi_pelaporan.deskripsi,
                                            informasi_pelaporan.waktu_pelaporan,
                                            informasi_pelaporan.status,
                                            informasi_pelaporan.keterangan,
                                            informasi_pelaporan.tanggal_pemuktahiran,
                                            informasi_pelaporan.tipe,
                                            informasi_pelaporan.kategori,
                                            informasi_pelaporan.users,
                                            informasi_pelaporan.urgensi,
                                            informasi_pelaporan.dampak,
                                            informasi_pelaporan.prioritas,
                                            informasi_pelaporan.solusi,
                                            informasi_pelaporan.status_pengguna,
                                            informasi_pelaporan.tanggal_penyelesaian,
                                            jenis.sk_jenis,
                                            petugas.in_petugas
                                            FROM informasi_pelaporan 
                                            join detail_jenis ON detail_jenis.id_pelaporan=informasi_pelaporan.id_pelaporan
                                            join detail_petugas on detail_petugas.id_pelaporan=informasi_pelaporan.id_pelaporan
                                            join jenis ON detail_jenis.id_jenis=jenis.id_jenis
                                            join petugas on detail_petugas.id_petugas=petugas.id_petugas where nama_pengguna ='$id' and status = 'difasilitasi'");
            $data =  pg_fetch_array($sql);

            $id = $data['id_pelaporan'];
            $no_tiket = $data['no_tiket'];
            $nama_pengguna = $data['nama_pengguna'];
            $kontak_pengguna = $data['kontak_pengguna'];
            $media_pelaporan = $data['media_pelaporan'];
            $waktu_pelaporan = $data['waktu_pelaporan'];
            $deskripsi = $data['deskripsi'];

            $tipe = $data['tipe'];
            $kategori = $data['kategori'];
            $users = $data['users'];
            $jenis = $data['sk_jenis'];
            $urgensi = $data['urgensi'];
            $dampak = $data['dampak'];
            $prioritas = $data['prioritas'];

            $petugas = $data['in_petugas'];
            $status = $data['status'];
            $keterangan = $data['keterangan'];
            $tanggal_pemuktahiran = $data['tanggal_pemuktahiran'];

            $solusi = $data['solusi'];
            $tanggal_penyelesaian = $data['tanggal_penyelesaian'];
            $status_pengguna = $data['status_pengguna'];

            ?>
            <tr style="text-align: center;font-size: 9px">
                <td><?php echo "$no_tiket"; ?></td>
                <td><?php echo "$nama_pengguna"; ?></td>
                <td><?php echo "$kontak_pengguna"; ?></td>
                <td><?php echo "$media_pelaporan"; ?></td>
                <td><?php echo date('d/m/Y',strtotime($waktu_pelaporan)); ?></td>
                <td><?php echo "$deskripsi"; ?></td>

                <td><?php echo "$tipe"; ?></td>
                <td><?php echo "$kategori"; ?></td>
                <td><?php echo "$users"; ?></td>
                <td><?php echo "$jenis"; ?></td>
                <td><?php echo "$urgensi"; ?></td>
                <td><?php echo "$dampak"; ?></td>
                <td><?php echo "$prioritas"; ?></td>

                <td><?php echo "$petugas"; ?></td>
                <td><?php echo "$status"; ?></td>
                <td><?php echo "$keterangan"; ?></td>
                <td><?php echo date('d/m/Y',strtotime($tanggal_pemuktahiran)); ?></td>

                <td><?php echo "$solusi"; ?></td>
                <td><?php echo date('d/m/Y',strtotime($tanggal_penyelesaian)); ?></td>
                <td><?php echo "$status_pengguna"; ?></td>
            </tr>
            </tbody>
        </table>

    </div>
</div>


<script>
    window.onload = function() { window.print(); }
</script>

</body>
</html>