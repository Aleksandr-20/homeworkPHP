<?php
// session_start();
require_once 'DB-connection.php';

$method = $_SERVER['REQUEST_METHOD'];
$post = $_POST;
$log = trim($post['login']);
$pwd = trim($post['password']);

if ($method !== 'POST') {
    header("Location: form-auth.html");
} elseif ($method === 'POST') {
    $auth_user = signup($log, $pwd);
    if ($auth_user) {
        session_start();
        $_SESSION['login'] = $log;
        echo 'SUCCESS';
    } else {
        echo 'FAIL';
    }
} else {
    echo 'Произошла ошибка. Попробуйте позже';
    header("Location: main.php");
}

function signup($login, $password) {
    $connection = DbConnection::getInstance()->getConnection();
    $sql = "SELECT * FROM reg_users WHERE login = :log_param AND password = :pass_param;";
    $params = [
        'log_param' => $login,
        'pass_param' => $password
    ];
    $statement = $connection->prepare($sql);
    $statement->execute($params);
    return $statement->fetch(PDO::FETCH_ASSOC);
}