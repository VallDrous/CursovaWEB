<?php session_start()?>
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
    <link rel="stylesheet" href="LogCSStyle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
</head>
<body>
    <!--Розміщення елементів для логування-->
    <div class = "wrapper">
        <form action = "<?php echo BASE_URL . 'app/controllers/signIn.php'?>" method="post">
            <h1>Логін</h1>
            <div class = "input-box">
                <input type="text" name ="login" placeholder="Login" required>
                <i class='bx bx-user'></i>
            </div>
            <div class = "input-box">
                <input type = "text" name="password" placeholder = "Password" required>
                <i class='bx bx-lock-alt' ></i> 
            </div>
            <div class="remember">
                <label for=" "><input type = "checkbox">Запам'ятай мене</label>
                <a href = "">Забув пароль?</a>
            </div>
            <button type="submit" class = "btn">Логін</button>

            <div class="register-link">
                <p>Не має аккаунту? <a href = "..\Reg\RegCS.php">Регестрація</a></p>
            </div>
            <div class="register-link">
                    <?php if(isset($_SESSION['message'])){
                        echo '<p>' . $_SESSION['message'] . '</p>';
                        unset($_SESSION['message']);
                        } 
                    ?>
            </div>
        </form>
    </div>
</body>
</html>