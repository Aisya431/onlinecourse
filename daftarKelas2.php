<?php
session_start();
include "connection.php";
$username = $_SESSION['username'];

if (isset($_POST['ipa'])) {
$query1 = "SELECT * FROM payment where username = '$username' and pilihan_kelas = 'SCIENCE'";
  $result1 = $conn->query($query1);
  if(mysqli_num_rows($result1)>0){
   header('location:ipa.php');
  }else{
  header('location:pembayaran.php');
  }}
if (isset($_POST['ips'])) {
    $query1 = "SELECT * FROM payment where username = '$username' and pilihan_kelas = 'SOCIAL'";
  $result1 = $conn->query($query1);
  if(mysqli_num_rows($result1)>0){
   header('location:ips.php');
  }else{
  header('location:pembayaran.php');
  }}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kelas</title>
    <Link rel="stylesheet"  href="css/daftarKelas2.css"/>
</head>
<body>
<nav class="navbar">
        <ul class="ul-1">
        <a href="home.php"><li>Home</li></a>
            <a href="daftarKelas2.php"><li>Course</li></a>
            <a href="ipa.php"><li>My class</li></a>
            <a href="pembayaran.php"><li>Payment</li></a>
             
              
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

    <!-- <div class="carousel">
        <h2>Choose One</h2>
        <div class="div-carousel">
            <div><img src="img/Group 45.png"/></div>
            <div><img src="img/Group 46.png"/></div>
        </div>
    </div> -->
    <div class="carousel">
    <h2>Choose One</h2>
    <div class="div-carousel">
        <div>
            <form action="daftarKelas2.php" method="POST">
                <input type="hidden" name="class" value="1">
                <button name="ipa" type="submit">
                    <img src="img/Group 45.png"/>
                </button>
            </form>
        </div>
        <div>
            <form action="daftarKelas2.php" method="POST">
                <input type="hidden" name="class" value="2">
                <button name="ips" type="submit">
                    <img src="img/Group 40.svg"/>
                </button>
            </form>
        </div>
    </div>
</div>

    <div class="div-mentor">
        <h2>Mentor</h2>
        <div class="kotak-luar">
            <div class="kotak-mentor">
                <img src="img/man1.jpg"/>
                <h6>Samuel S.Pd</h6>
                <p>Menciptakan lingkungan belajar yang inklusif siswa.</p>
            </div>
            
            <div class="kotak-mentor">
                <img src="img/man2.jpg"/>
                <h6>Kevin M.Pd</h6>
                <p>Menerangi jalan bagi para siswa untuk menjadi pemimpin masa depan.</p>
            </div>

            <div class="kotak-mentor">
                <img src="img/woman1.jpg"/>
                <h6>Sri Murtiani S.Pd</h6>
                <p>Menginspirasi dan memberdayakan para siswa untuk mengejar pengetahuan.</p>
            </div>
            
            <div class="kotak-mentor">
                <img src="img/woman2.jpg"/>
                <h6>Alivia Lailatur M.Pd</h6>
                <p>Membimbing dan membantu siswa dalam mengatasi tantangan.</p>
            </div>

            <div class="kotak-mentor">
                <img src="img/man4.jpg"/>
                <h6>Raditya M.Pd</h6>
                <p>Mengubah hidup siswa melalui pendidikan.</p>
            </div>

            <div class="kotak-mentor">
                <img src="img/woman3.jpg"/>
                <h6>Agnesia S.Pd</h6>
                <p>Menjadi pembimbing yang peduli dan mendukung perkembangan siswa.</p>
            </div>

        </div>
        
    </div>

</body>
</html>