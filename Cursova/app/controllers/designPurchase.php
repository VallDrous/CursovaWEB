<?php
    session_start();
    include('../../path.php');
    include("../ConnectionToDB/connect.php");
    date_default_timezone_set('Europe/Kyiv');
    $user = json_decode($_COOKIE['user'], true);
    $user_id = $user['id'];
    $basket = $pdo->query("SELECT * FROM `item` WHERE (SELECT basket.count FROM `basket` WHERE basket.user_id = $user_id AND item.id = basket.item_id) > item.count");
    $item = $pdo->query("SELECT name_stuff, price, count FROM item");
    if($basket->rowCount() == 0){
        $basketOfUser = $pdo->query("SELECT basket.item_id, basket.count, item.price FROM `basket` INNER JOIN `item` ON basket.item_id = item.id WHERE basket.user_id = $user_id");
        foreach($basketOfUser as $itemOfUserBasket){
            $item_id = $itemOfUserBasket['item_id'];
            $count = $itemOfUserBasket['count'];
            $price = $itemOfUserBasket['price'] * $count;
            $dateNow = date('Y-m-d H:i:s');
            $pdo->query("INSERT INTO `purchase_history`(`user_id`, `item_id`, `purchase_date`, `count`, `total_price`) VALUES ('$user_id','$item_id','$dateNow','$count','$price')");
            $pdo->query("UPDATE item SET count = count - $count WHERE id = $item_id");
        }
        $pdo->query("DELETE FROM basket WHERE user_id = $user_id");
        $_SESSION['ERROR_basket'] = "Замовлення оформлене успішно";
    }
    else{
        $_SESSION['ERROR_basket'] = "Кількість деякого товару перевищенна!";
    }
    header('location: ' . BASE_URL . 'Basket\BasketCS.php');