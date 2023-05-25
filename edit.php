<?php
include('koneksi.php');

$id = $_GET['id'];
$sql = mysqli_query($conn,"SELECT * FROM tb_mahasiswa WHERE `id`=$id;");
$result = mysqli_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body>

  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        Bootstrap
      </a>
    </div>
  </nav>


  <div class="contrainer">
    <form method="POST" action="update.php?id=<?=$id?>" enctype="multipart/form-data">
      <div class="mb-3 row">
        <label for="npm" class="col-sm-2 col-form-label">NPM</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="npm" name="npm" value="<?=$result['npm']?>">
        </div>
      </div>

      <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nama" name="nama" value="<?=$result['nama']?>">
        </div>
      </div>


      <div class="mb-3 row">
        <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
        <div class="col-sm-10">
          <select class="form-select " aria-label="Default select example" name="jk" id="jk">
            <option>Pilih Jenis Kelamin</option>
            <option value="Laki-laki" <?php if($result['jenis_kelamin'] === 'Laki-laki'){echo 'selected';}?>>Laki-laki</option>
            <option value="Perempuan" <?php if($result['jenis_kelamin'] === 'Perempuan'){echo 'selected';}?>>Perempuan</option>
          </select>
        </div>
      </div>

      <div class="mb-3 row">
        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
        <div class="col-sm-10">
          <input class="form-control" type="file" id="foto" name="foto">
        </div>
      </div>

      <div class="mb-3 row">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
          <textarea class="form-control" id="alamat" rows="3" name="alamat"><?=$result['alamat']?></textarea>
        </div>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Tambah Data</button>
      <a href="index.php" class="btn btn-danger"> Kembali</a>



    </form>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>