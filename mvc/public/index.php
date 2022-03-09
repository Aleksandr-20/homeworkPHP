<?php
use Cakes\Kernel\Router;

require_once '../vendor/autoload.php';

if (preg_match('/\.(css|js)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}

\Cakes\Kernel\Router::start();
// Router::start();