<?php

class Item
{
    private $id; // не может быть отрицательным или 0
    private $title; // максимум 10 символов
    private $price; // не может быть отрицательным или 0
    private $material; // минимум 3 символа

    // свойства title и id являются обязательными
    public function __construct(int $id, string $title)
    {
        if ($id !== 0 && $id > 0) $this->id = $id;
        if (mb_strlen($title) !== 0 && mb_strlen($title) <= 10) $this->title = $title;
    }


    // добавить все необходимые геттеры и сеттеры
        
    // id не может быть отрицательным или 0
    public function setId(int $id)
    {
        if ($id <= 0) {
            throw new InvalidArgumentException('id не может быть отрицательным или 0');
        }
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    // title максимум 10 символов
    public function setTitle(string $title)
    {
        if (mb_strlen($title) > 10) {
            throw new InvalidArgumentException('значение title не может быть более 10 символов');
        }
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    // price не может быть отрицательным или 0
    public function setPrice(int $price)
    {
        if ($price <= 0) {
            throw new InvalidArgumentException('значение price не может быть отрицательным или 0');
        }
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    // material минимум 3 символа
    public function setMaterial(string $material)
    {
        if (mb_strlen($material) < 3) {
            throw new InvalidArgumentException('значение material не может быть менее 3 символов');
        }
        $this->material = $material;
    }

    public function getMaterial()
    {
        return $this->material;
    }

}