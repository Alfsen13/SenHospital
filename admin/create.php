<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Peserta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //Cek apakah ada kiriman form dari method POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama = input($_POST["nama"]);
        $tanggal_lahir = input($_POST["tanggal-lahir"]);
        $jenis_kelamin = input($_POST["jenis-kelamin"]);
        $alamat = input($_POST["alamat"]);
        $telepon = input($_POST["telepon"]);
        $email = input($_POST["email"]);
        $jenis_layanan = input($_POST["jenis-layanan"]);

        //Query input data ke dalam tabel patients
        $sql = "INSERT INTO patients (nama, tanggal_lahir, jenis_kelamin, alamat, telepon, email, jenis_layanan)
                VALUES ('$nama', '$tanggal_lahir', '$jenis_kelamin', '$alamat', '$telepon', '$email', '$jenis_layanan')";

        //Mengeksekusi/menjalankan query di atas
        $hasil = mysqli_query($kon, $sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query di atas
        if ($hasil) {
            header("Location:index.php");
        } else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        }
    }
    ?>

    <h2>Input Data</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" class="form-control" required />
        </div>

        <div class="form-group">
            <label for="tanggal-lahir">Tanggal Lahir:</label>
            <input type="date" id="tanggal-lahir" name="tanggal-lahir" class="form-control" required />
        </div>

        <div class="form-group">
            <label for="jenis-kelamin">Jenis Kelamin:</label>
            <select id="jenis-kelamin" name="jenis-kelamin" class="form-control" required>
                <option value="pria">Pria</option>
                <option value="wanita">Wanita</option>
                <option value="lainnya">Lainnya</option>
            </select>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" rows="4" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="telepon">Nomor Telepon:</label>
            <input type="tel" id="telepon" name="telepon" class="form-control" required />
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required />
        </div>

        <div class="form-group">
            <label for="jenis-layanan">Jenis Layanan:</label>
            <select id="jenis-layanan" name="jenis-layanan" class="form-control" required>
                <option value="konsultasi-penyakit">Konsultasi Penyakit</option>
                <option value="igd">IGD</option>
                <option value="tanya-obat">Tanya Obat</option>
            </select>
        </div>       

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
