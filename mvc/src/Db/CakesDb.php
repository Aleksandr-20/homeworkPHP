<?php
namespace Cakes\Db;

use Cakes\Kernel\DBConnection;
use PDO;

class CakesDb
{
    private $dbConnection;

    public function __construct(){
        $this->dbConnection = DbConnection::getInstance()->getConnection();
    }

    public function getAll(){
        $sql = "SELECT * FROM tb_cakes;";
        $statement = $this->dbConnection->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCakeById($id){
        $sql = "SELECT * FROM tb_cakes WHERE id = ? ;";
        $statement = $this->dbConnection->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getCakeByTitle($title){
        $sql = "SELECT * FROM tb_cakes WHERE title = ? ;";
        $statement = $this->dbConnection->prepare($sql);
        $statement->execute([$title]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function addToTable($title, $price, $description, $name_picture){
        $sql = "INSERT INTO tb_cakes (title, price, description, name_picture) VALUE (:title_param, :price_param, :desc_param, :name_picture_param);";

        $statement = $this->dbConnection->prepare($sql);
        return $statement->execute([
            'title_param' => $title,
            'price_param' => $price,
            'desc_param' => $description,
            'name_picture_param' => $name_picture
        ]);
    }

    public function editCake($title, $price, $description, $name_picture){
        $sql = "UPDATE tb_cakes 
                SET price = :price_param, 
                    description = :desc_param, 
                    name_picture = :name_picture_param 
                    WHERE title = :title_param;";
                    
        $statement = $this->dbConnection->prepare($sql);
        return $statement->execute([
            'title_param' => $title,
            'price_param' => $price,
            'desc_param' => $description,
            'name_picture_param' => $name_picture
        ]);
    }
}