<?php 
require __DIR__ . "/../../functions/koneksi.php";

// fungsi unik untuk upload foto dengan syarat nama attribute foto
function uploadFoto(){
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    // $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];


    // cek apakah yang diupload adalah foto
    $ekstensiFotoValid = ['jpg', 'jpeg', 'png'];
    $ekstensiFoto = explode('.', $namaFile);
    $ekstensiFoto = strtolower(end($ekstensiFoto));
    if(!in_array($ekstensiFoto, $ekstensiFotoValid)){
        echo "<script>
                alert('Yang anda upload bukan foto!');
            </script>";
        return false;
    }

    // cek ukuran foto maksimal adalah 2 mb
    if($ukuranFile > 2000000){
        echo "<script>
                alert('Ukuran foto terlalu besar!');
            </script>";
        return false;
    }

    // lolos pengecekan, foto siap diupload
    // generate nama foto baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFoto;

    move_uploaded_file($tmpName, 'assets/fotoUploads/' . $namaFileBaru);

    return $namaFileBaru;
}

?>