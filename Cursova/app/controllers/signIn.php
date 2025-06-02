<?php 
    session_start();
    require("../../path.php");
    require('../ConnectionToDB/connect.php');  
    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $check_user = $pdo->query("SELECT * FROM `user` WHERE username = '$login' AND user_password = '$password'");
    if($check_user->rowCount() > 0){
        $inf_user = $check_user->fetch(PDO::FETCH_ASSOC);
        $data = [
            'id' => $inf_user['id'],
            'login' => $inf_user['username'],
            'dateOfReg' => $inf_user['data_of_reg'],
            'role' => $inf_user['role_id']
        ];
        
        setcookie('user', json_encode($data), time() + 2629800, '/');
        header('location: ' . BASE_URL . 'Profile/profileCS.php');
    }
    else{
        $_SESSION['message'] = "Неправильний логін або пароль";
        header('location: ' . BASE_URL . 'Log/LogCS.php');
    }