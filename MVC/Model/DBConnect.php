<?php

namespace App\Model;

use PDO;

class DBConnect
{
    protected $dsn;
    protected $user;
    protected $password;


    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=module2; charset =utf8";
        $this->user = "root";
        $this->password = "Hoaithuong2105@";
    }

    public function connect()
    {
        try {
            $product = new PDO($this->dsn, $this->user, $this->password);
            echo 'kết nối thành công';
            return $product;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        return null;
    }

    public function query($statement)
    {
        $stmt = $this->connect()->query($statement);
        return $stmt->fetchAll();
    }

    public function execute($statement)
    {
        $stmt = $this->connect()->prepare($statement);
        $stmt->execute();
    }
}