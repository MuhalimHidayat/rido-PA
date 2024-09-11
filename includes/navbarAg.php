<?php 
// var_dump($id_agent);
// exit;
// session_start();
?>
<header>
    <div id="navbar">
        <div class="" id="navbar-bottom">
            <div class="navbar-bottom-content flex flex-row justify-between items-center px-5">
                <div class="flex flex-row items-center gap-5 py-4 px-5">
                    <p class="text-2xl font-semibold">Smartskills</p>
                    <!-- Search button -->
                    
                </div>
                <div class="flex flex-row justify-center items-center gap-9">
                    <a class="text-slate-900 hover:text-slate-700 font-semibold" href="index.php">Home</a>
                    <a class="text-slate-900 hover:text-slate-700 font-semibold" href="viewInformations.php">Informasi</a>
                    <a class="text-slate-900 hover:text-slate-700 font-semibold" href="becomeAgent.php">Agent</a>
                    <?php if (isset($_SESSION['id_agent'])):?>
                        <?php 
                        $id_agent = $_SESSION['id_agent'];
                        $agent = query("SELECT * FROM agent WHERE id_agent = $id_agent")[0];    
                        ?>
                        <div class="navbar-bottom-content-img me-8 my-3">
                            <a href="settingAg.php">
                                <img src="assets/fotoUploads/<?= $agent['foto'] ?>" alt="">
                            </a>
                        </div>
                    <?php elseif(isset($_SESSION['id_siswa'])):?>
                        <?php
                        $id_siswa = $_SESSION['id_siswa'];
                        $siswa = query("SELECT * FROM siswa WHERE id_siswa = $id_siswa")[0];    
                        ?>
                        <div class="navbar-bottom-content-img me-8 my-3">
                            <a href="profileSis.php">
                                <img src="assets/fotoUploads/<?= $siswa['foto'] ?>" alt="">
                            </a>
                        </div>
                    <?php else: ?>
                        <button class="navbar-bottom-button"><a class="tombol-navbar" href="kategoriuser.php"
                    style="color: #f9f9f9;">Join Us</a></button>
                    <?php endif;?>
                </div>
            </div>
        </div>
</header>