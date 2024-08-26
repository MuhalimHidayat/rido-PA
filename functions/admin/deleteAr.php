<?php 
require __DIR__ . "/../../functions/koneksi.php";

$id_artikel = $_GET['id_artikel'];

function deleteArticle($id_artikel){
    global $conn;

    mysqli_query($conn, "DELETE FROM artikel WHERE id_artikel = $id_artikel");

    return mysqli_affected_rows($conn);
}

if(deleteArticle($id_artikel) > 0){
    echo "<script>
            alert('Artikel berhasil dihapus!');
            document.location.href = '../../adminAr.php';
        </script>";
} else {
    echo "<script>
            alert('Artikel gagal dihapus!');
            document.location.href = '../../adminAr.php';
        </script>";
}

?>