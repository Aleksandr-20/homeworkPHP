<?php

    require_once 'Item.php';
    require_once 'ItemStorage.php';

// создать объекты Item (товар) и ItemStore (хранилище)

    $ballpoint_pen = new Item(1, 'Шариковая ручка');
    $ballpoint_pen->price = 1250;
    $ballpoint_pen->setMaterial('алюминий');
    // $ballpoint_pen->setMaterial('латунь');
    // $ballpoint_pen->setMaterial('нержавеющая сталь');

    $notebook = new Item(2, 'Блокнот');
    $notebook->price = 220;
    $notebook->setMaterial('бумага');

    $pencil = new Item(3, 'Карандаш');
    $pencil->price = 59;
    $pencil->setMaterial('дерево');

    $item_storage = new ItemStorage();

// добавить товары в хранилище

    $item_storage->add_item($ballpoint_pen);
    $item_storage->add_item($notebook);
    $item_storage->add_item($pencil);

// вызвать методы поиска товаров в хранилище:
// get_by_material
    var_dump($item_storage->get_by_material('дерево', 'алюминий', 'пластик'));

// get_by_price_and_material
    var_dump($item_storage->get_by_price_and_material(1000, 'бумага'));

// get_by_price
    var_dump($item_storage->get_by_price(100, 1500));    