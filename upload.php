<?php
session_start();
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tgl = date('Y-m-d');
    $deskripsi = $_POST["deskripsi"];
    $file_name = $_FILES["file"]["name"];
    $file_type = $_FILES["file"]["type"];
    $file_size = $_FILES["file"]["size"];
    $file_content = addslashes(file_get_contents($_FILES["file"]["tmp_name"]));

    // Query untuk menyimpan data dokumen ke dalam tabel document
    $query = "INSERT INTO document (tanggal, deskripsi, file, nama_file, tipe_file, ukuran_file) 
              VALUES (NOW(), '$deskripsi', '$file_content', '$file_name', '$file_type', '$file_size')";
    $stmt = $conn->prepare($query);

    if ($stmt->execute()) {
        // Dokumen berhasil diunggah ke database
        echo "<script>alert('Dokumen berhasil diunggah ke database.');</script>";
    } else {
        // Terjadi kesalahan saat mengunggah dokumen
        echo "<script>alert('Terjadi kesalahan saat mengunggah dokumen.');</script>";
    }    

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Upload Materi</title>
    
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Subject :</td>
                <td><textarea name="deskripsi" rows="4" cols="40"></textarea></td>
            </tr>
            <tr>
                <td>File :</td>
                <td><input type="file" name="file"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Upload"></td>
            </tr>
        </table>
    </form>
</body>
</html>
