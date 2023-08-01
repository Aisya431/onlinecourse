<!DOCTYPE html>
<html>
<head>
    <title>Mentor</title>
    <Link rel="stylesheet"  href="css/acces.css"/>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333333;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .welcome-message {
            margin-bottom: 20px;
        }

        .action-button {
            background-color: #4CAF50;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 3px;
        }

        .action-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    include "connection.php";
    error_reporting(E_ALL^(E_NOTICE|E_WARNING));
    if (!isset($_SESSION['username'])) {
        die("Anda belum login");
    }
    $username = $_SESSION['username'];
    $level = $_SESSION['level'];
    if ($level == 'Peserta') {
        echo "Anda Sebagai " . $level;
    } elseif ($level == 'Mentor') {
        echo "Anda Sebagai " . $level;

    }
    ?>

<form method="POST">
    <table>
        <tr>
            <td><input type="submit" name="action" value="Upload Document"></td>
        </tr>
        <tr>
            <td><input type="submit" name="action" value="View Document"></td>
        </tr>
    </table>
</form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["action"] == "Upload Document") {
            header("Location: upload.php");
            exit;
        } elseif ($_POST["action"] == "View Document") {
            header("Location: view_document.php");
            exit;
        }
    }
    ?>
</body>
</html>
