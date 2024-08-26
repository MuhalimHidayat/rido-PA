<?php
require_once __DIR__ . '/../../functions/function/selectData.php';
$keyword = $_GET['keyword'];
$artikel = query("SELECT * FROM artikel CROSS JOIN agent ON agent.id_agent = artikel.id_agent WHERE nama_agent LIKE '%$keyword%' OR judul LIKE '%$keyword%' OR kategori LIKE '%$keyword%' OR tgl_membuat LIKE '%$keyword%'");


?>

<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                No
            </th>
            <th scope="col" class="px-6 py-3">
                Gambar
            </th>
            <th scope="col" class="px-6 py-3">
                Nama Agent
            </th>
            <th scope="col" class="px-6 py-3">
                Judul
            </th>
            <th scope="col" class="px-6 py-3">
                Kategori
            </th>
            <th scope="col" class="px-6 py-3">
                Tanggal Terbit
            </th>
            <th scope="col" class="px-6 py-3">
                Setting
            </th>

        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($artikel as $value) : ?>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?= $i ?>
                </th>
                <td class="px-6 py-4">
                    <img src="assets/fotoUploads/<?= $value['foto'] ?>" alt="" style="height: 48px; width: 48px; object-fit: cover; object-position: center; border-radius: 100%">
                </td>
                <td class="px-6 py-4">
                    <?= $value['nama_agent'] ?>
                </td>
                <td class="px-6 py-4">
                    <?= $value['judul'] ?>
                </td>
                <td class="px-6 py-4">
                    <?= $value['kategori'] ?>
                </td>
                <td class="px-6 py-4">
                    <?= date('d F Y', strtotime($value['tgl_membuat'])) ?>
                </td>

                <td class="px-6 py-4">
                    <a href="functions/admin/deleteAr.php?id_artikel=<?= $value['id_artikel'] ?>" class="font-medium text-red-600 hover:text-red-500 hover:underline" onclick="return confirm('Menghapus Agent?')">Hapus</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>