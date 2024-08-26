<!-- upper content -->
<div class="flex justify-between items-center" id="upper-content">
    <div>
        <p class="text-slate-500 font-medium">Selamat Datang</p>
        <p class="text-slate-800 font-bold text-xl">Admin</p>
    </div>
    <div class="flex justify-center gap-5 p-3 items-center">
        <?php if($page_location === "Settings"):?>
            <!-- search button with search icon inside-->
            <div class="flex justify-end">
                <div class="flex">
                    <!-- <input type="text" placeholder="Search" class="search">
                                    <img src="assets/icon/search.png" alt=""> -->
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search"
                            class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 bg-gray-100 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search" required />
                    </div>
                </div>
            </div>

            <!-- notifications icon -->
            <div class="bg-gray-100" style="padding: 7px;">
                <img src="assets/icon/bell.png" alt="">
            </div>
        <?php endif; ?>


        

    </div>
</div>
<!-- end upper content -->