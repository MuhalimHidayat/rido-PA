<?php
require __DIR__ . "/../../functions/koneksi.php";
// require __DIR__ . "/../../functions/function/uploadFoto.php";


function updateArticle($data, $id_artikel){
    global $conn; 

    // $id_agent = $_SESSION['id_agent'];
    $id_artikel = $id_artikel;
    $judul = htmlspecialchars($data["judul"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $artikel = htmlspecialchars($data["artikel"]);
    $headerOptional = [
        'heading1' => htmlspecialchars($_POST['heading1']),
        'heading2' => htmlspecialchars($_POST['heading2']),
        'artikel1' => htmlspecialchars($_POST['artikel1']),
        'artikel2' => htmlspecialchars($_POST['artikel2'])
    ];
    $tanggal = date('Y-m-d', strtotime($data["tanggal"]));
    $foto_lama = $data['foto_lama'];
    // var_dump($foto_lama);
    // exit;

    if ($_FILES['foto']['error'] === 4) {
        $foto = $foto_lama;
    } else {
        $foto = uploadFoto();
    }

    $query = "UPDATE artikel SET judul = '$judul', kategori = '$kategori', artikel = '$artikel', header1 = '$headerOptional[heading1]', artikel1 = '$headerOptional[artikel1]', header2 = '$headerOptional[heading2]', artikel2 = '$headerOptional[artikel2]', tgl_membuat = '$tanggal', foto = '$foto' WHERE id_artikel = $id_artikel";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}


?>