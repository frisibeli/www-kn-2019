<?php

$host = "167.71.56.154";
$db = "26240";

$user = "root";
$password = "test";

$db = new PDO("mysql:host=$host;dbname=$db", $user, $password);

$query = 'SELECT * FROM shop_items WHERE name LIKE :name';

$stmt = $db->prepare($query); 
$stmt->bindParam(":name", $_GET['search'], PDO::PARAM_STR);

$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $row['name']." - ".$row['price']. "лв<br>";
}   