<?php

include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$umur = $_POST['umur'];
$tgl_lahir = $_POST['tgl_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$deskripsi = $_POST['deskripsi'];
$namaFile = $_FILES['foto']['name'];
if ($namaFile != "") {
    $namaSementara = $_FILES['foto']['tmp_name'];

    $dirUpload = "foto/";

    $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);


    $hobi = implode(",", $_POST['hobi']);

    $query = mysqli_query($koneksi, "UPDATE siswa set nama='$nama', umur='$umur' , jenis_kelamin='$jenis_kelamin' , tgl_lahir='$tgl_lahir', kelas='$kelas', jurusan='$jurusan' , hobi='$hobi', deskripsi='$deskripsi' , foto='$namaFile' WHERE id='$id'");

    if ($query) {
        header('location:index.php?pesan=update');
    }
} else {
    $data = mysqli_query($koneksi,"select * from siswa where id='$id'");
    $p = mysqli_fetch_array($data);
    $foto = $p['foto'];
    $hobi = implode(",", $_POST['hobi']);

    $query = mysqli_query($koneksi, "UPDATE siswa set nama='$nama', umur='$umur' , jenis_kelamin='$jenis_kelamin' , tgl_lahir='$tgl_lahir', kelas='$kelas', jurusan='$jurusan' , hobi='$hobi', deskripsi='$deskripsi' , foto='$foto' WHERE id='$id'");

    if ($query) {
        header('location:index.php?pesan=update');
    }
}

?>