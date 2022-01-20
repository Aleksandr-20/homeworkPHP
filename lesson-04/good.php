<?php
$get = $_GET; // ['id' => 1]
$id = $get['id']; // '1' или '2' или '45' или 'irgnawria'
if (!isset($id)) {
    header("Location: goods.php");
} 
function getGood(int $id) {
    $goods = require_once 'items-data.php';
    foreach ($goods as $good){
        if ($id === $good['id']) return $good;
    }
}
$good = getGood($id);
if (!isset($good)) {
    header("Location: goods.php");
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/goods.css">
    <title>Document</title>
</head>
<body>
<section class="good-card">
    <div class="info">
        <h2><?= $good['title'] ?></h2>
        <p><?= $good['description'] ?></p>
        
        <div class="img">
            <img src="/images/<?= $good['image']?>">
        </div>
        <p>Стоимость: <?= $good['price'] . ' ₽' ?></p>
        <div class="buy">
            <a href="#">Заказать</a>
        </div>
    </div>
</section>
</body>
</html>