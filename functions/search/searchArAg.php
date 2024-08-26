<?php
session_start();
require __DIR__ . '/../../functions/function/selectData.php';
$id_agent = $_SESSION['id_agent'];
$keyword = $_GET['keyword'];

// mengambil data artikel berdasarkan agent dan juga keyword
$artikel = query("SELECT * FROM agent INNER JOIN artikel ON agent.id_agent = artikel.id_agent WHERE agent.id_agent = '$id_agent' AND (nama_agent LIKE '%$keyword%' OR judul LIKE '%$keyword%' OR kategori LIKE '%$keyword%' OR tgl_membuat LIKE '%$keyword%')");


?>

<?php if (empty($artikel)) : ?>
    <div class="flex justify-center items-center flex-col gap-2">
        <img class="w-2/5" src="assets/empty_artikel.png" alt="empty-article">
        <p class="text-center text-lg font-semibold">Artikel Belum Tersedia :
        </p>
        <p class="text-center text-md text-slate-700 ">Bagikan wawasan Anda tentang teknologi informasi<span style="display: block;">
                melalui artikel yang menarik dan informatif.</span></p>
    </div>
<?php endif; ?>
<!-- card -->
<?php foreach ($artikel as $value): ?>
    <div class="relative" id="card">
        <div class="rounded overflow-hidden shadow-lg" style="max-width: 300px">
            <img class="w-full" src="assets/fotoUploads/<?= $value['foto'] ?>" alt="Sunset in the mountains">
            <div class="px-6 py-4">
                <div class="px-1 py-1 bg-purple-100 inline-block text-xs font-medium text-purple-950"><?= strtoupper($value['kategori']) ?></div>
                <div class="font-bold text-lg mb-4"><?php
                                                    $artikel_judul = $value['judul'];
                                                    $maxLength = 50;
                                                    if (strlen($artikel_judul) > $maxLength) {
                                                        $artikel_judul = substr($artikel_judul, 0, $maxLength) . '...';
                                                    }
                                                    echo $artikel_judul;
                                                    ?> </div>
                <div class="px-1 py-1 bg-purple-100 inline-block text-xs font-bold text-purple-900"><?= date('d F Y', strtotime($value['tgl_membuat'])) ?></div>
            </div>
            <div class="flex justify-between items-center px-6 py-4 border-t border-gray-300 shadow-md">
                <div class="font-bold text-lg">
                    <?= $value['nama_agent'] ?>
                </div>
                <img class="open-option" src="assets/icon/DotsThree.png" alt="">
                <div class="option-card absolute flex flex-col bg-white border shadow-md font-medium">
                    <a href="detailArticle.php?id_artikel=<?= $value['id_artikel'] ?>">View Details</a>
                    <a href="createArticleAg.php?id_artikel=<?= $value['id_artikel'] ?>">Edit Article</a>
                    <a href="functions/article/delete.php?id_artikel=<?= $value['id_artikel'] ?>" onclick="return confirm('Do you really want to delete this article?')">Delete Article</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>