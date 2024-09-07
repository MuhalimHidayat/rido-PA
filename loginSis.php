<?php 
require 'functions/authUsr/authSis.php';

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $result = loginSis($_POST);
    if ($result) {
        echo "
            <script src='https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries'></script>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                    });
                    Toast.fire({
                    icon: 'success',
                    title: 'Login Berhasil'
                    });    

                    setTimeout(() => {
                        window.location.href = 'index.php';
                    }, 2000);
                    
                });
            </script>
        ";
    } else {
        echo "
            <script src='https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries'></script>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                    });
                    Toast.fire({
                    icon: 'error',
                    title: 'Login Gagal'
                    });    
                });

                setTimeout(() => {
                    window.location.href = 'loginSis.php';
                }, 2000);
            </script>
        ";
    }

    exit();
}

// jika sudah terdapat session
if(isset($_SESSION["id_siswa"])){
    header("Location: profileSis.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/loginvol2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap"
      rel="stylesheet"
    />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- cdn tailwind -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
</head>
<body>
    <header>

    </header>
    <main>
        <div class="content">
            <div class="kiri">
                <div class="judul-log" style="margin-left: 130px;">
                    <h1 class="text-4xl font-semibold mb-4" onclick="Toast('error','error')">Login</h1>
                    <p class="deskripsi text-xs" onclick="showAlert()">
                        Silahkan masukan email dan password anda untuk masuk ke akun anda
                    </p>
                </div>
                <form action="" method="post">
                    <div class="inputan" style="padding-left: 130px;">
                        <div class="inputer-login">
                            <div class="email-log">
                                <label for="email">Email</label> <br>
                                <input type="text" name="email" placeholder="Masukan Email Anda " required>
                            </div>
                            <div class="password-log">
                                <label for="password">Password</label> <br>
                                <input type="password" placeholder="Masukan Password Anda" name="password" required>
                            </div>
                        </div>
                        <div class="kiri-bawah">
                            <div class="tombol">
                                <button type="submit" name="submit" class="text-white font-bold" style="margin-left: 66px; width: 400px;">Sign in</button>
                            </div>
                            <div class="button-desk2">
                                <p>Create an account? <a href="registerSis.php">Register now</a></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="kanan">
                <div class="gambar">
                    <img src="assets/loginSiswa.png" alt="">
                </div>
            </div>
        </div>
    </main>

    <script>
        function showAlert() {
            Swal.fire({
                title: 'Informasi',
                text: 'Silahkan masukan email dan password anda untuk masuk ke akun anda',
                icon: 'info',
                confirmButtonText: 'Oke'
            })
        }
    </script>

    
</body>
</html>