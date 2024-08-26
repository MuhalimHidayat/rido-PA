<?php
require __DIR__ . "/functions/authUsr/authAg.php";
require __DIR__ . "/functions/function/selectData.php";
// session jika belum login maka diarahkan ke login.php
$id_agent = $_SESSION["id_agent"];

// var_dump(__DIR__);
// exit;

$agent = query("SELECT * FROM agent WHERE id_agent = '$id_agent'")[0];

$fullname = explode(" ", $agent['nama_agent']);
$firstname = $fullname[0];

if (count($fullname) > 2) {
    $lastname = "";
    for ($i = 1; $i < count($fullname); $i++) {
        $lastname .= $fullname[$i] . " ";
    }
} elseif (count($fullname) == 2) {
    $lastname = $fullname[1];
} else {
    $lastname = "";
}


if (!isset($_SESSION["id_agent"])) {
    header("Location: loginAg.php");
    exit;
}


// name = "account-save"
if (isset($_POST['account-save'])) {
    if (profileAg($_POST) > 0) {
        $agentSosmed = query("SELECT * FROM sosmed WHERE id_agent = '$id_agent'")[0];
        echo "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = 'settingAg.php';
            </script>
        ";
    } elseif (profileAg($_POST) == 0) {
        echo "
            <script>
                alert('Data tidak diubah!');
                document.location.href = 'settingAg.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah!');
                document.location.href = 'settingAg.php';
            </script>
        ";
    }
}


// name = "social-media-save"

$agentSosmed = query("SELECT * FROM sosmed WHERE id_agent = '$id_agent'");
// mengecek apakah data sosmed sudah ada atau belum
if (count($agentSosmed) != 0) {
    $agentSosmed = $agentSosmed[0];
}

if (isset($_POST['social-media-save'])) {
    // var_dump(sosmedAg($_POST));
    if (sosmedAg($_POST) > 0) {
        // var_dump($agentSosmed);
        echo "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = 'settingAg.php';
            </script>
        ";
    } elseif (sosmedAg($_POST) == 0) {
        echo "
            <script>
                alert('Data tidak diubah!');
                document.location.href = 'settingAg.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah!');
                document.location.href = 'settingAg.php';
            </script>
        ";
    }
}

// Lokasi Halaman
$page_location = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$file_name = basename(__FILE__);
if (strpos($page_location, $file_name) !== false) {
    $page_location = "Settings";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/includes/sidebar.css">
    <link rel="stylesheet" href="style/settingAg.css">
    <!-- cdn tailwind -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries">
    </script>

    <title>Agent Settings</title>
</head>

<body>
    <!-- <div class="container "> -->
        <div class="flex flex-row">
            <!-- sidebar -->
            <?php include_once 'includes/sidebarAg.php'; ?>
            <!-- endsidebar -->

            <!-- content -->
            <div class="content-account">
                <!-- upper content -->
                <?php include_once 'includes/upperContentAg.php'; ?>
                <!-- end upper content -->

                <!-- main content -->
                <!-- <form action="" method="post" enctype="multipart/form-data"> -->
                <div id="main-content">
                    <form action="" method="post" enctype="multipart/form-data">
                        <!-- form content -->
                        <div class="form-main-content">
                            <div class="flex justify-between w-100">
                                <!-- fullname, username, phone number -->
                                <div class="basis-5/6 flex flex-col gap-3">
                                    <div class="layout-main-content">
                                        <p class="text-2xl font-bold">Account Settings</p>
                                    </div>
                                    <div class="flex items-end gap-5">
                                        <div class="agent-data flex flex-col w-2/4">
                                            <label for="fullname">Full Name</label>
                                            <input type="text" name="firstname" placeholder="First Name" value="<?= $firstname ?>">
                                        </div>
                                        <div class="agent-data w-2/4">
                                            <input class="w-full" type="text" name="lastname" placeholder="Last Name" value="<?= $lastname ?>">
                                        </div>
                                    </div>
                                    <div class="agent-data flex flex-col">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" placeholder="Enter your username" value="<?= $agent['username'] ?>">
                                    </div>
                                    <div class="agent-data flex flex-col">
                                        <label for="nohp">Phone Number</label>
                                        <input type="text" name="nohp" placeholder="Your Phone Number..." value="<?= $agent['no_hp'] ?>">
                                    </div>
                                </div>
                                <!-- upload image -->
                                <div class="basis-3/12 flex flex-col p-5 ms-5 bg-gray-200 rounded-md">
                                    <div class="relative">
                                        <img class="w-full" src="assets/fotoUploads/<?= $agent['foto'] ?>" alt="" id="gam_settings">
                                        <div class="absolute bottom-0 bg-slate-400 w-full py-2">
                                            <label for="avatar" class="flex justify-center gap-1 cursor-pointer">
                                                <img class="rounded-sm" src="assets/icon/UploadSimple.png" alt="">
                                                <p class="font-medium text-md text-white ">Upload Gambar</p>
                                            </label>
                                            <input class="hidden" type="file" id="avatar" name="foto"
                                                accept="image/png, image/jpeg">
                                            <input type="hidden" name="fotoLama" value="<?= $agent['foto'] ?>">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-sm text-slate-500 font-medium text-justify">Image size Image size
                                            should be under 1MB and image ration needs to be 1:1</p>
                                    </div>
                                </div>
                            </div>
                            <!-- title, biography -->
                            <div class="flex flex-col gap-3">
                                <div class="agent-data flex flex-col">
                                    <label for="title">Title</label>
                                    <input type="text" name="title"
                                        placeholder="Your title, proffesion or small biography" id="title" value="<?= $agent['title'] ?>">
                                </div>
                                <div class="agent-data flex flex-col">
                                    <label for="biography">Biography</label>
                                    <textarea name="biography" id="" cols="30" rows="5"><?= $agent['biography'] ?></textarea>
                                </div>
                            </div>
                            <!-- tombol simpan perubahan name="account-save"-->
                            <div class="mt-3">
                                <button type="submit" name="account-save"
                                    class="bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-4 py-2 text-white dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan Perubahan</button>
                            </div>
                        </div>
                    </form>
                    <form action="" method="post">
                        <!-- form social profile -->
                        <div class="form-main-content flex flex-col gap-5">
                            <p class="text-2xl font-bold">Social Profile</p>
                            <!-- personal website -->
                            <div class="social-data">
                                <label for="personal-website">Personal Website</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 start-0 flex items-center px-3 pointer-events-none"
                                        style="border: 1px solid rgb(232 234 237);">
                                        <img src="assets/icon/Globe.png" alt="">
                                    </div>

                                    <input type="text" id="personal-website"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full ps-16 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Personal website or portofolio url..." name="personal-website" value="<?= isset($agentSosmed['personal_web']) ? $agentSosmed['personal_web'] : '' ?>" />
                                </div>
                            </div>

                            <!-- facebook instagram linkedin-->
                            <div class="flex justify-between items-center gap-5 w-full">
                                <!-- facebook -->
                                <div class="social-data w-full">
                                    <label for="fb">Facebook</label>
                                    <div class="relative w-full">
                                        <div class="absolute inset-y-0 start-0 flex items-center px-3 pointer-events-none"
                                            style="border: 1px solid rgb(232 234 237);">
                                            <img src="assets/icon/fb.png" alt="">
                                        </div>

                                        <input type="text" id="fb"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full ps-16 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Username" name="fb" value="<?= isset($agentSosmed['fb']) ? $agentSosmed['fb'] : '' ?>" />
                                    </div>
                                </div>
                                <!-- instagram -->
                                <div class="social-data w-full">
                                    <label for="ig">Instagram</label>
                                    <div class="relative w-full">
                                        <div class="absolute inset-y-0 start-0 flex items-center px-3 pointer-events-none"
                                            style="border: 1px solid rgb(232 234 237);">
                                            <img src="assets/icon/ig.png" alt="">
                                        </div>

                                        <input type="text" id="ig"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full ps-16 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Username" name="ig" value="<?= isset($agentSosmed['ig']) ? $agentSosmed['ig'] : '' ?>" />
                                    </div>
                                </div>
                                <!-- linkedin -->
                                <div class="social-data w-full">
                                    <label for="linkedin">Linkedin</label>
                                    <div class="relative w-full">
                                        <div class="absolute inset-y-0 start-0 flex items-center px-3 pointer-events-none"
                                            style="border: 1px solid rgb(232 234 237);">
                                            <img src="assets/icon/linkedin.png" alt="">
                                        </div>

                                        <input type="text" id="linkedin"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full ps-16 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Username" name="linkedin" value="<?= isset($agentSosmed['linkedin']) ? $agentSosmed['linkedin'] : '' ?>" />
                                    </div>
                                </div>
                            </div>

                            <!-- twitter whatsapp youtube -->
                            <div class="flex justify-between items-center gap-5 w-full">
                                <!-- twitter -->
                                <div class="social-data w-full">
                                    <label for="twitter">Twitter</label>
                                    <div class="relative w-full">
                                        <div class="absolute inset-y-0 start-0 flex items-center px-3 pointer-events-none"
                                            style="border: 1px solid rgb(232 234 237);">
                                            <img src="assets/icon/twitter.png" alt="">
                                        </div>

                                        <input type="text" id="twitter"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full ps-16 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Username" name="twitter" value="<?= isset($agentSosmed['twitter']) ? $agentSosmed['twitter'] : '' ?>" />
                                    </div>
                                </div>
                                <!-- whatsapp -->
                                <div class="social-data w-full">
                                    <label for="wa">Whatsapp</label>
                                    <div class="relative w-full">
                                        <div class="absolute inset-y-0 start-0 flex items-center px-3 pointer-events-none"
                                            style="border: 1px solid rgb(232 234 237);">
                                            <img src="assets/icon/wa.png" alt="">
                                        </div>

                                        <input type="text" id="wa"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full ps-16 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Phone Number" name="wa" value="<?= isset($agentSosmed['wa']) ? $agentSosmed['wa'] : '' ?>" />
                                    </div>
                                </div>
                                <!-- youtube -->
                                <div class="social-data w-full">
                                    <label for="yt">Youtube</label>
                                    <div class="relative w-full">
                                        <div class="absolute inset-y-0 start-0 flex items-center px-3 pointer-events-none"
                                            style="border: 1px solid rgb(232 234 237);">
                                            <img src="assets/icon/yt.png" alt="">
                                        </div>

                                        <input type="text" id="yt"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full ps-16 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Username" name="yt" value="<?= isset($agentSosmed['yt']) ? $agentSosmed['yt'] : '' ?>" />
                                    </div>
                                </div>
                            </div>

                            <!-- tombol simpan perubahan name=social-media-save-->
                            <div>
                                <button type="submit" name="social-media-save"
                                    class="bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-4 py-2 text-white">Simpan Perubahan</button>
                            </div>
                        </div>
                    </form>
                    <!-- main content -->
                </div>
                <!-- </form> -->

                <!-- footer -->
                <footer>
                    <p>&copy;2024- Designed by <b>SmartSkills.</b> All rights reserved.</p>
                </footer>
                <!-- endfooter -->
            </div>
            <!-- endconten -->
        </div>
    <!-- </div> -->

    <script src="script/gantiGambar.js"></script>

</body>

</html>