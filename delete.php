<?php
include "koneksi.php";
$id = -1;
if (isset($_GET['id'])){
    $id = $_GET['id'];
}
$sql = "DELETE FROM `tb_mahasiswa` WHERE `id`=$id;";

if (mysqli_query($conn, $sql)) {
    header("location: index.php");
}
exit();