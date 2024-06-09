<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal-lahir'];
    $jenis_kelamin = $_POST['jenis-kelamin'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $jenis_layanan = $_POST['jenis-layanan'];

    // Periksa dan escape input untuk mencegah SQL Injection
    $nama = $conn->real_escape_string($nama);
    $tanggal_lahir = $conn->real_escape_string($tanggal_lahir);
    $jenis_kelamin = $conn->real_escape_string($jenis_kelamin);
    $alamat = $conn->real_escape_string($alamat);
    $telepon = $conn->real_escape_string($telepon);
    $email = $conn->real_escape_string($email);
    $jenis_layanan = $conn->real_escape_string($jenis_layanan);

    $sql = "INSERT INTO patients (nama, tanggal_lahir, jenis_kelamin, alamat, telepon, email, jenis_layanan)
            VALUES ('$nama', '$tanggal_lahir', '$jenis_kelamin', '$alamat', '$telepon', '$email', '$jenis_layanan')";

    if ($conn->query($sql) === TRUE) {
        echo "Registrasi berhasil!";
        echo "<script>window.location.href = 'ajukan.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>
