<?php
include  'koneksi.php';

$query = "SELECT * FROM tb_mahasiswa";
$sql = mysqli_query($conn, $query);
$no = 1;



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>pertemuan 12</title>
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

  <div class="container">
    <figure>

      <h1> Data Mahasiswa
        <blockquote class="blockquote">
          <p>Data Mahasiswa yang ada didalam database</p>
        </blockquote>
        <figcaption class="blockquote-footer">
          CRUD <cite title="Source Title">Create, Read, Update, Delete</cite>
        </figcaption>
    </figure>

    <a href="tambah.php" class="btn btn-primary">Tambah Data</a>
    <div class="table-responsive">
      <table class="table align-middle">
        <thead>
          <tr>
            <th>No.</th>
            <th>NPM</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Foto</th>
            <th>Alamat</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($result = mysqli_fetch_assoc($sql)) { ?>
            <tr>
              <td><?php echo $no++ ?></td>
              <td><?= $result['npm']; ?> </td>
              <td><?= $result['nama']; ?></td>
              <td><?= $result['jenis_kelamin']; ?></td>
              <td><img src="res/<?= $result['foto']; ?>" alt="" style="width: 200px;"></td>
              <td><?= $result['alamat']; ?></td>
              <td>
                <a href="edit.php?id=<?=$result['id']?>"><button type="button" class="btn btn-warning">Edit</button></a>
                <a href="delete.php?id=<?= $result['id'] ?>"><button type="button" class="btn btn-danger">Delete</button></a>
              </td>


            </tr>

          <?php } ?>
        </tbody>
      </table>
    </div>


  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>