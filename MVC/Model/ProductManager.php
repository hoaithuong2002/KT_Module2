<?php

namespace App\Model;

use App\Model\DBConnect;

class ProductManager
{
    protected $dbConnect;

    public function __construct()
    {
        $this->dbConnect = new DBConnect();
    }

    public function getAllProduct()
    {
        $statement = 'SELECT * FROM `products` ';
        $data = $this->dbConnect->query($statement);
        $products = [];
        foreach ($data as $item) {
            $products [] = new Product($item['id'], $item['name'], $item['category'], $item['price'], $item['amount'], $item['date'], $item['description']);
        }
        return $products;
    }

    public function addProduct($product)
    {
        $id = $product->getID();
        $name = $product->getName();
        $category = $product->getCategory();
        $price = $product->getPrice();
        $amount = $product->getAmount();
        $date = $product->getDate();
        $description = $product->getDescription();
        $sql = "INSERT INTO `products`( `id`,`name`, `category`, `price`, `amount`,`date`, `description`) VALUES ('id','$name','$category','$price','$amount','$date','$description')";
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM `products` WHERE id='$id'";
        $this->dbConnect->execute($sql);
    }

    public function updateProduct($id, $product)
    {
        $id = $product->getId();
        $name = $product->getName();
        $category = $product->getCategory();
        $price = $product->getPrice();
        $amount = $product->getAmount();
        $date = $product->getDate();
        $description = $product->getDescription();
        $sql = "UPDATE `products` SET `name`='$name',`category`='$category',`price`='$price' ,`amount`='$amount',`date`='$date',`description`='$description'WHERE id='$id'";
        $this->dbConnect->execute($sql);
    }

    function getProductById($id)
    {
        $sql = "SELECT * FROM `product` WHERE `id`=:id";
        $statement = $this->data->connectDB()->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        return $statement->fetch();

    }
    function searchProduct($keyword){
        $sql = "SELECT * FROM `product` WHERE `name` LIKE :keyword";
        $statement = $this->data->connectDB()->prepare($sql);
        $statement->bindValue(':keyword','%'.$keyword.'%');
        $statement->execute();
        $data = $statement->fetchAll();
        $arr = [];
        foreach ($data as $item){
            $product = new Product($item['id'], $item['name'], $item['category'], $item['price'], $item['amount'], $item['date'], $item['description']);
            $product->setId($item['id']);
            array_push($arr,$product);
        }
        return $arr;
    }
}