<?php
require __DIR__ . "/../../functions/koneksi.php";
require __DIR__ . "/../../functions/function/uploadFoto.php";



function createArticle($data){
    global $conn; 

    $id_agent = $_SESSION['id_agent'];
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

    // date_default_timezone_set('Asia/Jakarta');
    // upload foto
    if ($_FILES['foto']['error'] === 4) {
        $foto = "artikelgambar.png";
    } else {
        $foto = uploadFoto();
    }

    $query = "INSERT INTO artikel VALUES ('', '$id_agent', '$judul', '$kategori', '$artikel', '$headerOptional[heading1]', '$headerOptional[artikel1]', '$headerOptional[heading2]', '$headerOptional[artikel2]', '$tanggal', '$foto')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}