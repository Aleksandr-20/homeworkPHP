<?php
require_once 'lib/Interface.php';

class CreatePassword implements InterfaceCommand {

    public function configure()
    {
        return 'password';
    }

    public function execute()
    {
        var password = "";
        var symbols = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!№;%:?*()_+=";
        for (var i = 0; i < 8; i++){
            password += symbols.charAt(Math.floor(Math.random() * symbols.length));     
        }
        // return password;
        echo password;
    }

    public function help()
    {
        echo 'Генерирует пароль';
    }

}