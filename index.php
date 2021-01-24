<?php

use app\Controller\ProductController;

require __DIR__."/vendor/autoload.php";

$controller = new \app\Controller\ProductController();
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : NULL;
$controller = new ProductController();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="bootstrap-5.0.0/css/bootstrap.css">
    <script src="bootstrap-5.0.0/js/bootstrap.js"></script>

    <title>Product Manager</title>
</head>
<body>
<?php

switch ($page){
    case 'list':
        $controller->viewAllProduct();
        break;
    case 'add':
        $controller->addProduct();
        break;
    case 'delete':
        $controller->deleteProduct();
        break;
    case 'update':
        $controller->updateProduct();
        break;
    case 'search':
        $controller->searchProduct();
        break;
    default:
        $controller->viewAllProduct();
}


?>

