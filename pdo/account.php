<?php
session_start();

$session = $_SESSION;

if (!isset($session['login'])){
    header('Location: form-auth.html');
}

$login = $session['login'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Личный кабинет</title>
        <meta charset="utf-8">
        <!-- <link rel="stylesheet" type="text/css" href="css/styles.css"> -->
    </head>
    <body>
        <h1>Личный кабинет</h1>
        <p>Добро пожаловать, <?= $login ?>!</p>
    </body>
</html>