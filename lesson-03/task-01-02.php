<?php

$items = [
    [
        'id' => 1,
        'title' => 'Flute',
        'price' => 20000,
    ],
    [
        'id' => 2,
        'title' => 'Guitar',
        'price' => 18000,
    ],
    [
        'id' => 3,
        'title' => 'Piano',
        'price' => 68000,
    ],
    [
        'id' => 4,
        'title' => 'Drum',
        'price' => 68000,
    ],
];

// 1) Отсортировать массив 'price' (продумать разные варианты)

// Первый вариант: 
// uasort() - сортирует массив, используя пользовательскую функцию для сравнения элементов и сохранением ключей

// По возрастанию:
function cmp_function($a, $b){
	if ($a['price'] == $b['price']) {
        return 0;
    }
    return ($a['price'] < $b['price']) ? -1 : 1;
}
 
uasort($items, 'cmp_function');

function pre($items) {
    echo '<pre>';
    var_dump($items);
    echo "</pre>";
}

pre($items);
// var_dump($items);
 
// По убыванию:
function cmp_function_desc($a, $b){
	if ($a['price'] == $b['price']) {
        return 0;
    }
    return ($a['price'] > $b['price']) ? -1 : 1;
}
 
uasort($items, 'cmp_function_desc');

pre($items);
// var_dump($items);

// Второй вариант: 
// на основе функции array_multisort()

$data_price = array();

foreach($items as $key => $arr) {
    $data_price[$key] = $arr['price'];
}

array_multisort($data_price, SORT_DESC, $items);

pre($items);

// 2) Отсортировать массив по 'price', потом' по 'title' (если значения price одинаковые)

// Первый вариант: uasort()

function cmp_price_title($a, $b) {
    if ($a['price'] == $b['price']) {
        if ($a['title'] == $b['title']) {
            return 0;
        } else {
            return ($a['title'] < $b['title']) ? -1 : 1;
        }
    } else {
        return ($a['price'] < $b['price']) ? -1 : 1;
    }
}

uasort($items, 'cmp_price_title');

pre($items);

// Второй вариант: array_multisort()

$data_title = array();
foreach($items as $key => $arr) {
	$data_title[$key] = $arr['title'];
}

$data_price = array();
foreach($items as $key => $arr) {
	$data_price[$key] = $arr['price'];
}

array_multisort($data_price, SORT_DESC, $data_title, $items);
pre($items);