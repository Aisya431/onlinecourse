<?php
include "connection.php";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $level = $_POST["level"];

    // Validasi form
    // $errors = array();

    // Jika username telah digunakan
    $query = "SELECT * FROM register WHERE username = '$username'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        echo "<script>";
        echo "alert('Username sudah digunakan. Silakan pilih username lain!');";
        echo "</script>";
    }
    // Jika konfirmasi password tidak cocok
    if ($password !== $confirm_password) {
        echo "<script>";
        echo "alert('Ulangi, password tidak sama!');";
        echo "</script>";
    }

    // Jika tidak ada error, simpan data ke database dan tampilkan dalam tabel
    // if (empty($errors)) {
        // Enkripsi password menggunakan password_hash()
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Query untuk menyimpan data pengguna ke dalam tabel users
        $insert_query = "INSERT INTO register (username, tanggal_lahir, alamat, email, no_hp,  password, level) 
        VALUES ('$username', '$tanggal_lahir', '$alamat', '$email', '$no_hp', '$hashed_password', '$level')";
            
        // Menjalankan query
        if ($conn->query($insert_query) === TRUE) {
        // Menampilkan notifikasi pop-up registrasi berhasil
        echo "
        <script>
            alert('Anda telah sukses Registrasi');
            window.location.href = ('login.html');
        </script>
        ";

        }   
    // } 
    // else {
    //     // Menampilkan pesan error menggunakan notifikasi pop-up
    //     foreach ($errors as $error) {
    //         echo "<script>";
    //         echo "alert('$error');";
    //         echo "</script>";
    //     }
    // }
// }
?>