<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO supplier (Kode_Supplier, Nama_Supplier, Alamat_Supplier, Kota_Supplier, Saldo_Hutang) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $kode_supplier, $nama_supplier, $alamat_supplier, $kota_supplier, $saldo_hutang);

    $kode_supplier = $_POST['kode_supplier'];
    $nama_supplier = $_POST['nama_supplier'];
    $alamat_supplier = $_POST['alamat_supplier'];
    $kota_supplier = $_POST['kota_supplier'];
    $saldo_hutang = $_POST['saldo_hutang'];

    if ($stmt->execute()) {
        header("Location: ../../public/html/supplier.html?message=Supplier berhasil ditambahkan.");
        exit();

    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>