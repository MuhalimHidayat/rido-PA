<?php
require_once "functions/function/selectData.php";
include_once "includes/judulArtikel.php";

$artikel = query("SELECT * FROM agent INNER JOIN artikel ON agent.id_agent = artikel.id_agent");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/includes/navbarAg.css" />
    <!-- link css -->
    <link rel="stylesheet" href="style/viewInformations.css">

    <!-- footer style -->
    <link rel="stylesheet" href="style/includes/footer.css">
    <!-- tailwind -->
    <!-- <link rel="stylesheet" href="style/dist/ouput.css">
      -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <title>Informasi</title>
</head>

<body>
    <?php //include_once "includes/headerAg.php" 
    include_once "includes/navbarAg.php"
    ?>
    <main>
        <p class="text-center text-3xl font-semibold my-5">Informasi</p>
        <div>
            <!-- input button -->
            <div class="flex flex-wrap justify-center w-full mb-8">
                <div class="flex flex-col w-1/3">
                    <label for="keyword" class="mb-1 text-md text-slate-700">Search :</label>

                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="keyword"
                            class="block w-full p-2 py-2 ps-14 text-lg text-gray-900 border border-gray-300 bg-gray-100 rounded-md"
                            placeholder="Cari Informasi...." />
                    </div>
                </div>
            </div>

            <!-- card-content -->
            <!-- card content -->
            <div class="flex justify-center w-full">
                <div class="flex p-8 justify-center flex-wrap gap-5" id="table-content">
                    <!-- jika tidak ada artikel sama sekali -->
                    <?php if (empty($artikel)) : ?>
                        <div class="flex justify-center items-center flex-col gap-2">
                            <img class="w-2/5" src="assets/empty_artikel.png" alt="empty-article">
                            <p class="text-center text-lg font-semibold">Artikel Belum Tersedia :
                            </p>
                            <p class="text-center text-md text-slate-700 ">Bagikan wawasan Anda tentang teknologi informasi<span style="display: block;">
                                    melalui artikel yang menarik dan informatif.</span></p>
                        </div>
                    <?php endif; ?>


                    <?php foreach ($artikel as $art): ?>
                        <!-- card -->
                        <div class="relative" id="card">
                            <div class="rounded overflow-hidden shadow-lg" style="max-width: 300px">
                                <img class="w-full" src="assets/fotoUploads/<?= $art['foto'] ?>" alt="Sunset in the mountains">
                                <div class="px-6 py-4">
                                    <div class="px-1 py-1 bg-purple-100 inline-block text-xs font-medium text-purple-950"><?= strtoupper($art['kategori']) ?></div>
                                    <div class="font-bold text-lg mb-4"><?= limitText(40, $art['judul']) ?> </div>
                                    <div class="px-1 py-1 bg-purple-100 inline-block text-xs font-bold text-purple-900"><?= date('d F Y', strtotime($art['tgl_membuat'])) ?></div>
                                </div>
                                <div class="flex justify-between items-center px-6 py-4 border-t border-gray-300 shadow-md">
                                    <div class="font-bold text-xl">
                                        <?= $art['username']?>
                                    </div>
                                    <img class="open-option" src="assets/icon/DotsThree.png" alt="">
                                    <div class="option-card absolute flex flex-col bg-white border shadow-md font-medium">
                                        <a href="detailArticle.php?id_artikel=<?= $art['id_artikel'] ?>">View Details</a>
                                        <!-- <a href="">Edit Article</a>
                                        <a href="" onclick="return confirm('Do you really want to delete this article?')">Delete Article</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>


        </div>

    </main>

    <?php include_once 'includes/footer.php'?>

    <script src="script/search.js">

    </script>

</body>

</html>