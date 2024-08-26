<?php
session_start();
require __DIR__ . "/functions/function/selectData.php";

$id_agent = $_SESSION['id_agent'];
if (!isset($id_agent)) {
    header('Location: loginAg.php');
    exit;
}

$agent = query("SELECT * FROM agent WHERE id_agent = $id_agent")[0];
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
                <img class="img-profile" src="assets/fotoUploads/<?= $agent['foto'] ?>" alt="">
                <div>
                    <h1 class="text-4xl font-bold mb-3">Marlo</h1>
                    <p class="text-slate-700 text-lg">Web Designer & Best-Selling Instructor</p>
                </div>
            </div>
            <div class="flex flex-row gap-3 p-5">
                <a href="">
                    <img src="assets/icon/fbc.png" alt="" class="bg-gray-100 hover:bg-gray-50 p-4">
                </a>
                <a href="">
                    <img src="assets/icon/twc.png" alt="" class="bg-gray-100 hover:bg-gray-50 p-4">
                </a>
                <a href="">
                    <img src="assets/icon/igc.png" alt="" class="bg-gray-100 hover:bg-gray-50 p-4">
                </a>
                <a href="">
                    <img src="assets/icon/ytc.png" alt="" class="bg-gray-100 hover:bg-gray-50 p-4">
                </a>
                <a href="">
                    <img src="assets/icon/wac.png" alt="" class="bg-gray-100 hover:bg-gray-50 p-4">
                </a>
            </div>
        </div>

        <!-- maincontent -->
        <div class="main-content flex flex-row">
            <div class="main-content-left border border-gray p-5" style="height: 420px;">
                <p class="text-2xl text-slate-900 font-semibold my-3">About Me</p>
                <p class="text-sm text-slate-700 my-1 text-justify">One day Vako had enough with the 9-to-5 grind, or more like 9-to-9 in his case, and quit his job, or more like got himself fired from his own startup.</p>
                <p class="text-sm text-slate-700 my-1 text-justify">He decided to work on his dream: be his own boss, travel the world, only do the work he enjoyed, and make a lot more money in the process. No more begging for vacation days and living from paycheck to paycheck. After trying everything from e-commerce stores to professional poker his lucky break came when he started freelance design. Vako fell in love with the field that gives him the lifestyle of his dreams.</p>
                <p class="text-sm text-slate-700 my-1 text-justify">Vako realizes that people who take courses on Udemy want to transform their lives. Today with his courses and mentoring Vako is helping thousands of people transform their lives, just like he did once.</p>
            </div>
            <div class="main-content-right px-5">
                <div class="mt-8 mb-4">
                    <span class="font-semibold text-lg px-8 pb-2 border-b-2 border-orange-500">Article</span>
                </div>
                <p class="text-3xl text-slate-900 font-semibold my-3">Marlo Article</p>
                <div class="flex flex-row flex-wrap justify-between gap-5" id="card-content">
                    <!-- card -->
                    <div class="card">
                        <div class="card-img">
                            <img class="relative top-1" src="assets/fotoUploads/courseAg.png" alt="">
                        </div>
                        <div class="flex flex-col card-content">
                            <div class="px-3 border-x border-t border-gray">
                                <div class="mb-3 text-sm font-medium mt-3 p-1 bg-purple-200 text-purple-600 inline-block">Developments</div>
                                <p class="mb-4 text-xl font-semibold">Machine Learning A-Z™: Hands-On Python & R In Data Science</p>
                            </div>
                            <p class="p-3 text-slate-600 font-semibold text-lg border border-gray">Marlo</p>
                        </div>
                    </div>

                    <!-- card -->
                    <div class="card">
                        <div class="card-img">
                            <img class="relative top-1" src="assets/fotoUploads/courseAg.png" alt="">
                        </div>
                        <div class="flex flex-col card-content">
                            <div class="px-3 border-x border-t border-gray">
                                <div class="mb-3 text-sm font-medium mt-3 p-1 bg-purple-200 text-purple-600 inline-block">Developments</div>
                                <p class="mb-4 text-xl font-semibold">Machine Learning A-Z™: Hands-On Python & R In Data Science</p>
                            </div>
                            <p class="p-3 text-slate-600 font-semibold text-lg border border-gray">Marlo</p>
                        </div>
                    </div>

                    <!-- card -->
                    <div class="card">
                        <div class="card-img">
                            <img class="relative top-1" src="assets/fotoUploads/courseAg.png" alt="">
                        </div>
                        <div class="flex flex-col card-content">
                            <div class="px-3 border-x border-t border-gray">
                                <div class="mb-3 text-sm font-medium mt-3 p-1 bg-purple-200 text-purple-600 inline-block">Developments</div>
                                <p class="mb-4 text-xl font-semibold">Machine Learning A-Z™: Hands-On Python & R In Data Science</p>
                            </div>
                            <p class="p-3 text-slate-600 font-semibold text-lg border border-gray">Marlo</p>
                        </div>
                    </div>

                    <!-- card -->
                    <div class="card">
                        <div class="card-img">
                            <img class="relative top-1" src="assets/fotoUploads/courseAg.png" alt="">
                        </div>
                        <div class="flex flex-col card-content">
                            <div class="px-3 border-x border-t border-gray">
                                <div class="mb-3 text-sm font-medium mt-3 p-1 bg-purple-200 text-purple-600 inline-block">Developments</div>
                                <p class="mb-4 text-xl font-semibold">Machine Learning A-Z™: Hands-On Python & R In Data Science</p>
                            </div>
                            <p class="p-3 text-slate-600 font-semibold text-lg border border-gray">Marlo</p>
                        </div>
                    </div>
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