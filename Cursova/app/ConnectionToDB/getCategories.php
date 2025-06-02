<?php
require('connect.php');

$stmt = $pdo->query("SELECT * FROM category");

$dict = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $dict[$row['id']] = $row['category_name'];
}

echo json_encode($dict, JSON_UNESCAPED_UNICODE);