<?php

namespace Cakes\Controllers;

use Cakes\Db\CakesDb;
use Cakes\Kernel\FileHandler;

class CakeController
{
    private $cakeDB;

    public function __construct(){
        $this->cakeDB = new CakesDb();
    }

    public function getAll() {
        $cakes = $this->cakeDB->getAll();
        if ($cakes) echo json_encode($cakes);
        else echo json_encode([]);
    }

    public function getCake() {
        $get = $_GET;
        $cakes = $this->cakeDB->getCakeById($get['id']);
        if ($cakes) echo json_encode($cakes);
        else echo json_encode(null);
    }

    public function editCake() {
        $put_data = file_get_contents('php://input'); // так же можно считать любые данные которые пришли в теле сообщения - это строка
        $put_data = json_decode($put_data, true); // см.видео 01:40:00
        // $put_data = [['title' => '', 'price' => '']]
        if (!$this->cakesDB->editCake($put_data['title'], $put_data['price'], $put_data['description'], $put_data['name_picture'])) {
            echo json_encode([
                'message' => 'error',
                'reason' => 2
            ]);
            return;
        }
        echo json_encode([
            'message' => 'success'
        ]);
    }

    public function addCake() {
        $post = $_POST;

        if ($this->cakeDB->getCakeByTitle($post['cake_title'])) {
            echo json_encode([
                'message' => 'error',
                'reason' => 1
            ]);
            return;
        }

        $imgUpload = FileHandler::loadImageFile();

        if (!$imgUpload) {
            echo json_encode([
                'message' => 'ERROR',
                'reason' => 3
            ]);
            return;
        }

        if (!$this->cakeDB->addToTable($post['cake_title'], $post['cake_price'], $post['cake_description'], $imgUpload)) {
            echo json_encode([
                'message' => 'ERROR',
                'reason' => 2
            ]);
            return;
        }

        echo json_encode([
            'message' => 'success'
        ]);
    }
}