<?php
session_start();
require('../ConnectionToDB/connect.php');
header('Content-Type: application/json');

$user_inf = json_decode($_COOKIE['user'], true);;
$user_id = $user_inf['id'];
$item_id = (int)$_POST['item_id'];
$action = $_POST['action'];

try {
    $stmt = $pdo->prepare("SELECT count FROM basket WHERE user_id = ? AND item_id = ?");
    $stmt->execute([$user_id, $item_id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        echo json_encode(["success" => false]);
        exit;
    }

    $count = (int)$row['count'];
    $count = $action === 'increase' ? $count + 1 : max(0, $count - 1);

    if ($count === 0) {
        $stmt = $pdo->prepare("DELETE FROM basket WHERE user_id = ? AND item_id = ?");
        $stmt->execute([$user_id, $item_id]);

        echo json_encode(["success" => true, "delete" => true, "new_count" => 0]);
    } else {
        $stmt = $pdo->prepare("UPDATE basket SET count = ? WHERE user_id = ? AND item_id = ?");
        $stmt->execute([$count, $user_id, $item_id]);

        echo json_encode(["success" => true, "new_count" => $count]);
    }

} catch (PDOException $e) {
    echo json_encode(["success" => false]);
}