<?php 
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
            // $_SESSION['username'] = $data['username'];
            // $_SESSION['nama'] = $data['nama'];
            echo "<script>alert('Login Berhasil!')</script>";
            echo "<script>document.location.href = 'adminSis.php'</script>";
        }else{
            echo "<script>alert('username atau Password Salah!')</script>";
        }
    }
}
?>