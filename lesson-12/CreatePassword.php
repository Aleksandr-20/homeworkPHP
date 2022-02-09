<?php
require_once 'lib/Interface.php';

class CreatePassword implements InterfaceCommand {

    public function configure()
    {
        return 'password';
    }

    public function execute()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1; // put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        echo implode($pass); // turn the array into a string
    }

    public function help()
    {
        return 'Генерирует пароль';
    }

}