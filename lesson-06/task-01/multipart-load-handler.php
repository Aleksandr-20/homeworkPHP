<?php

$files = $_FILES;
// echo "<pre>";
// var_dump($files);
// echo "</pre>";

if( isset($files['pictures']['name'])) {
    $total_files = count($_FILES['pictures']['name']);
    // var_dump($total_files);
} else {
    header("Location: multipart-load.php");
}

// проверка на соответствие типу
function checkType($type) {
    if( in_array($type, array('image/jpg', 'image/jpeg', 'image/png'))) {
        return true;
    } else {
        return false;
    }
}

// проверка на соответствие размеру
function checkSize($size) {
    $maxFileSize = 3 * 1024 * 1024; //3MB
    if ($size < $maxFileSize){
        return true;
    } else {
        return false;
    }
}

// проверка на наличие ошибок загрузки
function checkError($error) {
    if ($error === 0) {
        return true;
    } else {
        return false;
    }
}

for($key = 0; $key < $total_files; $key++) {

    $type = $files['pictures']['type'][$key];
    $size = $files['pictures']['size'][$key];
    $error = $files['pictures']['error'][$key];

    $tmp_name = $files['pictures']['tmp_name'][$key];
    $file_name = $files['pictures']['name'][$key];
    $file_name = microtime() . $file_name;

    if (checkType($type) &&
        checkSize($size) && 
        checkError($error)) {
            if (move_uploaded_file($tmp_name, "image/$file_name")){
                echo "<pre>";
                echo "$file_name успешно загружен";
                echo "</pre>";
            } else {
                echo "<pre>";
                echo "$file_name не был загружен";
                echo "</pre>";
            }
    } elseif (!checkType($type)) {
        echo "<pre>";
        echo "$file_name имеет не верный тип. Файл не был загружен";
        echo "</pre>";
    } elseif (!checkSize($size)) {
        echo "<pre>";
        echo "Превышен размер файла $file_name. Файл не был загружен";
        echo "</pre>";
    } else {
        echo "<pre>";
        echo "$file_name не был загружен из-за ошибки сервера";
        echo "</pre>";
    }
}



// for($key = 0; $key < $total_files; $key++) {

    // проверка на соответствие типу
    // if (in_array($files["pictures"]["type"][$key], array('image/jpg', 'image/jpeg', 'image/png'))) {
    //     return true;
    // } else {
    //     return false;
    // }

    // проверка на соответствие размеру
    // $maxFileSize = 5 * 1024 * 1024; //5MB
 
    // if ($files["pictures"]["size"][$key] < $maxFileSize){
    //     return true;
    // } else {
    //     return false;
    // }

    // проверка на наличие ошибок загрузки
    // if ($files["pictures"]["error"][$key] == 0){
    //     return true;
    // } else {
    //     return false;
    // }

//     $tmp_name = $files['pictures']['tmp_name'][$key];
//     $file_name = $files['pictures']['name'][$key];
//     $file_name = microtime() . $file_name;

//     if (move_uploaded_file($tmp_name, "image/$file_name")){
//         echo 'Файл успешно загружен';
//     } else {
//         echo 'Файл не был загружен';
//     }
// }