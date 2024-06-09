<?php
// Konfigurasi database
$db_host = 'localhost'; // Ganti dengan host database Anda
$db_username = 'root'; // Ganti dengan username database Anda
$db_password = ''; // Ganti dengan password database Anda
$db_name = 'rusa'; // Ganti dengan nama database Anda

// Koneksi ke database
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Tangkap data dari form
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Simpan data ke database
$sql = "INSERT INTO reports (nama, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
if ($conn->query($sql) === TRUE) {
    echo "OK"; // Jika berhasil disimpan, kirimkan respon 'OK'
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi database
$conn->close();
?>
