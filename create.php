<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>

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
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                Tambah Data Siswa
            </div>
            <div class="card-body">
                <form method="post" action="proses_create.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama">Nama :</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Siswa" required>
                    </div>
                    <div class="form-group">
                        <label for="umur">Umur :</label>
                        <input type="number" name="umur" class="form-control" id="umur" placeholder="Umur Siswa"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Jenis Kelamin :</label>
                        <select class="form-control" name="jenis_kelamin" id="exampleFormControlSelect1">
                            <option>Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir :</label>
                        <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir"
                            placeholder="Tanggal Lahir Siswa" required>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas :</label><br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="10" value="10" name="kelas" class="custom-control-input">
                            <label class="custom-control-label" for="10">10</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="11" value="11" name="kelas" class="custom-control-input">
                            <label class="custom-control-label" for="11">11</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="12" value="12" name="kelas" class="custom-control-input">
                            <label class="custom-control-label" for="12">12</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Jurusan :</label><br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="RPL" value="RPL" name="jurusan" class="custom-control-input">
                            <label class="custom-control-label" for="RPL">RPL</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="TKJ" value="TKJ" name="jurusan" class="custom-control-input">
                            <label class="custom-control-label" for="TKJ">TKJ</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="SIJA" value="SIJA" name="jurusan" class="custom-control-input">
                            <label class="custom-control-label" for="SIJA">SIJA</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="MM" value="MM" name="jurusan" class="custom-control-input">
                            <label class="custom-control-label" for="MM">MM</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hobi">Hobi :</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="hobi[]" id="inlineCheckbox1"
                                value="Ngoding">
                            <label class="form-check-label" for="inlineCheckbox1">Ngoding</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="hobi[]" id="inlineCheckbox2"
                                value="Gamer">
                            <label class="form-check-label" for="inlineCheckbox2">Gamer</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="hobi[]" id="inlineCheckbox3"
                                value="Futsal">
                            <label class="form-check-label" for="inlineCheckbox3">Futsal</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Biodata Siswa</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Deskripsi Siswa"
                            name="deskripsi" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Upload Foto</label><br>
                        <img src="https://via.placeholder.com/300" id="preview" class="img-fluid" width="300px"
                            height="300px">
                        <input type="file" name="foto" class="file" accept="image/*">
                        <div class="input-group my-3">
                            <input type="text" class="form-control" disabled placeholder="Upload Foto" id="file">
                            <div class="input-group-append">
                                <button type="button" class="browse btn btn-primary">Browse</button>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Submit</button>
                </form>
            </div>
        </div>
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