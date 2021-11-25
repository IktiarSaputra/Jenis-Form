<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>

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

        .file {
            visibility: hidden;
            position: absolute;
        }
    </style>

    <!-- Link JS -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <?php
            include 'koneksi.php';
            $id = $_GET['id'];
            $data = mysqli_query($koneksi,"select * from siswa where id='$id'");
            while($d = mysqli_fetch_array($data)){
            $datahobi=explode(',', $d['hobi']);
        ?>

        <div class="card">
            <div class="card-header text-center font-weight-bold">
                Edit Data Siswa
            </div>
            <div class="card-body">
                <form method="post" action="proses_update.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
                        <label for="nama">Nama :</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $d['nama'] ?>" placeholder="Nama Siswa" required>
                    </div>
                    <div class="form-group">
                        <label for="umur">Umur :</label>
                        <input type="number" name="umur" class="form-control" id="umur" value="<?php echo $d['umur'] ?>" placeholder="Umur Siswa"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Jenis Kelamin :</label>
                        <select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1">
                            <?php
                                if ($d['jenis_kelamin'] == 'Laki-Laki') {
                                    echo "<option value='Laki-Laki'>Laki - Laki</option>";
                                    echo "<option value='Perempuan'>Perempuan</option>";
                                } else {
                                    echo "<option value='Perempuan'>Perempuan</option>";
                                    echo "<option value='Laki-Laki'>Laki - Laki</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir :</label>
                        <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $d['tgl_lahir'] ?>" id="tgl_lahir"
                            placeholder="Tanggal Lahir Siswa" required>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas :</label><br>
                        <?php
                                if ($d['kelas'] == '10') {
                                    echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='10' value='10' name='kelas' class='custom-control-input' checked>
                                        <label class='custom-control-label' for='10'>10</label>
                                    </div>
                                    ";
                                    echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='11' value='11' name='kelas' class='custom-control-input'>
                                        <label class='custom-control-label' for='11'>11</label>
                                    </div>
                                    ";
                                    echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='10' value='12' name='kelas' class='custom-control-input'>
                                        <label class='custom-control-label' for='12'>12</label>
                                    </div>
                                    ";
                                }elseif ($d['kelas'] == '11') {
                                    echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='10' value='10' name='kelas' class='custom-control-input'>
                                        <label class='custom-control-label' for='10'>10</label>
                                    </div>
                                    ";
                                    echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='11' value='11' name='kelas' class='custom-control-input' checked>
                                        <label class='custom-control-label' for='11'>11</label>
                                    </div>
                                    ";
                                    echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='12' value='12' name='kelas' class='custom-control-input'>
                                        <label class='custom-control-label' for='12'>12</label>
                                    </div>
                                    ";
                                }
                                 else {
                                    echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='10' value='10' name='kelas' class='custom-control-input'>
                                        <label class='custom-control-label' for='10'>10</label>
                                    </div>
                                    ";
                                    echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='11' value='11' name='kelas' class='custom-control-input'>
                                        <label class='custom-control-label' for='11'>11</label>
                                    </div>
                                    ";
                                    echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='12' value='12' name='kelas' class='custom-control-input' checked>
                                        <label class='custom-control-label' for='12'>12</label>
                                    </div>
                                    ";
                                }
                            ?>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Jurusan :</label><br>
                        <?php
                                if ($d['jurusan'] == 'RPL') {
                                    echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='RPL' value='RPL' name='jurusan' class='custom-control-input' checked>
                                        <label class='custom-control-label' for='RPL'>RPL</label>
                                    </div>
                                    ";
                                    echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='TKJ' value='TKJ' name='jurusan' class='custom-control-input'>
                                        <label class='custom-control-label' for='TKJ'>TKJ</label>
                                    </div>
                                    ";
                                    echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='SIJA' value='SIJA' name='jurusan' class='custom-control-input'>
                                        <label class='custom-control-label' for='SIJA'>SIJA</label>
                                    </div>
                                    ";
                                    echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='MM' value='MM' name='jurusan' class='custom-control-input'>
                                        <label class='custom-control-label' for='MM'>MM</label>
                                    </div>
                                    ";
                                }elseif ($d['jurusan'] == 'TKJ') {
                                    echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='RPL' value='RPL' name='jurusan' class='custom-control-input'>
                                        <label class='custom-control-label' for='RPL'>RPL</label>
                                    </div>
                                    ";
                                    echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='TKJ' value='TKJ' name='jurusan' class='custom-control-input' checked>
                                        <label class='custom-control-label' for='TKJ'>TKJ</label>
                                    </div>
                                    ";
                                    echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='SIJA' value='SIJA' name='jurusan' class='custom-control-input'>
                                        <label class='custom-control-label' for='SIJA'>SIJA</label>
                                    </div>
                                    ";
                                    echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='MM' value='MM' name='jurusan' class='custom-control-input'>
                                        <label class='custom-control-label' for='MM'>MM</label>
                                    </div>
                                    ";
                                }elseif ($d['jurusan'] == 'SIJA') {
                                    echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='RPL' value='RPL' name='jurusan' class='custom-control-input'>
                                        <label class='custom-control-label' for='RPL'>RPL</label>
                                    </div>
                                    ";
                                    echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='TKJ' value='TKJ' name='jurusan' class='custom-control-input'>
                                        <label class='custom-control-label' for='TKJ'>TKJ</label>
                                    </div>
                                    ";
                                    echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='SIJA' value='SIJA' name='jurusan' class='custom-control-input' checked>
                                        <label class='custom-control-label' for='SIJA'>SIJA</label>
                                    </div>
                                    ";
                                    echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='MM' value='MM' name='jurusan' class='custom-control-input'>
                                        <label class='custom-control-label' for='MM'>MM</label>
                                    </div>
                                    ";
                                }
                                 else {
                                    echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='RPL' value='RPL' name='jurusan' class='custom-control-input'>
                                        <label class='custom-control-label' for='RPL'>RPL</label>
                                    </div>
                                    ";
                                    echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='TKJ' value='TKJ' name='jurusan' class='custom-control-input'>
                                        <label class='custom-control-label' for='TKJ'>TKJ</label>
                                    </div>
                                    ";
                                    echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='SIJA' value='SIJA' name='jurusan' class='custom-control-input'>
                                        <label class='custom-control-label' for='SIJA'>SIJA</label>
                                    </div>
                                    ";
                                    echo "
                                    <div class='custom-control custom-radio custom-control-inline'>
                                        <input type='radio' id='MM' value='MM' name='jurusan' class='custom-control-input' checked>
                                        <label class='custom-control-label' for='MM'>MM</label>
                                    </div>
                                    ";
                                }
                            ?>
                    </div>
                    <div class="form-group">
                        <label for="hobi">Hobi :</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="hobi[]" <?php if (in_array("Ngoding", $datahobi)) echo "checked";?> id="inlineCheckbox1"
                                value="Ngoding">
                            <label class="form-check-label" for="inlineCheckbox1">Ngoding</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="hobi[]" <?php if (in_array("Gamer", $datahobi)) echo "checked";?> id="inlineCheckbox2"
                                value="Gamer">
                            <label class="form-check-label" for="inlineCheckbox2">Gamer</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="hobi[]" <?php if (in_array("Futsal", $datahobi)) echo "checked";?> id="inlineCheckbox3"
                                value="Futsal">
                            <label class="form-check-label" for="inlineCheckbox3">Futsal</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Deksripsi Siswa</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Deskripsi Siswa"
                            name="deskripsi" rows="3"><?php echo $d['deskripsi'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Upload Foto</label><br>
                        <img src="<?php echo "foto/".$d['foto']; ?>" id="preview" class="img-fluid" width="300px"
                            height="300px">
                        <input type="file" name="foto" class="file" accept="image/*">
                        <div class="input-group my-3">
                            <input type="text" class="form-control" disabled placeholder="<?php echo $d['foto'] ?>" id="file">
                            <div class="input-group-append">
                                <button type="button" class="browse btn btn-primary">Browse</button>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Submit</button>
                </form>
            </div>
        </div>
        <?php 
                       }
                    ?>
    </div>

    <script>
        $(document).on("click", ".browse", function () {
            var file = $(this).parents().find(".file");
            file.trigger("click");
        });
        $('input[type="file"]').change(function (e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);

            var reader = new FileReader();
            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
    </script>
</body>

</html>