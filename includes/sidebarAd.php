<?php
// $logout_path = "functions/function/logoutAg.php";

?>
<!-- sidebar -->
<div class="sidebar" style="min-height: 100vh">
    <div class="logo">
        <p>SmartSkills <span class="text-bold" style="color: rgba(4, 171, 255, 1)">Admin</span></p>
    </div>
    <div class="mt-7">
        <?php if ($page_location === "siswa"): ?>
            <!-- <a href="">
                <div class="sidebar-item sidebar-item-color"><img src="assets/icon/home.png" alt="">
                    <p>Home</p>
                </div>
            </a> -->
            <a href="adminSis.php">
                <div class="sidebar-item fokus "><img src="assets/icon/adminSis.png" alt="">
                    <p>Siswa</p>
                </div>
            </a>
            <a href="adminAg.php">
                <div class="sidebar-item sidebar-item-color"><img src="assets/icon/adminAg1.png" alt="">
                    <p>Agent</p>
                </div>
            </a>
            <a href="adminAr.php">
                <div class="sidebar-item sidebar-item-color "><img src="assets/icon/adminAr1.png" alt="">
                    <p>Agent Artikel</p>
                </div>
            </a>
        <?php elseif ($page_location === "agent"): ?>
            <!-- <a href="">
                <div class="sidebar-item sidebar-item-color"><img src="assets/icon/home.png" alt="">
                    <p>Home</p>
                </div>
            </a> -->
            <a href="adminSis.php">
                <div class="sidebar-item sidebar-item-color"><img src="assets/icon/adminSis1.png" alt="">
                    <p>Siswa</p>
                </div>
            </a>
            <a href="adminAg.php">
                <div class="sidebar-item fokus "><img src="assets/icon/adminAg.png" alt="">
                    <p>Agent</p>
                </div>
            </a>
            <a href="adminAr.php">
                <div class="sidebar-item sidebar-item-color "><img src="assets/icon/adminAr1.png" alt="">
                    <p>Agent Artikel</p>
                </div>
            </a>
        <?php elseif ($page_location === "article"): ?>
            <!-- <a href="">
                <div class="sidebar-item sidebar-item-color"><img src="assets/icon/home.png" alt="">
                    <p>Home</p>
                </div>
            </a> -->
            <a href="adminSis.php">
                <div class="sidebar-item sidebar-item-color"><img src="assets/icon/adminSis1.png" alt="">
                    <p>Siswa</p>
                </div>
            </a>
            <a href="adminAg.php">
                <div class="sidebar-item sidebar-item-color"><img src="assets/icon/adminAg1.png" alt="">
                    <p>Agent</p>
                </div>
            </a>
            <a href="adminAr.php">
                <div class="sidebar-item fokus "><img src="assets/icon/adminAr.png" alt="">
                    <p>Agent Artikel</p>
                </div>
            </a>

        <?php endif; ?>
    </div>

    <!-- <div><a href="<?= $logout_path ?>">
            <div class="sidebar-item sidebar-item-color"><img src="assets/icon/SignOut.png" alt="">
                <p>Sign Out</p>
            </div>
        </a>
    </div> -->
</div>
<!-- end sidebar -->