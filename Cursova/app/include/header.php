<header align = "center">
    <ul>
        <li><a href = "<?php echo BASE_URL . 'Main\CapybaraShopMain.php'?>">Головна</a></li>
        <li><a id = "category-btn">Категорії</a>
            <ul id = "category">
                <li><a href = "<?php echo BASE_URL . 'CategoryItem\CategoryItemCS.php?category=Phone'?>">Смартфони</a></li>
                <li><a href = "<?php echo BASE_URL . 'CategoryItem\CategoryItemCS.php?category=PC'?>">Комп'ютери</a></li>
                <li><a href = "<?php echo BASE_URL . 'CategoryItem\CategoryItemCS.php?category=TradingCards'?>">Трейдингові карти</a></li>
            </ul>
        </li>
        <li><input type = "text" id = "iForFind"><i class='bx bx-search'></i></li>
        <li><a href = "<?php echo BASE_URL . 'Basket\BasketCS.php'?>">Корзина</a></li>
        <li><a href = "<?php echo BASE_URL . '\Log\LogCS.php'?>">Логін</a></li>
        <li><a href = "<?php echo BASE_URL . 'Reg\RegCS.php'?>">Регестрація</a></li>
    </ul>
</header>