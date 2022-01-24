<?php
$cakes = require_once 'cakes-data.php';
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Тортики</title>
    <link rel="stylesheet" href="css/cakes.css">
</head>
<body>
<main>
    <? foreach ($cakes as $cake): ?>
    <div class="cake">
        <h2><?= $cake['name'] ?></h2>
        <div>
            <img src="/images/<?= $cake['main_img'] ?>">
        </div>
        <p>Стоимость: <?= $cake['price'] . $cake['currency'] ?></p>
        <button id="<?= $cake['id'] ?>" class="personal">Подробнее</button>
    </div>
    <? endforeach; ?>

    <section id="myModal" class="modal">
        <div class="modal-content">

            <div class="modal-header">
                <span class="close">&times;</span>
                <h2><?= $cake['name'] ?></h2>
            </div>

            <div class="info">
                <p><?= $cake['description'] ?></p>
                <p>Стоимость: <?= $cake['price'] . $cake['currency'] ?></p>
                <!-- <div class="img">
                    <img src="/images/<?= $cake['main_img']?>">
                </div> -->
                <div class="imgs">
                    <? foreach ($cake['imgs'] as $img): ?>
                    <img src="/images/<?= $img?>">
                    <? endforeach; ?>
                </div>
                <div class="buy">
                    <a href="#">Заказать</a>
                </div>
            </div>
           
        </div>
        
    </section>
    <script src="js/cakes.js"></script>
</main>
</body>
</html>