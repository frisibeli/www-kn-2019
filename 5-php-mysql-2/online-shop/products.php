<?php

require 'libs/db.php';
require 'repositories/productsRepository.php';

$dbConnection = DB::getConnection();
$productsRepository = new ProductsRepository($dbConnection);

$product = [
    'name' => "Sony",
    'description' => "Quite nice TV",
    'image' => 'no image',
    'price' => 1023
];



switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if ($_GET['id']){
            $result = $productsRepository->get($_GET['id']);
            echo json_encode($result);
        } else {
            $result = $productsRepository->getAllProducts();
            echo json_encode($result);
        }
        break;

    case 'POST':
        $postRaw = file_get_contents('php://input');
        $jsonParsed = json_decode($postRaw, true);
        $result = $productsRepository->create($jsonParsed);
        var_dump($result);
        break;
    
    default:
        echo "Unsupported method";
        break;
}

// var_dump($productsRepository->create($product));

// if(!file_get_contents('php://input')){
//     $products = $productsRepository->search([
//         'name' => "",
//         'description' => "%amb%"
//     ]);
    
//     echo json_encode($products);
// } else {
//     var_dump(json_decode(file_get_contents('php://input'), true));
// }
