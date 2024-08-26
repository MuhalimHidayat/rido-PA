<?php
function limitText($maxLength,  $attribute) {    
    // $artikel_judul = $value['judul'];
    // $maxLength = 50;
    if (strlen($attribute) > $maxLength) {
    $artikel_judul = substr($attribute, 0, $maxLength) . '...';
    return $artikel_judul;
    } else {
        return $attribute;
    }
    
}


?>