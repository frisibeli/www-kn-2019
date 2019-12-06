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

$result = $productsRepository->getAllProducts();

echo json_encode($result);

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
