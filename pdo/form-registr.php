<?php
require_once 'DB-connection.php';

$method = $_SERVER['REQUEST_METHOD'];
$post = $_POST;
$log = trim($post['login']);
$pwd = trim($post['password']);
$doublePass = trim($post['again-password']);

if ($method !== 'POST') {
    header("Location: form-registr.html");
} elseif ($method === 'POST') {
    $user = get_user_by_login($log);
    if ($user) {
        header("Location: form-registr.html");
    } else {
        if ($pwd !== $doublePass) {
            echo 'Пароли должны совпадать!';
        } elseif (add_new_user($log, $pwd) && $pwd === $doublePass) {
            echo 'Поздравляем! Регистрация прошла успешно!
                  Пожалуйста, <a href="form-auth.html">авторизируйтесь</a>';
            // header("Location: /signup?message=Успешная регистрация, переходите к записи"); // в строке запроса при перенаправлении можно передать что угодно
        } else {
            echo 'Произошла ошибка. Попробуйте позже';
        }
    }
} else {
    echo 'Произошла ошибка. Попробуйте позже';
    header("Location: main.php");
}

function add_new_user($login, $password) {
    $connection = DbConnection::getInstance()->getConnection();
    $sql = "INSERT INTO reg_users(login, password) VALUE (:log_param, :pass_param);";
    $params = [
        'log_param' => $login,
        'pass_param' => $password
    ];
    $statements = $connection->prepare($sql);
    return $statements->execute($params);
}

function get_user_by_login (string $login) {
    $sql = "SELECT id, login FROM reg_users WHERE login = :log_param;";
    $params = [
        'log_param' => $login
    ];
    $connection = DbConnection::getInstance()->getConnection();
    $statement = $connection->prepare($sql);
    $statement->execute($params);
    return $statement->fetch(PDO::FETCH_ASSOC);
}