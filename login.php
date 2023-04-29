<?php 
session_start();
// menghubungkan php dengan koneksi database
include 'function.php';

if(isset($_POST['login'])){
    // menangkap data yang dikirim dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // menyeleksi data user dengan username dan password yang sesuai
    $login = mysqli_query($koneksi,"SELECT * FROM karyawan WHERE nama_karyawan='$username' and kd_karyawan='$password'");
    // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($login);

    // cek apakah username dan password di temukan pada database
    if($cek > 0){
        $_SESSION['log'] = True;
        $data = mysqli_fetch_assoc($login);
   
        // cek jika user login sebagai admin
        if($data['level']=="admin"){
   
            // buat session login dan username
            $_SESSION['nama_karyawan'] = $username;
            $_SESSION['level'] = "admin";
            // alihkan ke halaman dashboard admin
            header("location:index.php");
   
        // cek jika user login sebagai pegawai
        }else if($data['level']=="sales"){
            // buat session login dan username
            $_SESSION['nama_karyawan'] = $username;
            $_SESSION['level'] = "sales";
            // alihkan ke halaman dashboard pegawai
            header("location:sales.php");
        }else{
            // alihkan ke halaman login kembali
            header("location:login.php?pesan=gagal");
        } 
    }else{
    header("location:login.php?pesan=gagal");
    }
}

// if(!isset($_SESSION['log'])){

// }else{
//     header("location:index.php");
// }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <style class="text/css">
        body{
            background: url(img/grow.jpeg) no-repeat;
            width: 100%;
            height: 100%;
            background-size: cover;
        }
    </style>
    <body >
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"><img src="img/grow.jpeg" width="120" height="105" alt="logotoko">GROW</h3></div>
                                    <div class="card-body">
                                    <?php
                                    if(isset($_GET['pesan'])){
                                        if($_GET['pesan']=="gagal"){
                                            echo "<div class='alert'>Username dan Password Salah !</div>";
                                        }
                                    }
                                    ?>
                                        <form method = "POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name ="username" id="inputEmail" type="text" />
                                                <label for="inputEmail">Nama Pegawai</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name ="password" id="inputPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Kode Pegawai</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" name="login">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
