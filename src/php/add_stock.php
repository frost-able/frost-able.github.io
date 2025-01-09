<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO stock (Kode_Barang, Nama_Barang, Grup_Barang, Harga_Beli, Harga_Jual, Sisa_Stock, Satuan_Barang) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiiis", $kode_barang, $nama_barang, $grup_barang, $harga_beli, $harga_jual, $sisa_stock, $satuan_barang);

    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $grup_barang = $_POST['grup_barang'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $sisa_stock = $_POST['sisa_stock'];
    $satuan_barang = $_POST['satuan_barang'];

    if ($stmt->execute()) {
        header("Location: ../../public/html/stock.html?message=Data berhasil ditambahkan.");
        exit();

    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>