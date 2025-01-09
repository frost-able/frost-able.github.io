<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['kode_grup']) && isset($_POST['nama_grup'])) {
        $kode_grup_lama = trim($_POST['kode_grup']);
        $nama_grup = trim($_POST['nama_grup']);
        $kode_grup_baru = trim($_POST['kode_grup_baru']);

        if (empty($kode_grup_lama) || empty($nama_grup)) {
            http_response_code(400);
            echo json_encode(['error' => 'Kode grup dan nama grup tidak boleh kosong.']);
            exit();
        }

        $stmt = $conn->prepare("UPDATE grup_stock SET Kode_Grup=?, Nama_Grup=? WHERE Kode_Grup=?");
        if (!$stmt) {
            http_response_code(500);
            echo json_encode(['error' => 'Gagal menyiapkan statement.']);
            exit();
        }

        $stmt->bind_param("sss", $kode_grup_baru, $nama_grup, $kode_grup_lama);
        if ($stmt->execute()) {
            header("Location: ../../public/html/grup_stock.html?message=Data berhasil diperbarui.");
            exit();

        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {

        http_response_code(400);
        echo json_encode(['error' => 'Parameter tidak lengkap.']);
    }
}

$conn->close();
?>