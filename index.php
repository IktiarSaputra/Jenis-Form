<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Data Siswa</title>

    <!-- Link CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Style CSS -->
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Arial';
            font-weight: 500;
        }

        .container {
            margin-top: 50px;
        }

        .foto {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
    </style>

    <!-- Link JS -->
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h2 class="text-center mb-5">List Data Siswa</h2>
        <?php 
            if(isset($_GET['pesan'])){
                if($_GET['pesan'] == "insert"){
                    echo "
                    <script>
                    alert('Siswa Berhasil di Tambah')
                    </script>
                  ";
                }elseif ($_GET['pesan'] == "update") {
                    echo "
                    <script>
                    alert('Siswa Berhasil di Update')
                    </script>
                  ";
                }
                elseif ($_GET['pesan'] == "delete") {
                    echo "
                    <script>
                    alert('Siswa Berhasil di Hapus')
                    </script>
                  ";
                }
            }
	    ?>

        <br>
        <a href="create.php" class="btn btn-primary mb-4">Tambah Siswa</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Tgl Lahir</th>
                    <th scope="col">hobi</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            
            include 'koneksi.php';
            $data = mysqli_query($koneksi, "select * from siswa");
            while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <th scope="row"><img class="foto" src="<?php echo "foto/".$d['foto']; ?>"></th>
                    <td><?php echo $d['nama'] ?></td>
                    <td><?php echo $d['umur'] ?> Tahun</td>
                    <td><?php echo $d['jenis_kelamin'] ?></td>
                    <td><?php echo $d['tgl_lahir'] ?></td>
                    <td><?php echo $d['hobi'] ?></td>
                    <td><?php echo $d['kelas'] ?> <?php echo $d['jurusan'] ?></td>
                    <td><?php echo $d['deskripsi'] ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $d['id']; ?>" class="btn btn-warning text-white mb-2">Edit</a>
                        <a href="delete.php?id=<?php echo $d['id']; ?>" class="btn btn-danger mb-2">Hapus</a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>

    </div>
</body>

</html>