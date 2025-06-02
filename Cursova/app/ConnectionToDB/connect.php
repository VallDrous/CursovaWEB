<?php

$driver = 'mysql';
$host = 'localhost';
$db_name = 'capybarashopdb';
$db_user = 'root';
$db_password = 'mysql';
$charset = 'utf8';
$ophions = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try{
    $pdo = new PDO(
        "$driver:host=$host;dbname=$db_name;charset=$charset",$db_user, $db_password, $ophions
    );
}catch(PDOException $i){
    die("gg");
}