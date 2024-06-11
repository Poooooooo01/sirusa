<?php
// Konfigurasi database
$db_host = 'educalab.id';
$db_username = 'B3Al0QNDHV7z4Jm0';
$db_password = 'VK8OluX8s9jqnW5n';
$db_name = 'T696QQvt3vaK1cc6';
$db_port = 3307;

// Koneksi ke database
$conn = new mysqli($db_host, $db_username, $db_password, $db_name, $db_port);

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
$sql = "INSERT INTO reports (nama, email, subject, message) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $email, $subject, $message);

if ($stmt->execute()) {
    echo "OK"; // Jika berhasil disimpan, kirimkan respon 'OK'
} else {
    echo "Error: " . $stmt->error;
}

// Tutup koneksi database
$stmt->close();
$conn->close();
?>
