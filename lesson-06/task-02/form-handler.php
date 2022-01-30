<?php 

const USER_REG = 'user_reg.txt';

$post = $_POST;

$login = $post['login'];
$password = $post['password'];

if (file_put_contents(USER_REG, $login . ' ' . $password . PHP_EOL, LOCK_EX | FILE_APPEND) !== false){
    echo 'Данные успешно записаны';
} else {
    echo 'Данные не были записаны';
}