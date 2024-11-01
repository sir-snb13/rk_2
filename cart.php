<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    session_start();
    include 'db_connect.php';

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    $user_id = $_SESSION['user_id'];
    ?>

    <header>
        <div class="logo">Кофейный Магазин</div>
        <nav>
            <a href="index.php">Главная</a>
            <a href="shop.php">Магазин</a>
            <a href="about.php">О нас</a>
            <a href="cart.php">Корзина</a>
            <a href="logout.php">Выйти</a>
        </nav>
    </header>

    <main>
        <h1>Ваша корзина</h1>

        <div class="cart-items">
            <?php
            $sql = "SELECT cart.id AS cart_id, products.name, products.price, cart.quantity FROM cart
                    JOIN products ON cart.product_id = products.id
                    WHERE cart.user_id = $user_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='cart-item'>";
                    echo "<h2>" . $row["name"] . "</h2>";
                    echo "<p>Цена: " . $row["price"] . " руб.</p>";
                    echo "<p>Количество: " . $row["quantity"] . "</p>";
                    echo "<form action='remove_from_cart.php' method='POST' style='display:inline;'>";
                    echo "<input type='hidden' name='cart_id' value='" . $row["cart_id"] . "'>";
                    echo "<button type='submit'>Удалить</button>";
                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "Ваша корзина пуста.";
            }
            ?>
        </div>
    </main>

    <footer>
        <p>Контакты: +7 (123) 456-78-90 | email@example.com</p>
        <p>&copy; 2023 Кофейный Магазин</p>
    </footer>
</body>
</html>
