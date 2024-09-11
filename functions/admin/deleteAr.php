<?php 
require __DIR__ . "/../../functions/koneksi.php";

$id_artikel = $_GET['id_artikel'];

function deleteArticle($id_artikel){
    global $conn;

    mysqli_query($conn, "DELETE FROM artikel WHERE id_artikel = $id_artikel");

    return mysqli_affected_rows($conn);
}

if(deleteArticle($id_artikel) > 0){
    echo "
        <script src='https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries'></script>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Hapus',
                text: 'Artikel berhasil dihapus!',
                icon: 'success'
            });

            setTimeout(() => {
                window.location.href = '../../adminAr.php';
            }, 2000);
        });   
        </script>
        ";
} else {
    echo "
        <script src='https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries'></script>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Gagal Hapus',
                text: 'Artikel gagal dihapus!',
                icon: 'error'
            });

            setTimeout(() => {
                window.location.href = '../../adminAr.php';
            }, 2000);
        });
        </script>";
}

?>