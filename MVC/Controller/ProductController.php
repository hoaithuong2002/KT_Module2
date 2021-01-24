<?php



namespace app\Controller;


use app\Model\Product;
use app\Model\ProductManager;

class ProductController
{
    protected $productManager;

    public function __construct()
    {
        $this->productManager = new ProductManager();
    }

    function ViewAllProduct(){
        $products = $this->productManager->getAllProduct();
        include_once 'MVC/View/listProduct.php';
    }

    function addProduct(){
        if ($_SERVER['REQUEST_METHOD']=="GET"){
            include_once 'MVC/View/addProduct.php';
        } else {
            $name = $_POST['name'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $amount = $_POST['amount'];
            $description = $_POST['description'];

            $product = new Product($name,$category,$price,$amount,$description);
            $this->productManager->addProduct($product);
            header('location:index.php');
        }
    }

    function deleteProduct(){
        if ($_SERVER['REQUEST_METHOD']=='GET'){
            $id = $_REQUEST['id'];
            $this->productManager->deleteProduct($id);
            header('location:index.php');
        }
    }

    function updateProduct(){
        if ($_SERVER['REQUEST_METHOD']=="GET"){
            $id=$_REQUEST['id'];
            $product = $this->productManager->getProductById($id);
            include_once 'MVC/View/update.php';
        } else {
            $id = $_REQUEST['id'];
            $name = $_POST['name'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $amount = $_POST['amount'];
            $description = $_POST['description'];

            $product = new Product($name,$category,$price,$amount,$description);
            $product->setId($id);
            $this->productManager->updateProduct($product);
            header('location:index.php');
        }
    }

    function searchProduct(){
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            $keyword = $_POST['keyword'];
            $products = $this->productManager->searchProduct($keyword);
            $this->productManager->searchProduct($products);
            include_once 'MVC/View/listProduct.php';
        }
    }
}