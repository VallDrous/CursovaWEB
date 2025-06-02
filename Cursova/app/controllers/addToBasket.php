<?php
    session_start();
    require('../ConnectionToDB/connect.php');
    require('../../path.php');
    if(isset($_COOKIE['user'])){
        $dataOfUser = json_decode($_COOKIE['user'], true);
        $userId = $dataOfUser['id'];
        $itemId = $_POST['itemId'];
        $valueForFind = $_POST['valueForFind'];
        $pdo->query("INSERT INTO basket (user_id, item_id, count)
                    SELECT * FROM (
                        SELECT '$userId' AS user_id, '$itemId' AS item_id, 1 AS count
                    ) AS tmp
                    WHERE NOT EXISTS (
                        SELECT 1 FROM basket WHERE user_id = '$userId' AND item_id = '$itemId'
                    ) LIMIT 1;");
    }