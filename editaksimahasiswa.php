<?php
include "koneksi.php";

$nim = $_POST["nim"];
$nama = $_POST["nama"];
$tanggalLahir = $_POST["tanggalLahir"];
$telp = $_POST["telp"];
$email = $_POST["email"];
$id = $_POST["id_prodi"];

$query = "UPDATE mahasiswa SET nama = '$nama', tanggalLahir = '$tanggalLahir', telp = '$telp', email = '$email', id_prodi = '$id' WHERE nim = '$nim'";

mysqli_query($conn, $query);

header("location:index.php");
