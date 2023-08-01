<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <title>Form Registrasi</title>
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Inter&family=Poppins&display=swap');

    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #fff;
  }

  .div-luar {
    display: flex;
    flex-direction: row;
    width: 100%;
    justify-content: right;
  }
  .awal{
    padding: 120px;
    background-color: #5376F1;
    width: 50%;
    flex-direction: column;
    justify-items:right;
  }
  .h4{
    text-align: right;
    font-weight: 400;
    font-family: 'Inter';

  }
  h2{
    text-align: left;
    color: #FDD501 ;
    font-weight: 1900;
    font-family: 'inter';
    font-style: bold;
  }
  h6 a{
    color: #fff;
  }
  form {
    display: flex;
    flex-direction: column;
    justify-content: center;
    justify-items: center;
    justify-self: center;
  }
  label{
    display: block;
    margin-bottom: 5px;
    width: 100%;
   margin-left: 10%;
  }
  input[type="text"],
  input[type="date"], 
  input[type="varchar"],
  input[type="email"],
  input[type="password"] {
  padding: 10px;
  width: 80%;
  margin-left: 10%;
  border: 1px solid #ccc;
  border-radius: 15px;
  /* margin-bottom: 10px; */
  justify-content: center;
  background-color: #B0BEF8;
  }
  input[type="submit"] {
  background-color: #FDD501;
  color: #fff;
  padding: 10px 10px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  box-shadow: inset 0 0 3px #070501;
  margin-top: 2rem;
  width: 50%;
  justify-content: center;
  margin-left: 20%;
  }
  .button{
  padding: 10px;
  width: 80%;
  margin-left: 10%;
  }
  </style>
</head>

<body>
  <div class="div-luar">

  <div class="awal">

  <h4>START FOR FREE</h4>

  <h2>Create new account</h2>

  <H6>Already A Member <a href="login.html">Log In</a></H6>
  
  <form action="act_register.php" method="POST">

    <label for="nama">Username</label>
    <input type="text" id="nama" name="username" required><br>

    <label for="tgl">Tanggal Lahir</label>
    <input type="date" id="tgl" name="tanggal_lahir" required><br>

    <label for="alamat">Alamat</label>
    <input type="text" id="alamat" name="alamat" required><br>

    <label for="hp">No.handphone</label>
    <input type="varchar" id="hp" name="no_hp" required><br>
    
    <label for="email">Email</label>
    <input type="email" id="email" name="email" required><br>
    
    <label for="password">Password</label>
    <input type="password" id="password" name="password" required><br>
    
    <label for="konfirmasi_password">Konfirmasi Password</label>
    <input type="password" id="konfirmasi_password" name="confirm_password" required><br>

    <div class="button">
        <select class="form-select" name="level" aria-label="Default select example">
        <option value="Peserta">Peserta</option>
        <option value="Mentor">Mentor</option>
    </select></div>
    
    <input class="btn-create" type="submit" value="Create an account">
  </form>
  </div>
  </div>
  
</body>
</html>
