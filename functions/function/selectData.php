<?php 
require __DIR__ . "/../../functions/koneksi.php";

function query($query){
    global $conn;

    $query = "$query";
    $result = mysqli_query($conn, $query);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}

?>