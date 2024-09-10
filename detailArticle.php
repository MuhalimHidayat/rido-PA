<?php
session_start();

require_once "functions/function/selectData.php";
require_once "includes/judulArtikel.php";
$id_artikel = $_GET['id_artikel'];

$artikel = query("SELECT ag.id_agent, ag.nama_agent, ag.username ,ag.foto AS agent_foto, ar.id_artikel, ar.judul, ar.kategori, ar.artikel, ar.header1, ar.artikel1, ar.header2, ar.artikel2, ar.tgl_membuat, ar.foto AS artikel_foto FROM agent AS ag CROSS JOIN artikel AS ar ON ar.id_agent = ag.id_agent WHERE ar.id_artikel='$id_artikel'")[0];

// $foto_agent = query("SELECT foto FROM agent WHERE id_agent = '$artikel[id_agent]'")[0];
// var_dump($foto_agent);
// exit;

// $related_artikel = query("SELECT * FROM artikel WHERE kategori = '$artikel[kategori]' AND id_artikel != '$id_artikel' LIMIT 2");
$related_artikel = query("SELECT ag.id_agent, ag.nama_agent, ag.username ,ag.foto AS agent_foto, ar.id_artikel, ar.judul, ar.kategori, ar.artikel, ar.tgl_membuat, ar.foto AS artikel_foto FROM agent AS ag CROSS JOIN artikel AS ar ON ar.id_agent = ag.id_agent WHERE id_artikel != '$id_artikel' LIMIT 8");

// var_dump($related_artikel);
// exit;

// exit;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/includes/navbarAg.css" />
    <!-- link css -->
    <link rel="stylesheet" href="style/detailArticle.css">
    <!-- tailwind -->
    <!-- <link rel="stylesheet" href="style/dist/ouput.css">
      -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <title>View Article</title>
</head>

<body>
    <?php include_once "includes/navbarAg.php" ?>

    <main>
        <div class="foto w-4/5">
            <!-- <img src="assets/fotoUploads/fotoArticle.png" alt=""> -->
            <img src="assets/fotoUploads/<?= $artikel['artikel_foto'] ?>" alt="">
        </div>
        <div class="main-content ">
            <h1 class="judul text-3xl text-center font-bold text-blue-800 mb-3"><?= $artikel['judul'] ?> </h1>

            <div class="artikel my-5">
                <h3 class=" my-3 text-xl font-bold text-blue-800 "><?= $artikel['header1'] ?></h3>
                <p class="text-slate-900 text-justify"><?= $artikel['artikel'] ?></p>
            </div>


            <div class="artikel my-5">
                <h3 class=" my-3 text-xl font-bold text-blue-800 "><?= $artikel['header2'] ?></h3>
                <p class="text-slate-900 text-justify"><?= $artikel['artikel1'] ?></p>
                <p class="text-slate-900 text-justify"><?= $artikel['artikel2'] ?></p>
            </div>

            <div class="penulis">
                <a href="viewAgent.php?id_agent=<?=$artikel['id_agent']?>" class="flex  gap-5">

                    <img src="assets/fotoUploads/<?= $artikel['agent_foto'] ?>" alt="" style="width: 50px; height: 50px; object-fit:cover;">
                    <div>
                        <p class="text-sm text-slate-600"><i>writen by</i></p>
                        <p><?=($artikel['nama_agent'] == " ") ? $artikel['username'] : $artikel['nama_agent'] ?></p>
                    </div>
                </a>
            </div>

        </div>

        <div class="related-blog">
            <div class="content-related-blog">
                <h3 class="my-5 text-2xl font-semibold">Related Blog</h3>
                <div class="mt-5 px-8 pb-2 flex flex-row flex-wrap justify-center gap-5 w-full"  >
                    <!-- <div class=""> -->
                        <!-- card -->
                        <?php foreach ($related_artikel as $value): ?>
                            <div class="card flex flex-col justify-center bg-white p-3 gap-5 " style="width: 30%">
                                <img class="p-4" src="assets/fotoUploads/<?= $value['artikel_foto'] ?>" alt="">
                                <h2 class="ms-3 text-lg font-semibold"><?= limitText(30, $value['judul']) ?></h2>
                                <div class="flex items-center ps-3 gap-3">
                                    <img class="rounded-full" style="object-fit: cover; width: 45px; height: 45px;" src="assets/fotoUploads/<?= $value['agent_foto']?>" alt="" style="width: 40px; height: 40px;">
                                    <p><?=($value['nama_agent'] == " ") ? $value['username'] : $value['nama_agent'] ?></p>
                                </div>
                                <p class="ms-3 text-sm text-slate-700"><?= limitText(100, $value['artikel'])?></p>
    
                                <p class="mt-7 mb-3 ms-3 text-sm hover:text-slate-700 underline decoration-sky-500"><a href="detailArticle.php?id_artikel=<?= $value['id_artikel'] ?>">Read More</a></p>
                            </div>
                        <?php endforeach; ?>
                    <!-- </div> -->

                    

                </div>
            </div>
        </div>
    </main>

    <footer>

    </footer>

</body>

</html>