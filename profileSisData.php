<?php
require 'functions/authUsr/authSis.php';
require 'functions/function/selectData.php';



if (!isset($_SESSION["id_siswa"])) {
    header("Location: loginSis.php");
    exit;
}
$id_siswa = $_SESSION["id_siswa"];
$siswa = query("SELECT * FROM siswa WHERE id_siswa = '$id_siswa'")[0];

if (isset($_POST['submit'])) {
    if (profileSisData($_POST) > 0) {
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
                        window.location.href = 'profileSisData.php';
                    }, 2000);
                    
                });
            </script>
        ";
    } elseif (profileSisData($_POST) == 0) {
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
    <?php include_once 'includes/navbarAg.php'; ?>
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
                            <p class="text-xl font-semibold"><?= $formatted_date = date('d F Y', strtotime($siswa['tanggal_lahir'])) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- form Nama Lengkap Username Email NoHp -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="content mt-8 flex">
                <div class="basis-1/4 flex flex-col gap-3 py-4 items-center font-semibold text-slate-500"
                    id="pilihan-profil">
                    <div class="flex flex-col gap-3">

                        <div class="mt-2">
                            <a href="profileSis.php" class="flex items-center gap-3">
                                <img src="assets/icon/profile2.png" alt="">
                                <p class="">Profile</p>
                            </a>

                        </div>
                        <div class="">
                            <a href="profileSisData.php" class="flex items-center gap-3">
                                <img src="assets/icon/profileCheck2.png" alt="">
                                <p class="text-slate-900">Data Diri</p>
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

                <div class="basis-1/2 flex flex-col px-12" id="identitas-profil">
                    <p class="text-2xl font-bold pt-2 pb-4">Data Diri</p>
                    <div class="inputan">
                        <div class="inputer1">
                            <label for="nohp">No Telepon</label><br>
                            <input type="text" placeholder="No Telepon" name="nohp" value="<?= $siswa['no_hp'] ?>"
                                required>
                        </div>
                        <div class="inputer2">
                            <label for="kota">Kota/Kabupaten</label> <br>
                            <input type="text" placeholder="Kota/Kabupaten" name="kota" value="<?= $siswa['kota'] ?>"
                                required>
                        </div>
                        <div class="inputer3">

                            <label for="tempat-lahir">Tempat Lahir</label> <br>
                            <input type="text" name="tempat-lahir" placeholder="Tempat Lahir"
                                value="<?= $siswa['tempat_lahir'] ?>" required>

                        </div>
                        <div class="inputer5" id="data-diri">
                            <!-- menampilkan tanggal lahir dan radio button jenis kelamin -->
                            <div class="tanggal-lahir">
                                <label for="tanggal-lahir">Tanggal Lahir</label> <br>
                                <input type="date" name="tanggal-lahir" class="tgl" value="<?= $siswa['tanggal_lahir'] ?>"
                                    required>
                            </div>

                            <div class="jenis-kelamin">
                                <label for="jenis-kelamin">Jenis Kelamin</label>
                                <?php if ($siswa['jk'] == 'laki-laki'): ?>
                                    <div class="position">
                                        <input type="radio" name="jenis-kelamin" value="laki-laki" checked required> Laki-laki
                                    </div>
                                    <div class="position">
                                        <input type="radio" name="jenis-kelamin" value="perempuan" required> Perempuan
                                    </div>
                                    <div class="position">
                                        <input type="radio" name="jenis-kelamin" value="disamarkan" required> memilih tidak
                                        disebutkan
                                    </div>
                                <?php elseif ($siswa['jk'] == 'perempuan'): ?>
                                    <div class="position">
                                        <input type="radio" name="jenis-kelamin" value="laki-laki" required> Laki-laki
                                    </div>
                                    <div class="position">
                                        <input type="radio" name="jenis-kelamin" value="perempuan" checked required>
                                        Perempuan
                                    </div>
                                    <div class="position">
                                        <input type="radio" name="jenis-kelamin" value="disamarkan" required> memilih tidak
                                        disebutkan
                                    </div>
                                <?php elseif ($siswa['jk'] == 'disamarkan'): ?>
                                    <div class="position">
                                        <input type="radio" name="jenis-kelamin" value="laki-laki" required> Laki-laki
                                    </div>
                                    <div class="position">
                                        <input type="radio" name="jenis-kelamin" value="perempuan" required> Perempuan
                                    </div>
                                    <div class="position">
                                        <input type="radio" name="jenis-kelamin" value="disamarkan" checked required> memilih tidak
                                        disebutkan
                                    </div>
                                <?php else: ?>
                                    <div class="position">
                                        <input type="radio" name="jenis-kelamin" value="laki-laki" required> Laki-laki
                                    </div>
                                    <div class="position">
                                        <input type="radio" name="jenis-kelamin" value="perempuan" required> Perempuan
                                    </div>
                                    <div class="position">
                                        <input type="radio" name="jenis-kelamin" value="no" required> memilih tidak
                                        disebutkan
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="inputer4">
                            <div class="institusi">
                                <label for="institusi">Institusi saat ini</label> <br>
                                <input type="text" name="institusi" placeholder="Masukan Institusi " name="institusi"
                                    value="<?= $siswa['instansi'] ?>" required>
                            </div>
                        </div>
                        <div class="kiri-bawah">
                            <div class="tombol">
                                <button type="submit" name="submit" class="text-white font-bold px-8" style="background-color: #272a40;">Simpan
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
</body>

</html>