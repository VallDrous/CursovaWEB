<?php
    require('../ConnectionToDB/connect.php');
    $name = $_POST['name_user'];
    try{
        $stmt = $pdo->query("DELETE FROM user WHERE username = '$name'");   
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