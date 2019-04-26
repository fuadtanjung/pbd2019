<!DOCTYPE html>
<html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/pbd3/images/logo3.png">


    <title>Buku Pengaduan</title>

    <!-- Bootstrap core CSS -->
    <link href="/pbd3/images/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/pbd3/images/sign-in/signin.css" rel="stylesheet">


</head>
<body>
<form  role="form" action="/pbd3/query/bukulaporan.php" method="post" class="" enctype="multipart/form-data">
    <img class="mb-4" src="/pbd3/images/logo.png" alt="" width="325" height="130">

    <h1 class="h3 mb-3 font-weight-normal text-center">Buku Pengaduan</h1>

    <div class="form-group">
        <input type="text" name="nama_pengguna" class="form-control" placeholder="Nama Pengguna/Institusi" required autofocus>
        <input type="number" name="kontak_pengguna"  class="form-control" placeholder="No. Telepon" required autofocus>
        <input type="hidden" name="waktu_pelaporan"  class="form-control" required autofocus>
        <input type="text" name="status" class="form-control" value="diajukan" READONLY hidden>
    </div>

    <div class="form-group"><br>
        <textarea class="form-control" name="deskripsi" id="pengaduan" rows="3" placeholder="pengaduan" required autofocus></textarea>
    </div>

    <button class="btn btn-lg btn-primary btn-block" id="submit" type="submit">Isi Buku Pengaduan</button>
    <div>
        <a class="txt2" href="/pbd3/">
            <br>
            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
    </div>
</form>
<p class="mt-5 mb-3 text-muted">&copy; PBD Fuad dan Asraf</p>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>