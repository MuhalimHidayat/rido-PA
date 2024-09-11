<?php 
session_start();
require __DIR__ . '/../../functions/koneksi.php';
require __DIR__ . '/../../functions/function/selectData.php';

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username == '' || $password == ''){
        echo "<script>alert('username atau Password tidak boleh kosong!')</script>";
    }else{
        $query = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
        $cek = mysqli_num_rows($query);
        if($cek > 0){
            $data = mysqli_fetch_assoc($query);
            $_SESSION['id_admin'] = $data['id_admin'];
            
            echo "
            <script src='https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries'></script>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                    });
                    Toast.fire({
                    icon: 'success',
                    title: 'Login Berhasil'
                    });    

                    setTimeout(() => {
                        window.location.href = 'adminSis.php';
                    }, 2000);
                    
                });
            </script>
        ";
        }else{
            echo "
            <script src='https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries'></script>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                    });
                    Toast.fire({
                    icon: 'error',
                    title: 'Login Gagal'
                    });    
                });

                setTimeout(() => {
                    window.location.href = 'loginAd.php';
                }, 2000);
            </script>
        ";;
        }
    }
}

if(isset($_SESSION['id_admin'])){
    header("Location: adminSis.php");
    exit;
}
?>