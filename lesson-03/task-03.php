<?php

// НАПИШИТЕ ФУНКЦИЮ, КОТОРАЯ ПРИНИМАЕТ НА ВХОД ЛОГИН И ПАРОЛЬ
// ЕСЛИ ЛОГИН НЕ РАВЕН 'qwe', А ПАРОЛЬ НЕ РАВЕН '123', ФУНКЦИЯ ВОЗВРАЩАЕТ false,
// В ПРОТИВНОМ СЛУЧАЕ ВОЗВРАЩАЕТ true. 
// ТИП ВХОДЯЩИХ И ВОЗВРАЩАЕМЫХ ДАННЫХ ОПРЕДЕЛИТЬ САМОСТОЯТЕЛЬНО.

function checkLogPas(string $log, string $pas) {
    if ($log !== 'qwe' && $pas !== '123') {
        return true;
    } else {
        return false;
    }
}

var_dump(checkLogPas('qwe', '123'));
var_dump(checkLogPas('qwerty', '123456'));