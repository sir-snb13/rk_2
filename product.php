<?php
include 'db_connect.php';
session_start();

// Получаем ID товара из URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Проверяем, существует ли товар с указанным ID
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Товар не найден.";
        exit;
    }
} else {
    echo "ID товара не указан.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?> - Кофейный Магазин</title>
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="shop.css"> 
</head>
<body>
    <header>
        <div class="logo">Кофейный Магазин</div>
        <nav>
            <a href="index.php">Главная</a>
            <a href="shop.php">Магазин</a>
            <a href="about.php">О нас</a>
            <?php if (isset($_SESSION['username'])): ?>
                <a href="cart.php">Корзина</a>
                <a href="logout.php">Выйти</a>
            <?php else: ?>
                <a href="login.php">Войти</a>
                <a href="register.php">Регистрация</a>
            <?php endif; ?>
        </nav>
    </header>

    <main>
        <h1><?php echo $product['name']; ?></h1>
        <div class="product-detail">
            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
            <div class="product-info">
                <p><strong>Описание:</strong> <?php echo $product['description']; ?></p>
                <p><strong>Страна происхождения:</strong> <?php echo $product['origin_country']; ?></p>
                <p><strong>Обжарка:</strong> <?php echo $product['roast']; ?></p>
                <p><strong>Цена:</strong> <?php echo $product['price']; ?> руб.</p>

                <form action="add_to_cart.php" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <button type="submit">Добавить в корзину</button>
                </form>
            </div>
        </div>
    </main>

    <footer>
        <p>Контакты: +7 (123) 456-78-90 | sir.snb13@gmail.com </p>
        <p>&copy; 2023 Кофейный Магазин</p>
    </footer>
</body>
</html>
