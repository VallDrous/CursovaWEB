<?php include("../path.php");?>
<?php 
    session_start();
    if(!$_COOKIE['user']){
        header('Location: ' . BASE_URL . 'Main/CapybaraShopMain.php');
    }
    if (isset($_COOKIE['user'])) {
        $user = json_decode($_COOKIE['user'], true);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ProfileCSStyle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Basket</title>
</head>
<body>
    <?php 
    include("..\app\include\headerLog.php");
    ?>
    <div class = "menuInf">
        <h1>Інформація про аккаунт</h1>
        <div class = "avatar">
            <img src = "avatar/avatar1.jpg" id = "mainAvatar">
        </div>
        <div class = "styleButton"> 
            <button id = "btnToShowAvatar">Змінити аватарку</button>
        </div>
        <div class = "someInf">
            <label id = "username">Нікнейм : <?= $user['login']?></label>
        </div>
        <div class = "someInf">
            <label id = "data">Дата регестрації: <?= $user['dateOfReg']?></label>
        </div>
        <div class = "styleButton">
            <button><a href = "<?= BASE_URL . 'app/controllers/logOut.php'?>" style = "text-decoration: none; color: #FFFFFF;">Вийти</a></button>
        </div>
    </div>
    <div class = "avatarsCollector" id = "idAvatarsCollector">
        <img src = "avatar/avatar1.jpg" id = "avatar1">
        <img src = "avatar/avatar2.jpg" id = "avatar2">
    </div>
    <?php if($user['role'] >= 2){?>
        <div class = "addItem">
            <h1>Додати товар</h1>
            <div class = "InputContainer">
                <input class = "name_item" placeholder="Введіть назву товару"></input>
            </div>
            <div class = "InputContainer">
                <input class = "category_item" placeholder="Введіть категорію товару" type = "number"></input>
            </div>
            <div class = "InputContainer">
                <input class = "count_item" placeholder="Введіть кількість товару" type = "number"></input>
            </div>
            <div class = "InputContainer">
                <input class = "price_item" placeholder="Введіть ціну товару" type = "number"></input>
            </div>
            <div class = "styleButton">
                <button  class = "addItemButton" style = "text-decoration: none; color: #FFFFFF;">Додати товар</button>
            </div>
        </div>
        <div class = "deleteItem">
            <h1>Видалити товар</h1>
            <div class = "InputContainer">
                <input class = "name_item" placeholder="Введіть назву товару"></input>
            </div>
            <div class = "styleButton">
                <button  class = "deleteItemButton" style = "text-decoration: none; color: #FFFFFF;">Видалити товар</button>
            </div>
        </div>
        <div class = "checkBasket">

        </div>
        <script src = "controllersAdminAndManager/addItem.js"></script>
        <script src = "controllersAdminAndManager/deleteItem.js"></script>
    <?php }?>
    <?php if($user['role'] == 3){?>
        <div class = "deleteAccount">
            <h1>Видалити аккаунт</h1>
            <div class = "InputContainer">
                <input class = "name_user" placeholder="Введіть нікнейм"></input>
            </div>
            <div class = "styleButton">
                <button  class = "deleteAccountButton" style = "text-decoration: none; color: #FFFFFF;">Видалити аккаунт</button>
            </div>
        </div>
        </div>
        <script src = "controllersAdminAndManager/deleteAccount.js"></script>
    <?php }?>
    <script src = "..\CodeStyle\styleJS.js"></script>
    <script src = "AvatarsSelector.js"></script>
    <script>
        window.BASE_URL = <?= json_encode(BASE_URL) ?>;
    </script>
    <script src="../CodeAction/itemFindEnter.js"></script>
</body>
</html>