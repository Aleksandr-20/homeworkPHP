<?php

function checkLogPas(string $log, string $pas) {
    if ($log !== 'qwe' && $pas !== '123') {
        return true;
    } else {
        return false;
    }
}

var_dump(checkLogPas('qwe', '123'));
var_dump(checkLogPas('qwerty', '123456'));