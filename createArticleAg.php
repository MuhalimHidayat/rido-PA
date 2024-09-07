<?php
session_start();
require __DIR__ . '/functions/function/selectData.php';
require __DIR__ . '/functions/article/create.php';
require __DIR__ . '/functions/article/update.php';

$id_agent = $_SESSION['id_agent'];
$agent = query("SELECT * FROM agent WHERE id_agent = $id_agent")[0];

if (!isset($_SESSION['id_agent'])) {
    header("Location: loginAg.php");
    exit;
}
// date now
date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d');


// Lokasi Halaman
$page_location = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$file_name = basename(__FILE__);
if (strpos($page_location, $file_name) !== false) {
    $page_location = "Create New Article";
}

if (isset($_POST['submit'])) {
    if (isset($_GET['id_artikel'])) {
        if (updateArticle($_POST, $_GET['id_artikel']) > 0) {
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
                    title: 'Artikel berhasil diupdate!'
                    });    

                    setTimeout(() => {
                        window.location.href = 'myArticleAg.php';
                    }, 2000);
                    
                });
            </script>";
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
                    title: 'Artikel gagal diupdate!'
                    });    
                    
                });
            </script>";
        }

    } else {
        if (createArticle($_POST) > 0) {
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
                    title: 'Artikel berhasil diupload!'
                    });    

                    setTimeout(() => {
                        window.location.href = 'myArticleAg.php';
                    }, 2000);
                    
                });
            </script>";
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
                    title: 'Artikel gagal diupdate!'
                    });    
                    
                });
            </script>";
        }
    }
    
}

// get id artikel if exist
if (isset($_GET['id_artikel'])) {
    $id_artikel = $_GET['id_artikel'];
    $artikel = query("SELECT * FROM artikel WHERE id_artikel = $id_artikel")[0];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/createArticleAg.css">
    <link rel="stylesheet" href="style/includes/sidebar.css">
    <!-- cdn tailwind -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries">
    </script>
    <title>Create New Article</title>
</head>

<body>
    <div class="w-full">
        <div class="flex w-full">
            <!-- sidebar -->
            <?php include 'includes/sidebarAg.php'; ?>
            <!-- endsidebar -->

            <!-- content -->
            <div class="content">
                <!-- upper content -->
                <?php include 'includes/upperContentAg.php'; ?>
                <!-- endupper content -->

                <!-- main content -->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="flex justify-center mt-5" id="main-content">
                        <div class="flex flex-col justify-center w-11/12">
                            <?php if (isset($_GET['id_artikel'])){
                                include_once "includes/updateArticle.php";
                            } else {
                                include_once "includes/createArticle.php";
                            }
                            ?>
                            <!-- button cancel dan upload -->
                            <div class="flex justify-between items-center m-5">
                                <a class="rounded-sm px-5 py-1 border border-gray-400 hover:text-white hover:bg-gray-400 class text-gray-500" href="myArticleAg.php">
                                    <button type="button">Cancel</button>
                                </a>
                                <!-- <button type="reset">Cancel</button> -->
                                <button class="rounded-sm px-5 py-2 bg-blue-500 text-white" type="submit" name="submit">Upload</button>
                            </div>
                        </div>

                    </div>
                </form>
                <footer>
                    <p>&copy;2024- Designed by <b>SmartSkills.</b> All rights reserved.</p>
                </footer>
            </div>
        </div>
    </div>
    <script src="script/gantiGambar.js"></script>
</body>

</html>