<?php
    require('../ConnectionToDB/connect.php');
    $name = $_POST['name_item'];
    try{
        $stmt = $pdo->query("DELETE FROM item WHERE name_stuff = '$name'");   
        if($stmt->rowCount() === 1){
            echo json_encode(["success" => true]);
        }
        else{
            echo json_encode(["success" => false]);
        }
    }
    catch(PDOException $e){
        echo json_encode(["success" => false]);
    }