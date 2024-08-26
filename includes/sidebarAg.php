<?php
$logout_path = "functions/function/logoutAg.php";
?>
<!-- sidebar -->
<div class="sidebar">
    <div class="logo">
        <p>SmartSkills</p>
    </div>
    <div class="mt-7">
        <?php if ($page_location === "Settings"): ?>
            <!-- <a href="">
                <div class="sidebar-item sidebar-item-color"><img src="assets/icon/home.png" alt="">
                    <p>Home</p>
                </div>
            </a> -->
            <a href="createArticleAg.php">
                <div class="sidebar-item sidebar-item-color"><img src="assets/icon/articleNew.png" alt="">
                    <p>Create New Article</p>
                </div>
            </a>
            <a href="myArticleAg.php">
                <div class="sidebar-item sidebar-item-color"><img src="assets/icon/course.png" alt="">
                    <p>My Article</p>
                </div>
            </a>
            <a href="settingAg.php">
                <div class="sidebar-item fokus"><img src="assets/icon/settings.png" alt="">
                    <p>Settings</p>
                </div>
            </a>
        <?php elseif ($page_location === "My Article"): ?>
            <!-- <a href="">
                <div class="sidebar-item sidebar-item-color"><img src="assets/icon/home.png" alt="">
                    <p>Home</p>
                </div>
            </a> -->
            <a href="createArticleAg.php">
                <div class="sidebar-item sidebar-item-color"><img src="assets/icon/articleNew.png" alt="">
                    <p>Create New Article</p>
                </div>
            </a>
            <a href="myArticleAg.php">
                <div class="sidebar-item fokus "><img src="assets/icon/Stack.png" alt="">
                    <p>My Article</p>
                </div>
            </a>
            <a href="settingAg.php">
                <div class="sidebar-item sidebar-item-color "><img src="assets/icon/setting.png" alt="">
                    <p>Settings</p>
                </div>
            </a>
        <?php elseif ($page_location === "Create New Article"): ?>
            <!-- <a href="">
                <div class="sidebar-item sidebar-item-color"><img src="assets/icon/home.png" alt="">
                    <p>Home</p>
                </div>
            </a> -->
            <a href="createArticleAg.php">
                <div class="sidebar-item fokus "><img src="assets/icon/newarticle.png" alt="">
                    <p>Create New Article</p>
                </div>
            </a>
            <a href="myArticleAg.php">
                <div class="sidebar-item sidebar-item-color"><img src="assets/icon/course.png" alt="">
                    <p>My Article</p>
                </div>
            </a>
            <a href="settingAg.php">
                <div class="sidebar-item sidebar-item-color "><img src="assets/icon/setting.png" alt="">
                    <p>Settings</p>
                </div>
            </a>

        <?php endif; ?>
    </div>

    <div><a href="<?=$logout_path?>">
            <div class="sidebar-item sidebar-item-color"><img src="assets/icon/SignOut.png" alt="">
                <p>Sign Out</p>
            </div>
        </a></div>
</div>
<!-- end sidebar -->