<?php
require_once __DIR__ . '/../../functions/function/selectData.php';
$keyword = $_GET['keyword'];
$agent = query("SELECT * FROM agent WHERE nama_agent LIKE '%$keyword%' OR username LIKE '%$keyword%' OR no_hp LIKE '%$keyword%' OR email LIKE '%$keyword%'");



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
                Nama
            </th>
            <th scope="col" class="px-6 py-3">
                Username
            </th>
            <th scope="col" class="px-6 py-3">
                Email
            </th>
            <th scope="col" class="px-6 py-3">
                No Hp
            </th>
            <th scope="col" class="px-6 py-3">
                Instansi
            </th>
            <th scope="col" class="px-6 py-3">
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($agent as $value) : ?>
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
                    <?= $value['username'] ?>
                    <!-- //date('d F Y', strtotime($value['username']))  -->
                </td>
                <td class="px-6 py-4">
                    <?= $value['email'] ?>
                </td>
                <td class="px-6 py-4">
                    <?= $value['no_hp'] ?>
                </td>
                <td class="px-6 py-4">
                    <?= $value['instansi'] ?>
                </td>

                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-red-600 hover:text-red-500 hover:underline" onclick="return confirm('Menghapus Agent?')">Hapus</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>