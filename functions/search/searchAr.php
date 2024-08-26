<?php
require __DIR__ . '/../../functions/function/selectData.php';
include_once __DIR__ . "/../../includes/judulArtikel.php";

$keyword = $_GET['keyword'];

$artikel = query("SELECT * FROM agent INNER JOIN artikel ON agent.id_agent = artikel.id_agent WHERE nama_agent LIKE '%$keyword%' OR judul LIKE '%$keyword%' OR kategori LIKE '%$keyword%' OR tgl_membuat LIKE '%$keyword%'");

?>

<!-- jika tidak ada artikel sama sekali -->
<?php if (empty($artikel)) : ?>
    <div class="flex justify-center items-center flex-col gap-2">
        <img class="w-2/5" src="assets/empty_artikel.png" alt="empty-article">
        <p class="text-center text-lg font-semibold">Artikel Belum Tersedia :
        </p>
        <p class="text-center text-md text-slate-700 ">Bagikan wawasan Anda tentang teknologi informasi<span style="display: block;">
                melalui artikel yang menarik dan informatif.</span></p>
    </div>
<?php endif; ?>


<?php foreach ($artikel as $art): ?>
    <!-- card -->
    <div class="relative" id="card">
        <div class="rounded overflow-hidden shadow-lg" style="max-width: 300px">
            <img class="w-full" src="assets/fotoUploads/<?= $art['foto'] ?>" alt="Sunset in the mountains">
            <div class="px-6 py-4">
                <div class="px-1 py-1 bg-purple-100 inline-block text-xs font-medium text-purple-950"><?= strtoupper($art['kategori']) ?></div>
                <div class="font-bold text-lg mb-4"><?= limitText(40, $art['judul']) ?> </div>
                <div class="px-1 py-1 bg-purple-100 inline-block text-xs font-bold text-purple-900"><?= date('d F Y', strtotime($art['tgl_membuat'])) ?></div>
            </div>
            <div class="flex justify-between items-center px-6 py-4 border-t border-gray-300 shadow-md">
                <div class="font-bold text-xl">
                    <?= $art['username'] ?>
                </div>
                <img class="open-option" src="assets/icon/DotsThree.png" alt="">
                <div class="option-card absolute flex flex-col bg-white border shadow-md font-medium">
                    <a href="detailArticle.php?id_artikel=<?= $art['id_artikel'] ?>">View Details</a>
                    <!-- <a href="">Edit Article</a>
                                        <a href="" onclick="return confirm('Do you really want to delete this article?')">Delete Article</a> -->
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>