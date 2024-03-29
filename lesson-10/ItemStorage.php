<?php


class ItemStorage{
    private $items = [];

    // добавление товара в хранилище,
    // товары в массиве хранятся по значению id:
    // id товара => товар
    public function add_item(Item $item){
        $this->items[$item->getId()] = $item;
    }

    // написать реализацию следующих методов
    public function get_by_id(string $id){
        // возвращает товар по id
        return $this->items[$id];
    }

    public function get_by_title(string $title){
        // возвращает товар по названию (title)
        foreach ($this->items as $item) {
            if ($item->getTitle() == $title) {
                return $item;
            }
        }
    }

    public function get_by_price(int $price_from, int $price_to){
        // возвращает товары, стоимость которых находится в диапазоне от $price_from до $price_to
        $result_price = [];
        foreach ($this->items as $item) {
            if ($item->getPrice() >= $price_from && $item->getPrice() <= $price_to) {
                $result_price[] = $item;
            }
        }
        return $result_price;
    }

    public function get_by_material(...$materials){
        // возвращает товары, которые изготовлены из материалов, перечисленных в $materials,
        // например,
        // при вызове в метод передаются ->get_by_material('дерево', 'железо', 'пластик');
        // значит метод должен вернуть все товары, сделанные из дерева, железа или пластика
        $result_material = [];
        foreach ($this->items as $item) {
            if (in_array($item->getMaterial(), $materials)) {
                $result_material[] = $item;
            }
        }
        return $result_material;
    }

    public function get_by_price_and_material(int $price_to, string $material){
        // возвращает товары, стоимость которых не превышает $price_to и
        // материал, из которого изготовлен товар соответствует $material
        $result_price_material = [];
        foreach ($this->items as $item) {
            if ($item->getPrice() <= $price_to && $item->getMaterial() == $material) {
                $result_price_material[] = $item;
            }
        }
        return $result_price_material;
    }
}