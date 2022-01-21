<?php

$server = $_SERVER;

if ($server['REQUEST_METHOD'] === 'POST') {
    $post = $_POST;

    if ($post['login'] === 'qwe' && $post['password'] === '123') {
        // return 1;
        echo 'SUCCESS';
    } else {
        // return 0;
        echo 'FAIL';
    }
}