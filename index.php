<?php
session_start();

require 'functions/function/selectData.php';
include_once 'includes/judulArtikel.php';
// $id_siswa = $_SESSION["id_siswa"];

if (isset($_SESSION["id_siswa"])) {
    $id_siswa = $_SESSION["id_siswa"];
    $siswa = query("SELECT * FROM siswa WHERE id_siswa = '$id_siswa'")[0];
}

$artikel = query("SELECT * FROM agent AS ag INNER JOIN artikel AS ar ON ar.id_agent = ag.id_agent ORDER BY id_artikel DESC LIMIT 6");



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- navbar style -->
    <link rel="stylesheet" href="style/includes/navbarAg.css">
    <!-- link style -->
    <link rel="stylesheet" href="style/index.css">
    <!-- footer style -->
    <link rel="stylesheet" href="style/includes/footer.css">
    <!-- tailwind -->
    <link rel="stylesheet" href="style/dist/ouput.css">
</head>

<body>
    <?php //include_once "includes/headerAg.php" 
    include_once "includes/navbarAg.php"
        ?>
    <main class="mb-5">
        <section class="hero-container">
            <div>
                <div>
                    <h1>Ayo jalankan aplikasi penyedia informasi ini dengan mudah!
                    </h1>
                    <!-- <p>why learn how to blog?</p> -->
                </div>
            </div>
            <img src="assets/sapahome.png" alt="hero">
        </section>
        <div class="flex justify-center text-2xl font-semibold my-5" id="Service">
            <h2>Service</h2>
        </div>
        <section class="description-container flex flex-row justify-around">
            <div class="w-1/3 flex flex-col justify-center gap-5">
                <h2 class="text-xl font-semibold"> Konsultasi</h2>
                <p class="text-sm">Yuk, jadwalkan konsultasi sekarang! Bersama-sama, kita akan membahas potensi,
                    tantangan,
                    dan rencana masa depan. mari buat langkah pertama menuju perubahan positif. Saya siap membantu Anda
                    mencapai tujuan. Ayo mulai konsultasi sekarang!</p>
            </div>
            <div class="">
                <img src="assets/desc.png" alt="desc">
            </div>
        </section>

        <div class="flex justify-center flex-col w-full mt-5">
            <div class="flex justify-center text-2xl font-semibold my-5" id="Informasi">
                <h2>Informasi</h2>
            </div>
            <div class="flex justify-center items-center flex-wrap gap-5" style="width: 80%; margin: 0 auto;"
                id="card-content">

                <?php foreach ($artikel as $art): ?>
                    <!-- card -->
                    <div class="relative" id="card">
                        <div class="rounded overflow-hidden shadow-lg" style="max-width: 300px">
                            <img class="w-full" src="assets/fotoUploads/<?=$art['foto']?>" alt="Sunset in the mountains">
                            <div class="px-6 py-4">
                                <div class="px-1 py-1 bg-purple-100 inline-block text-xs font-medium text-purple-950">
                                    <?= $art['kategori'] ?></div>
                                <div class="font-bold text-lg mb-4">
                                    <?= limitText(40, $art['judul']) ?>
                                </div>
                                <div class="px-1 py-1 bg-purple-100 inline-block text-xs font-bold text-purple-900">
                                    <?= $formatted_date = date('d F Y', strtotime($art['tgl_membuat'])) ?></div>
                            </div>
                            <div class="flex justify-between items-center px-6 py-4 border-t border-gray-300 shadow-md">
                                <div class="font-bold text-md">
                                    <?= $art['nama_agent'] ?>
                                </div>
                                <img class="open-option" src="assets/icon/DotsThree.png" alt="">
                                <div class="option-card absolute flex flex-col bg-white border shadow-md font-medium">
                                    <a href="detailArticle.php?id_artikel=<?= $art['id_artikel'] ?>">View Details</a>
                                    <!-- <a href="">Edit Course</a>
                                    <a href="">Delete Course</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>

        <div class="flex justify-center text-2xl font-semibold my-5 mt-8" id="Agent">
            <h2>Agent</h2>
        </div>

        <section class="description-agent flex flex-row justify-around">
            <div class="w-1/3 flex flex-col justify-center gap-5">
                <h2 class="text-xl font-semibold"> Apa Itu Agent? </h2>
                <p class="text-sm">Tingkatkan performa dan keberhasilan tim bersama! Ayo bergabung menjadi agent untuk
                    terlibat dalam sesi kolaboratif yang akan memperkuat keterampilan dan memunculkan inovasi.</p>

                <a href="kategoriuser.php" class="button-agent">
                    Mulai Menjadi agent
                </a>
            </div>
            <div class="">
                <img src="assets/agent1.png" alt="desc">
            </div>
        </section>

    </main>

    <?php
    include_once 'includes/footer.php';
    ?>
    <!--  -->

</body>

</html>