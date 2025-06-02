<?php
    session_start();
    require("../../path.php");
    require('../ConnectionToDB/connect.php');    
    $login = $_POST['login'];
    $password = $_POST['password'];
    $passwordAgain = $_POST['passwordAgain'];

    if($password === $passwordAgain){
        $password = md5($password);
        $date = date('Y-m-d');
        try{
            $pdo->query("INSERT INTO `user` (`username`, `user_password`, `data_of_reg`, `role_id`) VALUES ('$login', '$password', '$date', 1)");
            header('location: ' . BASE_URL . 'Log/LogCS.php');
        }
        catch(PDOException $e){
            $_SESSION['message'] = 'користувач вже існує';
            header('location: ' . BASE_URL . 'Reg/RegCS.php');
        }
    }
    else{
        $_SESSION['message'] = 'паролі не співпали';
        header('location: ' . BASE_URL . 'Reg/RegCS.php');
    }