<?php 
require __DIR__ . "/../../functions/koneksi.php";
require __DIR__ . "/../../functions/function/uploadFoto.php";
require __DIR__ . "/../../functions/function/emailUnik.php";

session_start();

function registerAg($data){
    global $conn;
    $instansi = $data["instansi"];
    $username = $data["username"];
    $nohp = $data["nohp"];
    $email = $data["email"];
    $nik = $data['nik'];
    $password = $data["password"];

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
    

    $query = "INSERT INTO agent VALUES ('', '$username', '$email', '$password','' ,'$instansi', '$nik', '$nohp','', '', 'Image.png')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function loginAg($data){
    global $conn;

    $email = $data["email"];
    $password = $data["password"];

    $query = "SELECT * FROM agent WHERE email = '$email'";
    $result = mysqli_query($conn, $query); 

    if(mysqli_num_rows($result) === 1){
        $value = mysqli_fetch_assoc($result);
        $password_verify = password_verify($password, $value['password']);
        if($password_verify == true){
            $_SESSION['id_agent'] = $value['id_agent'];
            return true;
        }
    } else {
        return false;
    }
}

function profileAg($data){
    global $conn; 

    $id_agent = $_SESSION['id_agent'];
    $first_name = htmlspecialchars($data['firstname']);
    $last_name = htmlspecialchars($data['lastname']);
    $full_name = $first_name . " " . $last_name;
    $username = htmlspecialchars($data['username']);
    $no_hp = htmlspecialchars($data['nohp']);
    $title = htmlspecialchars($data['title']);
    $biography = htmlspecialchars($data['biography']);
    $fotoLama = $data['fotoLama'];

    // upload foto
    if ($_FILES['foto']['error'] === 4) {
        $foto = $fotoLama;
    } else {
        $foto = uploadFoto();
    }

    $query = "UPDATE agent SET 
                nama_agent = '$full_name',
                username = '$username',
                no_hp = '$no_hp',
                title = '$title',
                biography = '$biography',
                foto = '$foto'
                WHERE id_agent = '$id_agent'
            ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

// sosmed agent
function sosmedAg($data){
    global $conn;

    $id_agent = $_SESSION['id_agent'];
    $personal_web = htmlspecialchars($data['personal-website']);
    $fb = htmlspecialchars($data['fb']);
    $ig = htmlspecialchars($data['ig']);
    $linkedin = htmlspecialchars($data['linkedin']);
    $twitter = htmlspecialchars($data['twitter']);
    $wa = htmlspecialchars($data['wa']);
    $yt = htmlspecialchars($data['yt']);

    $querySelect = "SELECT * FROM sosmed WHERE id_agent = '$id_agent'";
    $result = mysqli_query($conn, $querySelect);
    // jika belum ada data sosmed
    if(mysqli_num_rows($result) === 0){
        $queryAdd = "INSERT INTO sosmed VALUES ('', '$id_agent', '$personal_web', '$fb', '$ig', '$linkedin', '$twitter', '$wa', '$yt')";
        mysqli_query($conn, $queryAdd);
        return mysqli_affected_rows($conn);
    }

    $queryUpdate = "UPDATE sosmed SET 
                personal_web = '$personal_web',
                fb = '$fb',
                ig = '$ig',
                linkedin = '$twitter',
                twitter = '$linkedin', 
                wa = '$wa',
                yt = '$yt'
                WHERE id_agent = '$id_agent'
            ";
    mysqli_query($conn, $queryUpdate);
    return mysqli_affected_rows($conn);
}

// logout
function logout(){
    session_unset();
    session_destroy();
    header('Location: ../../index.php');
}
?>