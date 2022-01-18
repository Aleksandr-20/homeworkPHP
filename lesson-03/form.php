<?php

$server = $_SERVER;

if ($server['REQUEST_METHOD'] === 'POST') {
    $post = $_POST;

    if ($post['login'] === 'qwe' && $post['password'] === '123') {
        // return true;
        echo 'SUCCESS';
    } else {
        // return false;
        echo 'FAIL';
    }
}

?>
        