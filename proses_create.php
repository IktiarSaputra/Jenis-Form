<?php

include 'koneksi.php';

$nama = $_POST['nama'];
$umur = $_POST['umur'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tgl_lahir = $_POST['tgl_lahir'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$deskripsi = $_POST['deskripsi'];

$namaFile = $_FILES['foto']['name'];
$namaSementara = $_FILES['foto']['tmp_name'];
$dirUpload = "foto/";

$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

$hobi = implode(",", $_POST['hobi']);

mysqli_query($koneksi, "INSERT INTO siswa VALUES('', '$nama' , '$umur' , '$jenis_kelamin' , '$tgl_lahir' , '$kelas' , '$jurusan' , '$hobi' , '$deskripsi' , '$namaFile')");

header("location:index.php?pesan=insert");

?>