<?php

$server = $_SERVER;

if ($server['REQUEST_METHOD'] === 'POST') {
    $post = $_POST;

    if ($post['login'] === 'qwe' && $post['password'] === '123') {
        // return false;
        echo 'SUCCESS';
    } else {
        // return true;
        echo 'FAIL';
    }
}

?>
        