<?php
require __DIR__ . "/../../functions/koneksi.php";

// fungsi supaya data unik bisa 
function filterEmail($email){
    global $conn; 

    
    $query = "SELECT * FROM siswa WHERE email = '$email'"; 
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result)){
        return false;
    } else {
        return true;
    }
}
?>