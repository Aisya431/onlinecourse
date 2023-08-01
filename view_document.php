<?php
include "connection.php";

// Query untuk mendapatkan daftar dokumen
$query = "SELECT * FROM document";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Dokumen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333333;
            color: #ffffff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #dddddd;
        }

        .download-link {
            color: #4CAF50;
            text-decoration: none;
        }

        .download-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Assignment List</h1>
    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>Date Uploaded</th>
                <th>Assignment</th>
                <th>File Type</th>
                <th>Ukuran File</th>
                <th>Subject</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                $row = $result->fetch_array();

                // Mengambil ukuran file dan mengkonversi ukuran file menjadi Megabyte (MB)
                $fileSize = $row[6];
                $fileSizeMB = round($fileSize / (1024 * 1024), 2);

                // Display the document information
                echo "<tr>";
                echo "<td>" . $row[0] . "</td>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[4] . "</td>";
                echo "<td>" . $row[5] . "</td>";
                echo "<td>" . $fileSizeMB . " MB</td>";
                echo "<td>" . $row[2] . "</td>";
            
                // Provide a download link for the document
                echo "<td><a href=\"download.php?id=" . $row[0] . "\">Download</a></td>";
                echo "</tr>";
            } else {
                echo "<tr><td colspan='6'>Tidak ada dokumen yang diunggah.</td></tr>";
            }            
            ?>
        </tbody>
    </table>
</body>
</html>
