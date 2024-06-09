<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Pasien</title>
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

    //Cek apakah ada nilai yang dikirim menggunakan metode GET dengan nama id
    if (isset($_GET['id'])) {
        $id = input($_GET["id"]);
        $sql = "SELECT * FROM patients WHERE id=$id";
        $hasil = mysqli_query($kon, $sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    //Cek apakah ada kiriman form dari method POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = htmlspecialchars($_POST["id"]);
        $nama = input($_POST["nama"]);
        $tanggal_lahir = input($_POST["tanggal_lahir"]);
        $jenis_kelamin = input($_POST["jenis_kelamin"]);
        $alamat = input($_POST["alamat"]);
        $telepon = input($_POST["telepon"]);
        $email = input($_POST["email"]);
        $jenis_layanan = input($_POST["jenis_layanan"]);

        //Query update data pada tabel patients
        $sql = "UPDATE patients SET
                nama='$nama',
                tanggal_lahir='$tanggal_lahir',
                jenis_kelamin='$jenis_kelamin',
                alamat='$alamat',
                telepon='$telepon',
                email='$email',
                jenis_layanan='$jenis_layanan'
                WHERE id=$id";

        //Mengeksekusi atau menjalankan query diatas
        $hasil = mysqli_query($kon, $sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        } else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        }
    }
    ?>

    <h2>Update Data</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required />
        </div>

        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" value="<?php echo $data['tanggal_lahir']; ?>" required />
        </div>

        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                <option value="pria" <?php if ($data['jenis_kelamin'] == 'pria') echo 'selected'; ?>>Pria</option>
                <option value="wanita" <?php if ($data['jenis_kelamin'] == 'wanita') echo 'selected'; ?>>Wanita</option>
                <option value="lainnya" <?php if ($data['jenis_kelamin'] == 'lainnya') echo 'selected'; ?>>Lainnya</option>
            </select>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" rows="4" class="form-control" required><?php echo $data['alamat']; ?></textarea>
        </div>

        <div class="form-group">
            <label for="telepon">Nomor Telepon:</label>
            <input type="tel" id="telepon" name="telepon" class="form-control" value="<?php echo $data['telepon']; ?>" required />
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" value="<?php echo $data['email']; ?>" required />
        </div>

        <div class="form-group">
            <label for="jenis_layanan">Jenis Layanan:</label>
            <select id="jenis_layanan" name="jenis_layanan" class="form-control" required>
                <option value="konsultasi-penyakit" <?php if ($data['jenis_layanan'] == 'konsultasi-penyakit') echo 'selected'; ?>>Konsultasi Penyakit</option>
                <option value="igd" <?php if ($data['jenis_layanan'] == 'igd') echo 'selected'; ?>>IGD</option>
                <option value="tanya-obat" <?php if ($data['jenis_layanan'] == 'tanya-obat') echo 'selected'; ?>>Tanya Obat</option>
            </select>
        </div>

        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
