<?php 

const USER_REG = 'user_reg.txt';

$post = $_POST;

$login = $post['login'];
$password = $post['password'];

if (file_exists(USER_REG)) {
    $arr_from_file = file(USER_REG, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    // перебираем массив, каждый элемент разбиваем по пробелу
    // получаем логин по индексу 0 и пароль по индексу 1
    // и сразу сравниваем их

    foreach ($arr_from_file as $value) {
        $value = explode(" ", $value);
        
        if ($value[0] === $login) {
            echo 'Такой логин уже существует. Придумайте другой';
            exit();
        } 
    }

    if (file_put_contents(USER_REG, $login . ' ' . $password . PHP_EOL, LOCK_EX | FILE_APPEND) !== false){
        echo 'Данные успешно записаны';
    }

} else {
    if (file_put_contents(USER_REG, $login . ' ' . $password . PHP_EOL, LOCK_EX | FILE_APPEND) !== false){
        echo 'Данные успешно записаны';
    } else {
        echo 'Данные не были записаны';
    }
}


