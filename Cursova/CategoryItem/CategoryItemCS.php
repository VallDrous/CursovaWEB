<?php
 session_start()?>
<?php include("../path.php");?>
<?php
require('../app/ConnectionToDB/connect.php');
if(isset($_GET['category'])){
    $valueForFind = $_GET['category'];
    $data = $pdo->query("SELECT item.id, item.name_stuff, item.count, item.price, item.image, category.category_name FROM item INNER JOIN category ON item.category_id = category.id WHERE category.category_name = '" . $valueForFind . "'");
}
else{
    $valueForFind = $_GET['enterWord'];
    $data = $pdo->query("SELECT id, name_stuff, count, price, image FROM item where name_stuff LIKE '%$valueForFind%'");
}

$items = $data->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CategoryItemCSStyle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Stuff</title>
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
    <div class = "cards">
            <?php foreach($items as $item){?>
                <div class = "card" data-id="<?= $item['id'] ?>">
                    <div class = "cardImage">
                        <img src = <?php echo BASE_URL . 'ImageOFItem' . $item["image"] ?>>
                    </div>
                    <label><?php echo $item["name_stuff"] ?></label><br>
                    <label><?php echo $item["price"] ?>грн</label>
                    <i class='bx bx-cart-download btn-addToDB'></i>
                </div>
            <?php }?>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded",function(){
            document.querySelectorAll(".card").forEach(function(card){
                const itemId = card.dataset.id;
                const valueForFind = <?= json_encode($valueForFind)?>;
                
                card.querySelector(".btn-addToDB").addEventListener("click", () =>{
                    addItemToBasket(itemId, valueForFind);
                })
            })

            function addItemToBasket(itemId, valueForFind){
                const userLoggedIn = <?= isset($_COOKIE['user']) ? 'true' : 'false'; ?>;
                if(userLoggedIn){
                    fetch("../app/controllers/addToBasket.php", {
                        method : "POST",
                        headers: { "Content-Type": "application/x-www-form-urlencoded" },
                        body: `itemId=${itemId}&valueForFind=${valueForFind}`
                    })
                }
                else{
                    window.location.href = "<?= BASE_URL . 'Log/LogCS.php' ?>";
                }
            }
        });
    </script>
    <script src = "..\CodeStyle\styleJS.js"></script>
    <script>
        window.BASE_URL = <?= json_encode(BASE_URL) ?>;
    </script>
    <script src="../CodeAction/itemFindEnter.js"></script>
</body>
</html>