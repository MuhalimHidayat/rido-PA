<?php
session_start();
require_once "functions/function/selectData.php";
include_once "includes/judulArtikel.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/includes/navbarAg.css">
    <link rel="stylesheet" href="style/becomeAgent.css">
    <!-- tailwind -->
    <link rel="stylesheet" href="style/dist/ouput.css">
</head>

<body>
    <?php //include_once "includes/headerAg.php" 
    include_once "includes/navbarAg.php"    
    ?>
    <main>
        <div class="text-center py-5 " id="main-header">
            <h1 class="text-2xl font-semibold mb-3">Agent</h1>
            <p class="text-sm ">Home \ <span class="font-semibold">Menjadi Agent</span></p>
        </div>
        <div class="main1">
            <div class="agent">
                <div class="agent-desc">
                    <h1 class="text-slate-900 text-5xl">Ayo bergabung menjadi Agent</h1>
                    <p class="text-slate-700">Agent Agent adalah individu yang berperan penting dalam menyebarluaskan informasi seputar Teknologi Informasi dan Komunikasi (TIK) kepada siswa.</p>
                </div>
                <a href="loginAg.php">
                    Mulai Menjadi Agent
                </a>
            </div>
            <div class="beAgentImg">
                <img class="imgAgent" src="assets/imageBeAgent.png" alt="">

            </div>
        </div>

        <div class="main2 w-full flex flex-col justify-center items-center">
            <h1 class="text-center text-2xl font-semibold text-slate-900">Peran Utama Agent</h1>
            <div class="my-5" id="card-wrapper">
                <div class="flex justify-center gap-8">
                    <!-- card1 -->
                    <div class="card flex flex-col justify-center items-center bg-white p-5 gap-5">
                        <img class="p-4 bg-purple-200" src="assets/icon/peran1.png" alt="">
                        <h2 class="text-lg font-semibold">1. Penyebaran Informasi TIK</h2>
                        <p class="text-sm text-slate-700  text-center">Mengedukasi siswa mengenai perkembangan terbaru di bidang teknologi informasi. Ini meliputi penggunaan perangkat lunak, dll</p>
                    </div>
                    <!-- card2 -->
                    <div class="card flex flex-col justify-center items-center bg-white p-5 gap-5">
                        <img class="p-4 bg-orange-100" src="assets/icon/peran2.png" alt="">
                        <h2 class="text-lg font-semibold">2. Pendukung Literasi Digital</h2>
                        <p class="text-sm text-slate-700  text-center">Membantu siswa mengembangkan kemampuan literasi digital yang mencakup keterampilan dalam menggunakan teknologi dengan bijak dan produktif.</p>
                    </div>
                    <!-- card3 -->
                    <div class="card flex flex-col justify-center items-center bg-white p-5 gap-5">
                        <img class="p-4 bg-orange-100" src="assets/icon/peran3.png" alt="">
                        <h2 class="text-lg font-semibold">3. Pembimbing Siswa</h2>
                        <p class="text-sm text-slate-700  text-center">Membantu siswa dalam memahami dan mengaplikasikan ilmu TIK dalam kehidupan sehari-hari maupun dalam pembelajaran mereka.</p>
                    </div>
                </div>

            </div>
        </div>
        <div class="main3 flex justify-center">
            <div class="flex flex-row justify-center items-center gap-5 p-5 py-10 w-4/5">
                <div class="basis-1/2">
                    <h1 class="text-4xl font-semibold">Mengapa Peran Agent Penting?</h1>
                    <p class="text-slate-700 mt-5">Perkembangan teknologi yang pesat membuat pengetahuan dan keterampilan TIK menjadi hal yang krusial bagi setiap siswa. Dengan adanya Agent, siswa tidak hanya mendapatkan informasi terkini, tetapi juga panduan langsung yang dapat membantu mereka menavigasi dunia digital dengan lebih percaya diri dan efektif.</p>
                </div>
                <div class="basis-1/2">
                    <img src="assets/Union.png" alt="">
                </div>
            </div>
        </div>
    </main>

    <?php include_once "includes/footerAg.php" ?>

</body>

</html>