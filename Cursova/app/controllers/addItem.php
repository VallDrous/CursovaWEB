<?php
    include("../ConnectionToDB/connect.php");
    $nameItem = $_POST["name_item"];
    $categoryItem = $_POST["category_item"];
    $countItem = $_POST["count_item"];
    $priceItem = $_POST["price_item"];
    try{
        $pdo->query("INSERT INTO `item`(`name_stuff`, `category_id`, `count`, `price`) VALUES ('$nameItem',$categoryItem,$countItem,$priceItem)");
        echo json_encode(["success" => true]);
    }
    catch(PDOException $e){
        echo json_encode(["success" => false]);
    }
