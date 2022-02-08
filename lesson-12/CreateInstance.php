<?php

class CreateInstance {

    public function run() 
    {
        $commands = require_once 'lib/commands.php';
        if ($argv[1] === 'list') {
            foreach ($commands as $key => $value) {
                $method = require_once $value . '.php';
                echo $key . ': ' . $method->help();
            }
        } elseif (in_array($argv[1], array_keys($commands))) {
                                   // значение ключа
            $method = require_once $commands[$argv[1]] . '.php';
            if ($argv[2] === 'help') {
                echo $method->help();
            } else {
                $command->execute();
            }
        } else {
            echo 'Команда $argv[1] не определена!';
        }
    }

}