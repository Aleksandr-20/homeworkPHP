<?php

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
];

// Первый вариант: 
// uasort() - сортирует массив, используя пользовательскую функцию для сравнения элементов и сохранением ключей

// По возрастанию:
function cmp_function($a, $b){
	return ($a['price'] > $b['price']);
}
 
uasort($items, 'cmp_function');
print_r($items);
 
// По убыванию:
function cmp_function_desc($a, $b){
	return ($a['price'] < $b['price']);
}
 
uasort($items, 'cmp_function_desc');
print_r($items);


