<!-- upper content -->
<div class="flex justify-between items-center" id="upper-content">
    <div>
        <p class="text-slate-500 font-medium">Selamat Datang</p>
        <p class="text-slate-800 font-bold text-xl"><?=$page_location?></p>
    </div>
    <div class="flex justify-center gap-5 p-3 items-center">
        <?php if($page_location === "Settings"):?>
            <!-- search button with search icon inside-->
            <div class="flex justify-end">
                <div class="flex">
                    <!-- <input type="text" placeholder="Search" class="search">
                                    <img src="assets/icon/search.png" alt=""> -->
                    
                </div>
            </div>

    
        <?php endif; ?>


        <!-- image profile -->
        <div class="flex">
            <img src="assets/fotoUploads/<?=$agent['foto']?>" alt=""
                style="height: 48px; width: 48px; object-fit: cover; object-position: center; border-radius: 100%">
        </div>

    </div>
</div>
<!-- end upper content -->