<?php session_start()?>
<?php include("../path.php");?>
<?php
    if (isset($_SESSION['alert'])) {
        echo "<script>alert('{$_SESSION['alert']}');</script>";
        unset($_SESSION['alert']);
    }
?>
<?php
    require('../app/ConnectionToDB/connect.php');
    if(isset($_COOKIE['user'])){
        $data = json_decode($_COOKIE['user'], true);
        $id = $data['id'];
        $dataOfBasketUser = $pdo->query("SELECT basket.item_id, basket.count, item.name_stuff, item.image, item.price FROM basket INNER JOIN item ON basket.item_id = item.id WHERE basket.user_id = '$id'");
        $itemsBasket = $dataOfBasketUser->fetchAll(PDO::FETCH_ASSOC);
    }
    else{
        header('location: ' . BASE_URL . 'Log/LogCS.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="BasketCSStyle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Basket</title>
</head>
<body>
    <?php
        if(isset($_COOKIE['user'])){ 
            include("../app/include/headerLog.php");
        }
        else{
            include("../app/include/header.php");
        }
    ?>
    <div class="base">
    <?php foreach($itemsBasket as $item){ ?>
        <div class="card" data-id="<?= $item['item_id'] ?>">
            <img src="<?= BASE_URL . 'ImageOFItem' . $item['image'] ?>">
            <label><?= $item['name_stuff'] ?></label>
            <label class="item-total"><?= $item['count'] * $item['price'] ?></label>
            
            <i class='bx bx-plus-circle btn-increase'></i>
            <label class="item-count"><?= $item['count'] ?></label>
            <i class='bx bx-minus-circle btn-decrease'></i>
        </div>
    <?php } ?>
    </div>
    <div class = "purchase">
        <a href = "../app/controllers/designPurchase.php"><button class = "purchaseButton">Оформити замовлення</button></a>
    </div>
    <script src = "incDecr.js"></script>
    <script src = "..\CodeStyle\styleJS.js"></script>
    <script>
        window.BASE_URL = <?= json_encode(BASE_URL) ?>;
    </script>
    <script src="../CodeAction/itemFindEnter.js"></script>
    <script>
            window.onload = function () {
                <?php if(isset($_SESSION['ERROR_basket'])){?>
                    alert("<?= $_SESSION['ERROR_basket']?>");
                <?php unset($_SESSION['ERROR_basket']); } ?>
            };
    </script>
</body>
</html>