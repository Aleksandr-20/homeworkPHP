<?php
require_once 'lib/Interface.php';

class PrintGreetings implements InterfaceCommand {

    public function configure()
    {
        return 'greetings';
    }

    public function execute()
    {
        echo 'Hello, world!';
    }

    public function help()
    {
        echo 'Выводит приветствие';
    }

}