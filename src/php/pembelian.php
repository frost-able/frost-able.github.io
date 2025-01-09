<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $no_nota_pembelian = $_POST['no_nota_pembelian'];
    $kode_supplier = $_POST['kode_supplier'];
    $nama_supplier = $_POST['nama_supplier'];
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $kode_grup = $_POST['kode_grup'];
    $nama_grup = $_POST['nama_grup'];
    $harga_beli = $_POST['harga_beli'];
    $qty_stock = $_POST['qty_stock'];
    $satuan_barang = $_POST['satuan_barang'];

    $sql_insert_supplier = "INSERT INTO supplier (Kode_Supplier, Nama_Supplier) VALUES (?, ?)";
    $stmt_insert_supplier = $conn->prepare($sql_insert_supplier);
    $stmt_insert_supplier->bind_param("ss", $kode_supplier, $nama_supplier);

    if (!$stmt_insert_supplier->execute()) {
        echo json_encode(["status" => "error", "message" => "Error inserting new supplier: " . $stmt_insert_supplier->error]);
        exit;
    }

    $sql_insert_stock = "INSERT INTO stock (Kode_Barang, Nama_Barang, Kode_Grup, Nama_Grup, Harga_Beli, Qty_Stock, Satuan_Barang) 
                         VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt_insert_stock = $conn->prepare($sql_insert_stock);
    $stmt_insert_stock->bind_param("ssssiiis", $kode_barang, $nama_barang, $kode_grup, $nama_grup, $harga_beli, $qty_stock, $satuan_barang);

    if (!$stmt_insert_stock->execute()) {
        echo json_encode(["status" => "error", "message" => "Error inserting new item into stock: " . $stmt_insert_stock->error]);
        exit;
    }

        $sql_insert_grup_stock = "INSERT INTO grup_stock (Kode_Grup, Nama_Grup) VALUES (?, ?)";
        $stmt_insert_grup_stock = $conn->prepare($sql_insert_grup_stock);
        $stmt_insert_grup_stock->bind_param("ss", $kode_grup, $nama_grup);

        if (!$stmt_insert_grup_stock->execute()) {
            echo json_encode(["status" => "error", "message" => "Error inserting group data: " . $stmt_insert_grup_stock->error]);
            exit;
        }

        stmt_insert_grup_stock->close();

    echo json_encode(["status" => "success", "message" => "Data successfully inserted."]);
} else {

    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}

$conn->close();
?>