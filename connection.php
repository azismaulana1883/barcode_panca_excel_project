<?php
// Mengasumsikan Anda memiliki koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "panbrothrers";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari database
$sql = "SELECT * FROM label_master";
$result = $conn->query($sql);

// Menutup koneksi
$conn->close();
