<?php
include "connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mendapatkan informasi dokumen berdasarkan ID
    $query = "SELECT * FROM document WHERE kode_doc = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_array();
        $file_name = $row[4];
        $file_type = $row[5];
        $file_content = ($row[3]);

        // Mengirimkan header untuk mengatur tipe konten dan nama file
        header("Content-type: $file_type");
        header("Content-Disposition: attachment; filename=\"$file_name\"");

        // Mengirimkan konten file
        echo $file_content;
        exit;
    } else {
        echo "Dokumen tidak ditemukan.";
    }
} else {
    echo "Parameter ID dokumen tidak ditemukan.";
}
?>