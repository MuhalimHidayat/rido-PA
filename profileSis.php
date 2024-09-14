<?php
require 'functions/authUsr/authSis.php';
require 'functions/function/selectData.php';

if (!isset($_SESSION["id_siswa"])) {
    header("Location: loginSis.php");
    exit;
}
$id_siswa = $_SESSION["id_siswa"];
$siswa = query("SELECT * FROM siswa WHERE id_siswa = '$id_siswa'")[0];

if (isset($_POST["submit"])) {
    if (profileSis($_POST) > 0) {
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
                    title: 'Data berhasil diubah!'
                    });    

                    setTimeout(() => {
                        window.location.href = 'profileSis.php';
                    }, 2000);
                    
                });
            </script>
        ";
    } elseif (profileSis($_POST) == 0) {
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
                    icon: 'info',
                    title: 'Data tidak diubah!'
                    });    
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
                    title: 'Data gagal diubah!'
                    });    
                    
                });
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
    <title>Document</title>
    <link rel="stylesheet" href="style/profileSis.css">
    <!-- style navbar -->
    <link rel="stylesheet" href="style/includes/navbarAg.css">
    <!-- style footer -->
    <link rel="stylesheet" href="style/includes/footer.css">
    <!-- tailwind cdn -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries">
    </script>
   
</head>

<body>
    <?php //include_once "includes/headerAg.php" 
    include_once "includes/navbarAg.php"
        ?>
    <main class="mb-5">
        <div class="content">
            <div class="jumbutron">
                <div class="gambar-prof">
                    <img src="assets/fotoUploads/<?= $siswa['foto'] ?>" alt="">
                </div>
                <div class="wrap-1 flex flex-col gap-3">
                    <div class="sapa">
                        <p class="text-2xl font-semibold text-slate-500">Selamat Datang,</p>
                    </div>
                    <div class="nama-user">
                        <h3 class="text-4xl font-semibold"><?= $siswa['username'] ?></h3>
                    </div>
                    <div class="wrap-2">
                        <div class="status-prof">
                            <p class="text-xl font-semibold">Siswa</p>
                        </div>
                        <div class="asal">
                            <p class="text-xl font-semibold">
                                <?= $formatted_date = date('d F Y', strtotime($siswa['tanggal_lahir'])) ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- form Nama Lengkap Username Email NoHp -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="content mt-8 flex">
                <div class="basis-1/4 flex flex-col gap-3 py-4 items-center font-semibold text-slate-500 "
                    id="pilihan-profil">
                    <div class="flex flex-col gap-3">

                        <div class="mt-2">
                            <a href="profileSis.php" class="flex items-center gap-3">
                                <img src="assets/icon/profil.png" alt="">
                                <p class="text-slate-900">Profile</p>
                            </a>

                        </div>
                        <div class="">
                            <a href="profileSisData.php" class="flex items-center gap-3">
                                <img src="assets/icon/profileCheck.png" alt="">
                                <p class="">Data Diri</p>
                            </a>
                        </div>
                        <div class="text-red-500">
                            <a href="functions/function/logoutSis.php" class="flex items-center gap-3">
                                <img src="assets/icon/logout.png" alt="">
                                <p>Keluar</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="basis-1/3 flex justify-around gap-3 py-5" id="gambar-profil">
                    <div class="basis-1/3 flex flex-col items-center gap-3 ">
                        <div class="gambar-prof">
                            <img src="assets/fotoUploads/<?= $siswa['foto'] ?>" alt="" id="gam_settings">
                        </div>
                        <div class="pilihfoto-button mt-2 bg-red-300">
                            <label for="avatar"
                                class=" text-white font-semibold text-sm rounded-lg px-5 py-2 cursor-pointer">Pilih
                                Foto</label>
                            <input class="hidden" type="file" id="avatar" name="foto" accept="image/png, image/jpeg">
                            <input type="hidden" name="foto_lama" value="<?= $siswa['foto'] ?>">
                        </div>
                    </div>
                    <div class="basis-2/3 pt-5">
                        <p><small>Gambar Profile Anda sebaiknya memiliki rasio 1:1 dan berukuran tidak lebih dari
                                2MB.</small></p>
                    </div>
                </div>
                <div class="basis-1/2 flex flex-col px-12" id="identitas-profil">
                    <p class="text-2xl font-semibold pt-2 pb-4">Profile</p>
                    <div class="inputan">
                        <div class="inputer1">
                            <label for="nama">Nama Lengkap</label><br>
                            <input type="text" placeholder="Nama Lengkap" name="nama_siswa"
                                value="<?= $siswa['nama_siswa'] ?>" required>
                        </div>
                        <div class="inputer2">
                            <label for="username">Username</label> <br>
                            <input type="text" placeholder="Username" name="username" value="<?= $siswa['username'] ?>"
                                required>
                        </div>
                        <div class="inputer3">
                            <div class="nohp">
                                <label for="nohp">No HP</label> <br>
                                <input type="text" name="nohp" placeholder="Masukan No Hp" name="nohp"
                                    value="<?= $siswa['no_hp'] ?>" required>
                            </div>
                        </div>
                        <div class="inputer4">
                            <div class="email">
                                <label for="email">Email</label> <br>
                                <input type="text" name="email" placeholder="Masukan Email " name="email"
                                    value="<?= $siswa['email'] ?>" required>
                                <input type="hidden" name="emailLama" value="<?= $siswa['email'] ?>">
                            </div>
                        </div>
                        <div class="kiri-bawah">
                            <div class="tombol">
                                <button type="submit" name="submit" class="text-white font-bold px-8"
                                    style="background-color: #272a40;">Simpan
                                    Perubahan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <?php
    include_once 'includes/footer.php';
    ?>

    <script src="script/gantiGambar.js"></script>
</body>

</html>