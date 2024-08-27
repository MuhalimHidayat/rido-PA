<?php
require_once __DIR__ . '/../../functions/function/selectData.php';
$keyword = $_GET['keyword'];
$siswa = query("SELECT * FROM siswa WHERE nama_siswa LIKE '%$keyword%' OR username LIKE '%$keyword%' OR email LIKE '%$keyword%' OR no_hp LIKE '%$keyword%' OR instansi LIKE '%$keyword%' OR jk LIKE '%$keyword%' OR tanggal_lahir LIKE '%$keyword%'");

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
                Tanggal Lahir
            </th>
            <th scope="col" class="px-6 py-3">
                Jenis Kelamin
            </th>
            <th scope="col" class="px-6 py-3">
                No Hp
            </th>
            <th scope="col" class="px-6 py-3">
                Instansi
            </th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($siswa as $value) : ?>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?= $i ?>
                </th>
                <td class="px-6 py-4">
                    <img src="assets/fotoUploads/<?= $value['foto'] ?>" alt="" style="height: 48px; width: 48px; object-fit: cover; object-position: center; border-radius: 100%">
                </td>
                <td class="px-6 py-4">
                    <?= $value['username'] ?>
                </td>
                <td class="px-6 py-4">
                    <?= date('d F Y', strtotime($value['tanggal_lahir'])) ?>
                </td>
                <td class="px-6 py-4">
                    <?= $value['jk'] ?>
                </td>
                <td class="px-6 py-4">
                    <?= $value['no_hp'] ?>
                </td>
                <td class="px-6 py-4">
                    <?= $value['instansi'] ?>
                </td>

            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>