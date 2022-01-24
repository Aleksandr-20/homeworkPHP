<?php
// реализовать механизм генерации нового id сессии каждые 10 минут
// для получения временной метки исп-ть ф-ю time()

session_start();
regenerate_id();

function regenerate_id(){
    if (isset($_SESSION['time']) && $_SESSION['time'] + 600 <= time()) {
        if (session_regenerate_id()) $_SESSION['time'] = time();
    }
}