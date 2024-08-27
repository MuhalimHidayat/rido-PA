<?php
require 'functions/admin/login.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- tailwind -->
    <link rel="stylesheet" href="style/loginAd.css">

    <!-- cdn tailwind -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <title>Login Admin</title>
</head>

<body>
    <header>
        <p class="text-2xl font-semibold" style="margin-left: 130px;">SmartSkills<span style="color: rgba(4, 171, 255, 1);"> Admin</span></p>
    </header>
    <main>
        <div class="content flex flex-col justify-center items-center">
            <div class="judul-log">
                <h1 class="text-4xl font-semibold">Login</h1>

            </div>
            <form class="" action="" method="post">
                <div class="inputan">
                    <div class="inputer-login">
                        <div class="username-log">
                            <label for="username">Username <span class="text-red-600">*</span></label> <br>
                            <input type="text" name="username" placeholder="Masukan Username Anda " required>
                        </div>
                        <div class="password-log">
                            <label for="password">Password <span class="text-red-600">*</span></label> <br>
                            <input type="password" placeholder="Masukan Password Anda" name="password" required>
                        </div>
                    </div>
                    <div class="kiri-bawah">
                        <div class="tombol">
                            <button type="submit" name="submit" class="text-white font-bold" style="margin-left: 66px; width: 400px;">Login</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </main>

</body>

</html>