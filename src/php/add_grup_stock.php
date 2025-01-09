<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO grup_stock (Kode_Grup, Nama_Grup) VALUES (?, ?)");
    $stmt->bind_param("ss", $kode_grup, $nama_grup);

    $kode_grup = $_POST['kode_grup'];
    $nama_grup = $_POST['nama_grup'];

    if ($stmt->execute()) {
        header("Location: ../../public/html/grup_stock.html?message=Data berhasil ditambahkan.");
        exit();

    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>