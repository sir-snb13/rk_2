<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кофейный Магазин - Продукция</title>
    <link rel="stylesheet" href="style.css"> <!-- Основной CSS для базовых стилей -->
    <link rel="stylesheet" href="shop.css"> <!-- CSS для оформления страницы магазина -->
</head>
<body>
    <?php include 'db_connect.php'; ?>
    <?php session_start(); ?>

    <header>
        <div class="logo">
            <img src="images/logo.png" alt="Логотип Кофейного Магазина" style="height: 40px; margin-right: 10px;">
            Кофейный Магазин
        </div>
        <nav>
            <a href="index.php">Главная</a>
            <a href="shop.php">Магазин</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="feedback.php">Обратная связь</a>
                <a href="cart.php">Корзина</a>
                <a href="logout.php">Выйти</a>
            <?php else: ?>
                <a href="login.php">Войти</a>
                <a href="register.php">Регистрация</a>
            <?php endif; ?>
        </nav>
    </header>

    <main>
        <h1>Продукция Кофейного Магазина</h1>

        <div class="products">
            <?php
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='product'>";
                    echo "<a href='product.php?id=" . $row["id"] . "'>";
                    echo "<img src='" . $row["image"] . "' alt='" . $row["name"] . "'>";
                    echo "<h2>" . $row["name"] . "</h2>";
                    echo "</a>";
                    echo "<p><strong>Описание:</strong> " . $row["description"] . "</p>";
                    echo "<p><strong>Страна происхождения:</strong> " . $row["origin_country"] . "</p>";
                    echo "<p><strong>Обжарка:</strong> " . $row["roast"] . "</p>";
                    echo "<p><strong>Цена:</strong> " . $row["price"] . " руб.</p>";
                    
                    echo "<form action='add_to_cart.php' method='POST'>";
                    echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                    echo "<button type='submit'>Добавить в корзину</button>";
                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "Нет товаров для отображения.";
            }
            ?>
        </div>
    </main>

    <footer>
        <p>Контакты: +7 (123) 456-78-90 | sir.snb13@gmail.com</p>
        <p>&copy; 2023 Кофейный Магазин</p>
    </footer>
</body>
</html>
