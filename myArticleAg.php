<?php
session_start();
require __DIR__ . "/functions/function/selectData.php";
$id_agent = $_SESSION['id_agent'];
$agent = query("SELECT * FROM agent WHERE id_agent = '$id_agent'")[0];

if (!isset($_SESSION['id_agent'])) {
    header("Location: loginAg.php");
    exit;
}

// mengambil data artikel berdasarkan agent 
// $artikel = query("SELECT * FROM artikel WHERE id_agent = '$id_agent'");
$artikel = query("SELECT * FROM agent INNER JOIN artikel ON agent.id_agent=artikel.id_agent WHERE agent.id_agent = '$id_agent'");
// var_dump($artikel); // the result is array(0) { }


// Lokasi Halaman
$page_location = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$file_name = basename(__FILE__);
if (strpos($page_location, $file_name) !== false) {
    $page_location = "My Article";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/myArticleAg.css">
    <link rel="stylesheet" href="style/includes/sidebar.css">
    <!-- cdn tailwind -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries">
    </script>

    <title>My Article Agent</title>
</head>

<body>
    <!-- <div class="container w-100"> -->
    <div class="flex flex-row">
        <!-- sidebar -->
        <?php include_once 'includes/sidebarAg.php'; ?>
        <!-- endsidebar -->

        <!-- content -->
        <div class="content-account">
            <!-- upper content -->
            <?php include_once 'includes/upperContentAg.php'; ?>
            <!-- endupper content -->

            <!-- main content -->
            <div class="mt-5" id="main-content">
                <!-- search button with search icon inside-->
                <div class="flex flex-col justify-center ">

                    <!-- input button -->
                    <div class="flex justify-center w-full mb-8">
                        <div class="flex flex-col w-3/5">

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
                                    placeholder="Search in your courses..." required />
                            </div>
                        </div>
                    </div>

                    <!-- card content -->
                    <div class="flex justify-center w-full">
                        <div class="flex justify-center flex-wrap gap-5" id="table-content">
                            <!-- jika array artikel sama dengan kosong -->
                            <?php if (empty($artikel)) : ?>
                                <div class="flex justify-center items-center flex-col gap-2">
                                    <img class="w-2/5" src="assets/empty_artikel.png" alt="empty-article">
                                    <p class="text-center text-lg font-semibold">Artikel Belum Tersedia :
                                    </p>
                                    <p class="text-center text-md text-slate-700 ">Bagikan wawasan Anda tentang teknologi informasi<span style="display: block;">
                                            melalui artikel yang menarik dan informatif.</span></p>
                                </div>
                            <?php endif; ?>
                            <!-- card -->
                            <?php foreach ($artikel as $value): ?>
                                <div class="relative" id="card">
                                    <div class="rounded overflow-hidden shadow-lg" style="max-width: 300px">
                                        <img class="w-full" src="assets/fotoUploads/<?= $value['foto'] ?>" alt="Sunset in the mountains">
                                        <div class="px-6 py-4">
                                            <div class="px-1 py-1 bg-purple-100 inline-block text-xs font-medium text-purple-950"><?= strtoupper($value['kategori']) ?></div>
                                            <div class="font-bold text-lg mb-4"><?php
                                                                                $artikel_judul = $value['judul'];
                                                                                $maxLength = 40;
                                                                                if (strlen($artikel_judul) > $maxLength) {
                                                                                    $artikel_judul = substr($artikel_judul, 0, $maxLength) . '...';
                                                                                }
                                                                                echo $artikel_judul;
                                                                                ?> </div>
                                            <div class="px-1 py-1 bg-purple-100 inline-block text-xs font-bold text-purple-900"><?= date('d F Y', strtotime($value['tgl_membuat'])) ?></div>
                                        </div>
                                        <div class="flex justify-between items-center px-6 py-4 border-t border-gray-300 shadow-md">
                                            <div class="font-bold text-lg">
                                                <?= $value['nama_agent'] ?>
                                            </div>
                                            <img class="open-option" src="assets/icon/DotsThree.png" alt="">
                                            <div class="option-card absolute flex flex-col bg-white border shadow-md font-medium">
                                                <a href="detailArticle.php?id_artikel=<?= $value['id_artikel'] ?>">View Details</a>
                                                <a href="createArticleAg.php?id_artikel=<?= $value['id_artikel'] ?>">Edit Article</a>
                                                <a href="functions/article/delete.php?id_artikel=<?= $value['id_artikel'] ?>" onclick="return confirm('Do you really want to delete this article?')">Delete Article</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>


                        </div>
                    </div>
                </div>
                <footer class="pt-3 mt-8 relative bottom-0 ">
                    <p class="text-sm text-slate-600">&copy;2024- Designed by <b>SmartSkills.</b> All rights reserved.</p>
                </footer>
            </div>
            <!-- endmain content -->
        </div>
        <!-- endcontent -->
    </div>
    <!-- </div> -->

    <script src="script/search.js">
    </script>

</body>

</html>