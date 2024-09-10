<?php
session_start();
require __DIR__ . "/functions/function/selectData.php";
include_once 'includes/judulArtikel.php';

$id_agentt = $_GET['id_agent'];


$agentt = query("SELECT * FROM agent WHERE id_agent = $id_agentt")[0];
$sosmed = query("SELECT * FROM sosmed WHERE id_agent = $id_agentt")[0];
$artikel = query("SELECT * FROM agent AS ar INNER JOIN artikel AS ag ON ar.id_agent=ag.id_agent
                WHERE ar.id_agent = $id_agentt LIMIT 4 ");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  -->
    <link rel="stylesheet" href="style/viewAgent.css">
    <link rel="stylesheet" href="style/includes/navbarAg.css" />
    <!-- tailwind -->
    <link rel="stylesheet" href="style/dist/ouput.css">

    <!-- cdn tailwind -->
    <!-- <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <title>View Agent Profile</title>
</head>

<body>
    <?php include_once "includes/navbarAg.php" ?>
    <main>
        <div class="jumbotron">

        </div>
        <!-- content -->
        <div class="header-content">

            <div class="flex flex-row items-center gap-5 p-5">
                <img class="img-profile" src="assets/fotoUploads/<?= $agentt['foto'] ?>" alt="">
                <div>
                    <h1 class="text-4xl font-bold mb-3"><?=($agentt['nama_agent'] == " ") ? $agentt['username'] : $agentt['nama_agent'] ?> </h1>
                    <p class="text-slate-700 text-lg"><?= $agentt['title'] ?></p>
                </div>
            </div>
            <div class="flex flex-row gap-3 p-5">
                <a href="<?= ($sosmed['fb'] == '') ? "#" : $sosmed['fb'] ?>">
                    <img src="assets/icon/fbc.png" alt="" class="bg-gray-100 hover:bg-gray-50 p-4">
                </a>
                <a href="<?= ($sosmed['twitter'] == '') ? "#" : $sosmed['twitter'] ?>">
                    <img src="assets/icon/twc.png" alt="" class="bg-gray-100 hover:bg-gray-50 p-4">
                </a>
                <a href="<?= ($sosmed['ig'] == '') ? '#' : $sosmed['ig'] ?>">
                    <img src="assets/icon/igc.png" alt="" class="bg-gray-100 hover:bg-gray-50 p-4">
                </a>
                <a href="<?= ($sosmed['yt'] == '') ? "#" : $sosmed['yt'] ?>">
                    <img src="assets/icon/ytc.png" alt="" class="bg-gray-100 hover:bg-gray-50 p-4">
                </a>
                <a href="<?= ($sosmed['wa'] == '') ? "#" : $sosmed['wa'] ?>">
                    <img src="assets/icon/wac.png" alt="" class="bg-gray-100 hover:bg-gray-50 p-4">
                </a>
            </div>
        </div>

        <!-- maincontent -->
        <div class="main-content flex flex-row">
            <div class="main-content-left border border-gray p-5" style="height: 420px;">
                <p class="text-2xl text-slate-900 font-semibold my-3">About Me</p>
                <p class="text-sm text-slate-700 my-1 text-justify"><?= $agentt['biography'] ?></p>
            </div>
            <div class="main-content-right px-5">
                <div class="mt-8 mb-4">
                    <span class="font-semibold text-lg px-8 pb-2 border-b-2 border-orange-500">Article</span>
                </div>
                <p class="text-3xl text-slate-900 font-semibold my-3"><?= $agentt['username'] ?>'s <span
                        class="text-2xl">Article</span></p>
                <div class="flex flex-row flex-wrap justify-around gap-5 mt-8" id="card-content">
                    <?php foreach ($artikel as $art): ?>
                        <div class="relative" id="card">
                            <div class="rounded overflow-hidden shadow-lg" style="max-width: 300px">
                                <img class="w-full" src="assets/fotoUploads/<?= $art['foto'] ?>"
                                    alt="Sunset in the mountains">
                                <div class="px-6 py-4">
                                    <div class="px-1 py-1 bg-purple-100 inline-block text-xs font-medium text-purple-950">
                                        <?= $art['kategori'] ?>
                                    </div>
                                    <div class="font-bold text-lg mb-4">
                                        <?= limitText(40, $art['judul']) ?>
                                    </div>
                                    <div class="px-1 py-1 bg-purple-100 inline-block text-xs font-bold text-purple-900">
                                        <?= $formatted_date = date('d F Y', strtotime($art['tgl_membuat'])) ?>
                                    </div>
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
        </div>
    </main>

    <footer class="flex flex-col justify-between items-center bg-gray-800 text-gray-500">
        <div class="flex flex-col justify-center items-center" id="footer-top">
            <div class="flex flex-col gap-5 p-5">
                <p class="text-3xl font-semibold text-white">Smartskills</p>
                <p>Aliquam rhoncus ligula est, non pulvinar elit <br>
                    convallis nec. Donec mattis odio at.</p>
                <div class="medsos flex items-center gap-5">
                    <a href=""><img src="assets/icon/fbw.png" alt=""></a>
                    <a href=""><img src="assets/icon/Instragarm.png" alt=""></a>
                    <a class="linkedin" href=""><img src="assets/icon/ld.png" alt=""></a>
                    <a href=""><img src="assets/icon/tww.png" alt=""></a>
                    <a href=""><img src="assets/icon/Youtube.png" alt=""></a>
                </div>
            </div>
        </div>
        <div class="w-full p-5 border-t border-gray-500">
            <!-- <div class=""> -->
            <p class="text-center">&copy; 2024 - Designed by Smartskills. All rights reserved.</p>
            <!-- </div> -->
        </div>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>

</html>