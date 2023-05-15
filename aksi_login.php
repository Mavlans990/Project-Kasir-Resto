<?php
include 'config/koneksi.php';
session_start();

$username = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST['username']));
$password = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST['password']));

$sql  = mysqli_query($koneksi," SELECT * FROM user WHERE username = '$username' AND password = '$password' ");
// $row      = mysqli_fetch_assoc($sql);
$cek    = mysqli_num_rows($sql);


// if ($cek > 0) {
//     $data = mysqli_fetch_assoc($sql);

//     if ($data['level']=="Admin") {

//         $_SESSION['login']              = true;
//         $_SESSION['id']                 = $data['id_user'];
//         $_SESSION['nama_user']          = $data['nama_user'];
//         $_SESSION['username']           = $username;
//         $_SESSION['level']              = "Admin";

//         header("location:index.php");

//     }elseif ($data['level']=="Kasir") {

//         $_SESSION['login']              = true;
//         $_SESSION['id']                 = $data['id_user'];
//         $_SESSION['nama_user']          = $data['nama_user'];
//         $_SESSION['username']           = $username;
//         $_SESSION['level']              = "Kasir";

//         header("location:index.php");
//     }
// }else{
//     echo"
//     <script>
//     alert('Maaf login anda salah');
//     window.location = 'login.php';
//     </script>
//     ";
//          //Jika tidak ditemukan, maka tampil pesan dibawah ini
// }


//Login V 2.0

// if (isset($_POST['masuk'])) {
//     $username = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST['username']));
//     $password = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST['password']));

//     $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username  = '$username' ");
//     $cek = mysqli_num_rows($sql);
//     if ($cek == 1) {
//         $dt = mysqli_fetch_assoc($sql);
//         $ps = $dt['password'];
//         if (password_verify($password, $ps)) {
//             $_SESSION['login'] = true;
//             $_SESSION['id_user'] = $dt['id_user'];
//             $_SESSION['nama_user'] = $dt['nama_user'];

//             echo "
//             <script>
//             alert('Silahkan Masuk');
//             window.location = 'index.php';
//             </script>
//             ";
//         } else {
//             echo "
//             <script>
//             alert('Password salah !');
//             window.location = 'login.php';
//             </script>
//             ";
//         }
//     } else {
//         echo "
//             <script>
//             alert('USername tidak ditemukan !');
//             window.location = 'login.php';
//             </script>
//             ";
//     }
// }




//Login v 3.0

// if($cek == 1){

//     $_SESSION['login']              = true;
//     $_SESSION['id']                 = $row['id_user'];
//     $_SESSION['nama_user']               = $row['nama_user'];
//     $_SESSION['username']               = $row['username'];
//     $_SESSION['password']               = $row['password'];
//     $_SESSION['level']               = $row['level'];

//     echo"
//     <script>
//     window.location = 'index.php';
//     </script>
//     ";
// }else{
//     echo"
//     <script>
//     alert('Maaf login anda salah');
//     window.location = 'login.php';
//     </script>
//     ";
//          //Jika tidak ditemukan, maka tampil pesan dibawah ini
// }


//Login v 4.0

if($cek == 1){

    $data = mysqli_fetch_assoc($sql);

    if ($data['level']=="Admin") {
        $_SESSION['id']       = $data['id_user'];
        $_SESSION['nama_user']  = $data['nama_user'];
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "Admin";
        $_SESSION['status'] = $data['status'];

        header("location:index.php");
    }elseif ($data['level']=="Kasir") {
        $_SESSION['id']       = $data['id_user'];
        $_SESSION['nama_user']  = $data['nama_user'];
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "Kasir";
        $_SESSION['status'] = $data['status'];

        header("location:index.php");
    }elseif ($data['level']=="Manajer") {
        $_SESSION['id']       = $data['id_user'];
        $_SESSION['nama_user']  = $data['nama_user'];
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "Manajer";
        $_SESSION['status'] = $data['status'];

        header("location:index.php");
    }else{
        echo"
        <script>
        alert('Maaf login anda salah');
        window.location = 'login.php';
        </script>
        ";
    }
}else{
    echo"
    <script>
    alert('Maaf login anda salah');
    window.location = 'login.php';
    </script>
    ";
}




?>