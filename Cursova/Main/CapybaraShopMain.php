<?php session_start()?>
<?php include("../path.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CapybaraShopMain.css">
    <!--Підключення іконок-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Main</title>
</head>
<body>
    <!--хедер для пошуку товару та вибором категорій-->
    <?php
        if(isset($_COOKIE['user'])){ 
            include("../app/include/headerLog.php");
        }
        else{
            include("../app/include/header.php");
        }
    ?>
    <!--"рекламний" слайдер-->
    <div class = "slider middle">
        <div class = "slides">
            <input checked type = "radio" name = "switch" id = "switch1">
            <input type = "radio" name = "switch" id = "switch2">
            <input type = "radio" name = "switch" id = "switch3">

            <div class = "slide s1"><img src="image\CapyLaptop.jpg" alt = ""></div>
            <div class = "slide"><img src="image\CapyPhone.jpg" alt = ""></div>
            <div class = "slide"><img src="image\CapyPC.jpg" alt = ""></div>
        </div>
        <div class = "navigation">
            <label for="switch1" class = "bar"></label>
            <label for="switch2" class = "bar"></label>
            <label for="switch3" class = "bar"></label>
        </div>
    </div>
    <!--вибір категорії з малюнками-->
    <div class ="pagesStuff">
        <a href = "..\CategoryStuff\CategoryStuffCS.php">
            <div class = "pageImg"><img  src = "pageImages/phone.jpg"></div>
            <label>Смартфони</label>
        </a>
        <a href = "..\CategoryStuff\CategoryStuffCS.php">
            <div class = "pageImg"><img  src = "pageImages/PC.jpg"></div>
            <label>Комп'ютери</label>
        </a>
        <a href = "..\CategoryStuff\CategoryStuffCS.php">
            <div class = "pageImg"><img  src = "pageImages/TradingCards.jpg"></div>
            <label>Трейдингові карти</label>
        </a>
    </div>
    <!--відкритя та закритя категорій у хедері-->
    <script src = "..\CodeStyle\styleJS.js"></script>
    <script>
        window.BASE_URL = <?= json_encode(BASE_URL) ?>;
    </script>
    <script src="../CodeAction/itemFindEnter.js"></script>
</body>
</html>