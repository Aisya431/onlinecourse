<!DOCTYPE html>
<html>
<head>
    <title>PROFIL</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <h1>Profil</h1>
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Tanggal Lahir</th>
                <th>No Telepon</th>
                <th>Email</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "connection.php";
            session_start();
            $username = $_SESSION['username'];
            // Query untuk mendapatkan daftar dokumen
            $query = "SELECT * FROM register where username ='$username'";

            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Mengambil ukuran file dan mengkonversi ukuran file menjadi Megabyte (MB) 

                // Display the document information
                echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['tanggal_lahir'] . "</td>";
                echo "<td>" . $row['no_hp'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
            
                // Provide a download link for the document
                echo "</tr>";
            } else {
            }            
            ?>
        </tbody>
    </table>
</body>
</html>