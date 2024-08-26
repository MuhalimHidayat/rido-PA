<?php 
require 'functions/authUsr/authSis.php';

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $result = loginSis($_POST);
    if ($result) {
        echo "
            <script>
                alert('Login Berhasil!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Login Gagal!');
                document.location.href = 'loginSis.php';
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
                    <h1 class="text-4xl font-semibold mb-4">Login</h1>
                    <p class="deskripsi text-xs">
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
</body>
</html>