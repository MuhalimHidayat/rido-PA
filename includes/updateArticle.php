<!-- upload gambar form  -->
<div class="flex flex-row items-center gap-5 mb-7">
    <div class="basis-2/3">
        <p class="text-xl font-semibold my-3">Upload Gambar</p>
        <div class="flex gap-5">
            <?php if (!isset($_GET['id_artikel'])) : ?>
                <img class="shadow-md rounded-md" src="assets/fotoUploads/artikelgambar.png" alt="" name="foto" id="gam_settings">
            <?php else : ?>
                <img class="shadow-md rounded-md" src="assets/fotoUploads/<?= $artikel['foto'] ?>" alt="" name="foto" id="gam_settings">
                <!-- foto sebelumnya -->
                <input type="hidden" name="foto_lama" value="<?= $artikel['foto'] ?>">
            <?php endif; ?>

            <div class="flex flex-col justify-around">
                <p class="text-sm">Unggah gambar artikel Anda di sini. <span><b>sebaiknya </b></span>1200x800 piksel atau Rasio 12:8. <b>Format yang didukung: .jpg, .jpeg, atau .png</b></p>
                <div>
                    <label class="flex justify-between py-2 px-5 bg-orange-100 rounded-md cursor-pointer font-medium" for="avatar" style="width: 200px; color: rgba(4, 171, 255, 1);">Upload Gambar <img src="assets/icon/unduhGambar.png" alt=""></label>
                    <input class="hidden" type="file" id="avatar" name="foto">
                </div>
            </div>
        </div>
    </div>
    <div class="basis-1/3 flex justify-center">
        <?php if (!isset($_GET['id_artikel'])) : ?>
            <input class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-md" type="date" name="tanggal" value="<?= $date ?>">
        <?php else : ?>
            <input class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-md" type="date" name="tanggal" value="<?= $artikel['tgl_membuat'] ?>">
        <?php endif; ?>
    </div>
</div>
<!-- form Judul, Kategori, Artikel,  -->
<div class="flex flex-col gap-3">
    <div class="form-artikel-paket">
        <label for="judul">Judul </label>
        <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm " type="text" name="judul" placeholder="Judul Artikel" required value="<?= $artikel['judul'] ?> ">
    </div>
    <div class="form-artikel-paket">
        <label for="kategori">Kategori</label>
        <input type="text" name="kategori" placeholder="Kategori artikel. Contoh: Figma"required value="<?= $artikel['kategori'] ?>">
    </div>
    <div class="form-artikel-paket">
        <label for="artikel">Artikel</label>
        <textarea name="artikel" id="artikel" cols="30" rows="10" placeholder="Tulis artikelmu disini" required>  <?= $artikel['artikel'] ?></textarea>
    </div>
</div>
<!-- (optional) form Heading-1 Artikel-1 Heading-2 Artikel-2 -->
<div class="flex flex-col gap-3">
    <div class="form-artikel-paket">
        <label for="heading1">Heading 1 <span>(opsional)</span></label>
        <input type="text" name="heading1" placeholder="Masukan heading" value="<?= $artikel['header1'] ?>">
    </div>
    <div class="form-artikel-paket">
        <label for="artikel1">Artikel 1 <span>(opsional)</span></label>
        <textarea name="artikel1" id="artikel1" cols="30" rows="10" placeholder="Tulis artikelmu disini"><?= $artikel['artikel1'] ?></textarea>
    </div>
    <div class="form-artikel-paket">
        <label for="heading2">Heading 2 <span>(opsional)</span></label>
        <input type="text" name="heading2" placeholder="Masukan Headiong (opsional)" value="<?= $artikel['header2'] ?>">
    </div>
    <div class="form-artikel-paket">
        <label for="artikel2">Artikel 2 <span>(opsional)</span></label>
        <textarea name="artikel2" id="artikel2" cols="30" rows="10" placeholder="Tulis artikelmu disini"><?= $artikel['artikel2'] ?></textarea>
    </div>
</div>