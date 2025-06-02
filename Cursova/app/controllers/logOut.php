<?php
    session_start();
    require("../../path.php");
    if(isset($_COOKIE['user'])){
        setcookie('user', json_encode($data), time() - 2629800, '/');
        header('Location: ' . BASE_URL . 'Main/CapybaraShopMain.php');
    }