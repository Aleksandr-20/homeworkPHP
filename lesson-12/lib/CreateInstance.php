<?php
/*
1) класс принимает на вход файл с командами, чтобы можно было использовать разные названия

2) массив $argv тоже пусть принимает аргументом */

class CreateInstance {
    private $commands;

    public function __construct(string $filename)
    {
        $this->commands = $commands = require_once $filename;
    }

    public function run(array $argv)
    {

        if ($argv[1] === 'list') {
            foreach ($this->commands as $key => $value) {
                // подключаем файл require_once без сохранением в переменную
                require_once $value . '.php';
                // создаем объект
                $obj = new $value();
                // вызываем метод
                echo $key . ': ' . $obj->help() . PHP_EOL; // добавлен перенос
            }
        } elseif (in_array($argv[1], array_keys($this->commands))) {
                                   // значение ключа
            require_once $this->commands[$argv[1]] . '.php';
            // создаем объект
            // echo $this->commands[$argv[1]];
            $obj = new $this->commands[$argv[1]]();

            // второго аргумента может и не быть,
            // поэтому проверяем на наличие аргумента (isset) и на равенство help
            if (isset($argv[2]) && $argv[2] === 'help') {
                echo $obj->help();
            } else {
                $obj->execute();
            }
        } else {
            echo 'Команда $argv[1] не определена!';
        }
    }
}

// в run-файле передаем аргументы