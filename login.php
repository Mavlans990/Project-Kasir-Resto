<?php 
include "config/koneksi.php";
session_start();

// if (isset($_SESSION['id'])) {
//   if ($_SESSION['level']=="Admin") {
//     header("Location:index.php");
//   }elseif($_SESSION['level']=="Kasir") {
//     header("Location:index.php");
//   }
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script
  src="https://kit.fontawesome.com/64d58efce2.js"
  crossorigin="anonymous"
  ></script>
  <link rel="stylesheet" href="css/style2.css" />
  <title>Sign in & Sign up Form</title>
</head>
<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">

        <form action="aksi_login.php" method="POST" class="sign-in-form">
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="username" placeholder="Username" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" />
          </div>
          <button type="submit" name="login" class="btn solid" >Login</button>
        </form>

        <form  method="POST" class="sign-up-form">
          <h2 class="title">Sign Up</h2>
          <div class="input-field">
            <i class="fas fa-book"></i>
            <input type="text" name="nama_user" placeholder="Nama" />
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="username" placeholder="Username" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="text" name="password" placeholder="Password" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="text" name="alamat" placeholder="Alamat" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="number" name="no_hp" placeholder="No Hp" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <select class="default-select wide form-control" name="jenkel">
              <option value="">-- Jenis Kelamin --</option>
              <option value="Laki-Laki">Laki - Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <select class="default-select wide form-control" name="level">
              <option value="">-- Pilih Level --</option>
              <option value="Admin">Admin</option>
              <option value="Kasir">Kasir</option>
              <option value="Manajer">Manajer</option>
            </select>
          </div>
          <button type="submit" name="register" class="btn solid" >Register</button>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Silahkan Login Terlebih Dahulu</h3>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
            ex ratione. Aliquid!
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Register
          </button>
        </div>
        <img src="img/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>Silahkan Buat Akun Terlebih Dahulu</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
            laboriosam ad deleniti.
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Log In
          </button>
        </div>
        <img src="img/register.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="js/app.js"></script>
</body>
</html>
<?php
if (isset($_POST['register'])) {
    $nama_user = $_POST['nama_user'];
    $jenkel = $_POST['jenkel'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $status = 'Tdk Aktif';

    $sql = mysqli_query($koneksi, " INSERT INTO user VALUES('', '$nama_user', '$jenkel', '$alamat', '$no_hp', '$username', '$password', '$level', '$status')");

    if ($sql) {
        ?>
        <script type="text/javascript">
            alert ("Data Berhasil Di Simpan");
            window.location.href="login.php";
      </script>      
      <?php  
}
}
?>