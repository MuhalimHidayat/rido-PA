<?php 
require __DIR__ . "/../../functions/koneksi.php";
require __DIR__ . "/../../functions/function/uploadFoto.php";
require __DIR__ . "/../../functions/function/emailUnik.php";

// setting session 
session_start();

function registerSis($data){
    global $conn;
    
    $instansi = htmlspecialchars($data["instansi"]);
    $username = htmlspecialchars($data["username"]);
    $nohp = htmlspecialchars($data["nohp"]);
    $email = htmlspecialchars($data["email"]);
    $tanggal = htmlspecialchars($data["tanggal-lahir"]);
    $password = htmlspecialchars($data["password"]);
    // yang belum ada nama lengkap siswa dan foto

    // konversi tanggal lahir 
    $tanggal_lahir = date('Y-m-d', strtotime($tanggal));
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    // email unik
    if(filterEmail($email)){
        $email = $email;
    } else {
        echo "<script>
                alert('Email sudah digunakan pengguna lain!');
            </script>";
        return false;
    }

    $query = "INSERT INTO siswa VALUES ('', '$username', '$email', '$password', '$instansi', '$nohp', '','$tanggal_lahir', '', '', '', 'default.jpg')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function loginSis($data){
    global $conn;

    $email = $data["email"];
    $password = $data["password"];

    $query = "SELECT * FROM siswa WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) === 1){
        $value = mysqli_fetch_assoc($result);
        $password_verify = password_verify($password, $value['password']);
        if($password_verify == true){
            $_SESSION['id_siswa'] = $value['id_siswa'];
            return true;
        }
    } else {
        return false;
    }
}

// ubah profile sis
// Nama Lengkap Username No Hp Email foto
function profileSis($data){
    global $conn;

    $id_siswa = $_SESSION['id_siswa'];
    $nama_siswa = htmlspecialchars($data['nama_siswa']);
    $username = htmlspecialchars($data['username']);
    $no_hp = htmlspecialchars($data['nohp']);
    $email = htmlspecialchars($data['email']);
    $emailLama = $data['emailLama'];
    // menambahkan fungsi email jika email sudah terdaftar maka tidak bisa diubah
    if ($email == $emailLama || filterEmail($email)){
        $email = $email;
    } else {
        echo "<script>
                alert('Email sudah digunaka pengguna lain!');
            </script>";
        return false;
    }

    // upload foto
    if ($_FILES['foto']['error'] === 4) {
        $foto = $data['foto_lama'];
    } else {
        $foto = uploadFoto();
    }

    $query = "UPDATE siswa SET nama_siswa = '$nama_siswa', username = '$username', no_hp = '$no_hp', email = '$email', foto='$foto' WHERE id_siswa = '$id_siswa'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function profileSisData($data){
    global $conn; 
    $id_siswa = $_SESSION['id_siswa'];
    $no_hp = htmlspecialchars($data['nohp']);
    $kota = htmlspecialchars($data['kota']);
    $tempatLahir = htmlspecialchars(($data['tempat-lahir']));
    $tanggal = htmlspecialchars($data['tanggal-lahir']);
    $jenisKelamin = htmlspecialchars($data['jenis-kelamin']);
    $instansi = htmlspecialchars($data['institusi']);

    // konversi tanggal 
    $tanggal_lahir = date('Y-m-d', strtotime($tanggal));

    $query = "UPDATE siswa SET no_hp='$no_hp', kota='$kota', tempat_lahir='$tempatLahir', jk='$jenisKelamin', tanggal_lahir='$tanggal_lahir', instansi='$instansi' WHERE id_siswa = '$id_siswa'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// function logout(){
//     session_start();
//     session_unset();
//     session_destroy();
//     header("Location: ../../loginSis.php");
//     exit;
// }

?>