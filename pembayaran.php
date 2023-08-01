<?php
include "connection.php";
session_start();
$payment_status = '';
$kode_bayar = '';
$tgl_bayar = '';
$pilihan_kelas ='';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_bayar = $_POST["kode_bayar"];
    $username = $_POST["username"];
    $tgl_bayar = $_POST["tgl_bayar"];
    $jenis_bayar = $_POST["jenis_bayar"];
    $pilihan_kelas = $_POST["pilihan_kelas"];
    

    $insert_query = "INSERT INTO payment (kode_bayar, username, tgl_bayar, jenis_bayar, pilihan_kelas)
    VALUES ('$kode_bayar', '$username', '$tgl_bayar', '$jenis_bayar', '$pilihan_kelas')";

    if ($conn->query($insert_query) === TRUE) {
        // Assuming the user ID is stored in the $user_id variable
        $update_query = "UPDATE payment SET payment_status = 'paid' WHERE username = '$username'";
        
        if ($conn->query($update_query) === TRUE) {
            // Payment status updated successfully
        $query4 = "SELECT * from payment where kode_bayar = '$kode_bayar'";
        $result4 = $conn->query($query4);
        $row4 = $result4->fetch_assoc();
        $payment_status = $row4['username'];
        $kode_bayar = $row4['kode_bayar'];
        $tgl_bayar = $row4['tgl_bayar'];
        $pilihan_kelas = $row4['pilihan_kelas'];
        } else {
            // Failed to update payment status, handle the error
            echo "Error: " . $update_query . "<br>" . $conn->error;
        }

        // Payment inserted successfully, you can proceed with granting access to the course.
        // You can redirect the user to the course page or perform any other necessary actions.
        // header("Location: course.php");
        // exit();
    } else {
        // Payment insertion failed, handle the error accordingly.
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link rel='stylesheet' href="css/pembayaran.css">


</head>
<div class="luar-luar">   
<body>
<nav class="navbar">
        <ul class="ul-1">
            <a href="home.php"><li>Home</li></a>
            <a href="daftarKelas2.php"><li>Course</li></a>
            <a href="ipa.php"><li>My class</li></a>
            <a href="pembayaran.php"><li>Pembayaran</li></a>
             
        </ul>
        <div class="dropdown">
            <img src="img/Frame 1.svg" alt="" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        </a>
        <div class="dropdown-content">
            <a href="profile.php">Profile</a>
            <a href="login.html">Logout</a>
        </div>
</div>

</nav>
    <div class="luar-luar">
       
        <div class="luar">

            <section>
                <h2>Choose Payment Method</h2>

                <div class="bank">
                    <p>bank</p>
                    <div class="bank-dalam">
                        <div>
                            <img src="img/bni 1.svg" />
                            <img src="img/bca 1.svg" />
                        </div>

                        <div>
                            <img src="img/bri 1.svg" />
                            <img src="img/mandiri 1.svg" />
                        </div>
                    </div>
                </div>

                <div class="e-wallet">
                    <p>e-wallet</p>
                    <div class="wallet-dalam">
                        <div>
                            <img src="img/image-removebg-preview 1.svg" />
                            <img src="img/image-removebg-preview 2.svg" />
                            <img src="img/ovo 1.svg" />
                        </div>

                        <div>
                            <img src="img/i-saku.svg" />
                            <img src="img/gopay 1.svg" />
                            <img src="img/linkAja 1.svg" />
                        </div>
                    </div>
                </div>

            </section>

            <div class="regist">
                <form action=pembayaran.php method="POST">
                    <h2>Registration Class</h2>

                    <label for="tgl">Code</label>
                    <input type="INT" id="kode_bayar" name="kode_bayar" required><br>

                    <label for="nama">Username</label>
                    <input type="text" id="nama" name="username" required><br>

                    <label for="tanggal">Date</label>
                    <input type="date" id="tgl_bayar" name="tgl_bayar" required><br>

                    <div class="button">
                        <label for="jenis_bayar">Choose Payment</label>
                        <select class="form-select" name="jenis_bayar" aria-label="Default select example">
                            <option value="ovo">ovo</option>
                            <option value="dana">dana</option>
                            <option value="shoppepay">shoppepay</option>
                            <option value="i.saku">i.saku</option>
                            <option value="gopay">gopay</option>
                            <option value="link-aja">link aja</option>
                            <option value="BNI">BNI</option>
                            <option value="BCA">BCA</option>
                            <option value="BRI">BRI</option>
                            <option value="Mandiri">Mandiri</option>
                        </select>
                    </div><Br></Br>

                    <div class="button">
                        <label for="pilihan_kelas">Choose Class</label>
                        <select class="form-select" name="pilihan_kelas" aria-label="Default select example">
                            <option value="SCIENCE">SCIENCE</option>
                            <option value="SOCIAL">SOCIAL</option>

                        </select>
                    </div><br><br>

                    <!-- <input class="btn-create" type="submit" name="submit" value="Pay Now"> -->
                    <button name="submit">Pay now</button>
                </form>
            </div>

            <div class="order">
                <h2>Order Summary</h2>
                <div class="logo">
                    <img src="img/Group 43.png">
                </div>

                <div class="kotak-summary">
                    <?php
                    echo $payment_status;
                    echo $kode_bayar;
                    echo $tgl_bayar;
                    echo $pilihan_kelas;
                    echo "Pembayaran berhasil dengan kode berikut : $kode_bayar";
                    ?>
                </div>

            </div>

        </div>
    </div>
</body>

</html>