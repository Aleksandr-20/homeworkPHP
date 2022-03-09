<?php

// НАПИШИТЕ ФУНКЦИЮ, КОТОРАЯ ПРИНИМАЕТ НА ВХОД массив И ВОЗВРАЩАЕТ НОВЫЙ МАССИВ, В КОТОРЫЙ ВОЙДУТ:
// 1) НОВЫЕ ЗАДАЧИ (Дата задачи > date_create())
// 2) ЗАКРЫТЫЕ ЗАДАЧИ (со значением closed равным true)
// 3) НЕВЫПОЛНЕННЫЕ ЗАДАЧИ (со значением closed равным false и датой меньше date_create())

function get_all_tasks(){
    return [
        [
            'title'=>'Задача 1',
            'date'=>date_create('yesterday'),
            'participants'=>['Артур', 'Полина'],
            'closed'=>false
        ],
        [
            'title'=>'Задача 2',
            'date'=>date_create('tomorrow'),
            'participants'=>[],
            'closed'=>false
        ],
        [
            'title'=>'Задача 3',
            'date'=>date_create(),
            'participants'=>['Артур', 'Глеб'],
            'closed'=>false
        ],
        [
            'title'=>'Задача 4',
            'date'=>date_create('yesterday'),
            'participants'=>['Павел', 'Полина'],
            'closed'=>true
        ]
    ];
}

function getNewArray(array $arr) :array
{
    $newArr = [];
    foreach ($arr as $task) {
        // 1. НОВЫЕ ЗАДАЧИ (Дата задачи > date_create())

        // if ($task['date'] > date_create()) {
        //     $newArr[] = $task;
        // }
        
        // 2. ЗАКРЫТЫЕ ЗАДАЧИ (со значением closed равным true)

        // if ($task['closed']) {
        //     $newArr[] = $task;
        // }

        // 3. НЕВЫПОЛНЕННЫЕ ЗАДАЧИ (со значением closed
        //  равным false и датой меньше date_create())

        if ($task['closed'] === false && $task['date'] < date_create()) {
            $newArr[] = $task;
        }
    }
    return $newArr;
}

$newTasks = getNewArray(get_all_tasks());

function pre($newTasks) {
    echo '<pre>';
    var_dump($newTasks);
    echo "</pre>";
}

pre($newTasks);