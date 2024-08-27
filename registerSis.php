<?php
require 'functions/authUsr/authSis.php';

// cek apakah tombol submit sudah ditekan 
if (isset($_POST["submit"])) {
    // cek apakah data berhasil ditambahkan atau tidak
    // echo registerSis($_POST);    
    if (registerSis($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'loginSis.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan!');
                document.location.href = 'registerSis.php';
            </script>
        ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Siswa</title>
    <link rel="stylesheet" href="style/registervol2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap"
        rel="stylesheet" />
    <!-- cdn tailwind -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
</head>

<body>
    <header>

    </header>
    <main>
        <div class="content">
            <div class="kiri">
                <div class="judul">
                    <h1 class="text-4xl font-semibold mb-4">Register</h1>
                    <p class="deskripsi">
                        Mulai Petualangan Anda Bersama <b>Smartskills!</b>
                    </p>
                </div>
                <form action="" method="post">
                    <div class="inputan">
                        <div class="inputer1">
                            <label for="intansi">Intansi</label>
                            <input type="text" placeholder="Masukan intansi" name="instansi">
                        </div>
                        <div class="inputer2">
                            <div class="nama">
                                <label for="nama">username</label>
                                <input type="text" placeholder="Masukan Username" name="username" required>
                            </div>
                            <div class="nohp">
                                <label for="nohp">No HP</label>
                                <input type="text" name="nohp" placeholder="Masukan No Hp" name="no_hp" required>
                            </div>
                        </div>
                        <div class="inputer3">
                            <div class="email">
                                <label for="email">Email</label>
                                <input type="text" name="email" placeholder="Masukan Email " name="email" required>
                            </div>
                            <div class="tanggal">
                                <label for="tanggal">Tanggal lahir</label>
                                <input type="date" placeholder="Masukan Tanggal Lahir" name="tanggal-lahir" required>
                            </div>
                        </div>
                        <div class="inputer4">
                            <div class="password">
                                <label for="password">Password <span class="absolute ms-4 mt-1 text-xs font-light" id="keteranganPass"></span></label>
                                <input type="password" placeholder="Masukan Password" name="password" id="password" required>
                            </div>
                            <div class="kon-pass">
                                <label for="kon-pass">Konfirmasi Password <span class="absolute ms-4 mt-1 text-xs font-light" id="keteranganKonf"></span></label>
                                <input type="password" placeholder="Konfirmasi Password" name="konf-pass" id="konf-password" required>
                            </div>
                        </div>
                        <div class="kiri-bawah">
                            <div class="tombol">
                                <button type="submit" name="submit" class="text-white font-bold" >Sign Up</button>
                            </div>
                            <div class="button-desk">
                                <p>Already have account? <a href="loginSis.php">Login now</a></p>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="kanan">
                <div class="gambar">
                    <img src="assets/registerSiswa.png" alt="">
                </div>
            </div>
        </div>
    </main>
    <script src="script/validasiPassword.js"></script>
</body>

</html>