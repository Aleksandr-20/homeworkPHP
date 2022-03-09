<?php

// Сгенерировать html с выводом информации о товарах

$items = [
    [
        'id' => 1,
        'title' => 'Flute',
        'price' => 20000,
        'img' => 'flute.jpg',
        'description' => [
            'color' => 'white',
            'material' => 'bamboo'
        ]
    ],
    [
        'id' => 2,
        'title' => 'Guitar',
        'price' => 18000,
        'img' => 'guitar.jpg',
        'description' => [
            'color' => 'brown',
            'material' => 'linden'
        ]
    ],
    [
        'id' => 3,
        'title' => 'Drum',
        'price' => 68000,
        'img' => 'drum.jpg',
        'description' => [
            'color' => 'brown',
            'material' => 'steel'
        ]
    ],
]; ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ДЗ к заниятию 2</title>
</head>
<body>

    <main>
        <section class="goods-info">
        <h2>All goods</h2>

            <?php foreach ($items as $item): ?>
                <div class="good-card">
                    <h3><?= $item['title'] ?></h3>
                    <p><?= $item['price'] ?></p>
                    <img height="300" src="/img/<?= $item['img'] ?>" alt="<?= $item['title'] ?>">
                    <div>
                        <h4>Description:</h4>
                        <span>Color: <?= $item['description']['color'] ?></span><br>
                        <span>Material: <?= $item['description']['material'] ?></span>
                    </div>
                </div>
            <?php endforeach; ?>   

        </section>		
	</main>
    
</body>
</html>