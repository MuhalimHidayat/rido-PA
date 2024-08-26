<?php 
// var_dump($id_agent);
// exit;
?>
<header>
    <div id="navbar">
        <!-- <div class="flex justify-between items-center bg-gray-800 text-gray-400 px-5" id="navbar-top">
            <div class="navbar-top-content flex gap-3">
                <a class="focus" href="">Home</a>
                <a href="">Courses</a>
                <a href="">About</a>
                <a href="">Contact</a>
                <a href="">Become an Instructor</a>
            </div>
            <div class="flex">
                
                <div>

                    <button id="currencyDropdownButton" data-dropdown-toggle="currencyDropdown" data-dropdown-placement="bottom" class="me-3 mb-3 md:mb-0 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center " type="button">USD <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <div id="currencyDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="currencyDropdownButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                            </li>
                        </ul>
                    </div>

                </div>

                <div>
                    <button id="languangeDropdownButton" data-dropdown-toggle="languangeDropdown" data-dropdown-placement="bottom" class="me-3 mb-3 md:mb-0 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center " type="button">English <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <div id="languangeDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="languangeDropdownButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

        </div> -->
        <div class="" id="navbar-bottom">
            <div class="navbar-bottom-content flex flex-row justify-between items-center px-5">
                <div class="flex flex-row items-center gap-5 py-4 px-5">
                    <p class="text-2xl font-semibold">Smartskills</p>
                    <!-- Search button -->
                    <div class="flex ">
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 " aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="default-search"
                                class="block w-full p-2 py-2 text-sm ps-10 text-gray-900 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="What do you want learn..." required />
                        </div>
                    </div>
                </div>
                <div class="flex flex-row justify-center items-center gap-9">
                    <a href="index.php">Home</a>
                    <a href="">Informasi</a>
                    <a href="">Agent</a>
                    <?php if(isset($_SESSION['id_siswa'])):?>
                        <?php
                        $id_siswa = $_SESSION['id_siswa'];
                        $siswa = query("SELECT * FROM siswa WHERE id_siswa = $id_siswa")[0];    
                        ?>
                        <div class="navbar-bottom-content-img me-5">
                            <img src="assets/fotoUploads/<?= $siswa['foto'] ?>" alt="">
                        </div>
                    <?php elseif (isset($_SESSION['id_agent'])):?>
                        <?php 
                        $id_agent = $_SESSION['id_agent'];
                        $agent = query("SELECT * FROM agent WHERE id_agent = $id_agent")[0];    
                        ?>
                        <div class="navbar-bottom-content-img me-5">
                            <img src="assets/fotoUploads/<?= $agent['foto'] ?>" alt="">
                        </div>
                    <?php else: ?>
                        <button class="navbar-bottom-button"><a class="tombol-navbar" href="loginAg.php"
                    style="color: #f9f9f9;">Join Us</a></button>
                    <?php endif;?>
                </div>
            </div>
        </div>
</header>