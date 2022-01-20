<?php
    $goods = require_once 'items-data.php';
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Товары</title>
    <link rel="stylesheet" href="/css/goods.css">
</head>
<body>
<main>
    <h1>Все товары</h1>
    <? foreach ($goods as $good): ?>
    <div class="good-card">
        <h2><?= $good['title'] ?></h2>
        <div>
            <img src="/images/<?= $good['image'] ?>">
        </div>
        <p>Стоимость: <?= $good['price'] . ' ₽' ?></p>

        <?php if ($good['count'] === 0): ?>
        <p>Нет в наличии</p>
        <?php else: ?>
        <a href="good.php?id=<?= $good['id'] ?>">Подробнее</a>
        <?php endif; ?>

    </div>
    <? endforeach; ?>
</main>
</body>
</html>