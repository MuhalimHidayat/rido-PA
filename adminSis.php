<?php
session_start();

if (!isset($_SESSION['id_admin'])) {
    header("Location: loginAd.php");
    exit;
}


require 'functions/function/selectData.php';
$page_location = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$file_name = basename(__FILE__);
if (strpos($page_location, $file_name) !== false) {
    $page_location = "siswa";
}

$siswa = query("SELECT * FROM siswa");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/admin.css">
    <link rel="stylesheet" href="style/includes/sidebarAd.css">
    <link rel="stylesheet" href="style/includes/upperContentAd.css">
    <!-- cdn tailwind -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries">
    </script>
    <title>Admin-Siswa</title>
</head>

<body>
    <div class="flex flex-row">
        <!-- sidebar -->
        <?php include_once 'includes/sidebarAd.php'; ?>
        <!-- endsidebar -->
        <div class="content-account">
            <?php include_once 'includes/upperContentAd.php'; ?>
            <div class="mt-5 m-5 " id="main-content">

                <div class="flex flex-col justify-center ">
                <p class="text-center font-semibold text-2xl text-slate-800 mt-5">Siswa</p>
                    <!-- search button -->
                    <div class="flex justify-end w-full mb-8">
                        
                        <div class="flex flex-col w-2/5">
                            <label for="keyword"
                                class="mb-2 text-sm font-medium text-gray-900 ">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="search" id="keyword"
                                    class="block w-full p-2 ps-10 text-sm rounded-md text-gray-900 border border-gray-300 bg-gray-100 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Cari Siswa " required />
                            </div>
                        </div>
                    </div>


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg" id="table-content">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Gambar
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tanggal Lahir
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jenis Kelamin
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        No Hp
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Instansi
                                    </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($siswa as $value) : ?>
                                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <?= $i ?>
                                        </th>
                                        <td class="px-6 py-4">
                                            <img src="assets/fotoUploads/<?= $value['foto'] ?>" alt="" style="height: 48px; width: 48px; object-fit: cover; object-position: center; border-radius: 100%">
                                        </td>
                                        <td class="px-6 py-4">
                                            <?= $value['username'] ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?= date('d F Y', strtotime($value['tanggal_lahir'])) ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?= $value['jk'] ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?= $value['no_hp'] ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?= $value['instansi'] ?>
                                        </td>

                                        
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <footer class="mt-8 mb-3" style="bottom: 0;
    position: absolute;
    left: 50%;">
                <p class="text-center text-sm text-slate-600">&copy;2024- Designed by <b>SmartSkills.</b> All rights reserved.</p>
            </footer>
        </div>
    </div>
    <script src="script/search.js"></script>
</body>

</html>