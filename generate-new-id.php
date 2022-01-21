<?php
// реализовать механизм генерации нового id сессии каждые 10 минут
// для получения временной метки исп-ть ф-ю time()

session_start();

$_SESSION['time'] = time();

if ($_SESSION['time'] < time() + 600000){
    session_regenerate_id();   
    $_SESSION['time'] = time();
}