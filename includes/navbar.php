<?php


?>
<header class="header-navbar">
    <a href="" class="logo-navbar">Smartskills</a>

    <nav class="navbar">
        <a href="">Home</a>
        <a href="#Informasi">Informasi</a>
        <a href="#Service">Service</a>
        <a href="#Agent">Agent</a>
        
        <?php if (isset($id_siswa)): ?>
            <!-- <a href="" class="ms-5"> -->

                <img class="ms-5" src="assets/fotoUploads/<?=$siswa['foto']?>" alt="" style="width: 48px; height: 48px; border-radius: 100%; object-fit: cover;">
            <!-- </a> -->
                <?php else: ?>
            <button><a class="tombol-navbar" href="loginSis.php"
                    style="color: #f9f9f9;">Join Us</a></button>
        <?php endif; ?>
        <!-- <button><a class="tombol" href="">Sign In</a></button> -->
    </nav>
</header>