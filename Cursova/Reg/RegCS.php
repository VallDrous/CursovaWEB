<?php session_start();?>
<?php include("../path.php");?>
<?php 
    if(isset($_COOKIE['user'])){
        header('Location: ' . BASE_URL . 'Main/CapybaraShopMain.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="RegCSStyle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Reg</title>
</head>
<body>
    <!--Розміщення елементів для регестрації-->
    <div class = "wrapper">
        <form action = "<?php echo BASE_URL . 'app/controllers/signUp.php'?>" method="post">
            <h1>Регестрація</h1>
            <div class = "input-box">
                <input type="text" name="login" placeholder="Login" required>
                <i class='bx bx-user'></i>
            </div>
            <div class = "input-box">
                <input type = "text" name="password" placeholder = "Password" required>
                <i class='bx bx-lock-alt' ></i> 
            </div>
            <div class = "input-box">
                <input type="text" name="passwordAgain" placeholder="Password again" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" class = "btn">Зареєструватися</button>
            <div class="log-link">
                <p>Є аккаунт? <a href = "..\Log\LogCS.php">Логін</a></p>
            </div>
            <div class = "log-link">
             <?php if(isset($_SESSION['message'])){
                    echo '<p>' . $_SESSION['message'] . ' </p>';
                    unset($_SESSION['message']);
                }
             ?>
            </div>
        </form>
    </div>
</body>
</html>