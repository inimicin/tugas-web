<?php
include('koneksi.php');

if (isset($_POST['submit'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    // $foto = $_POST['foto'];
    $alamat = $_POST['alamat'];

    $target_dir = "res\\";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["foto"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["foto"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $foto = basename($_FILES["foto"]["name"]);
    $result = mysqli_query($conn, "INSERT INTO `tb_mahasiswa`(`npm`, `nama`, `jenis_kelamin`, `foto`, `alamat`) VALUES ('$npm', '$nama', '$jk', '$foto', '$alamat');");
    if ($result) {
        header("location: index.php");
    }
}
