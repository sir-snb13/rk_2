<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="style.css"> <!-- Основной CSS для header и footer -->
    <link rel="stylesheet" href="auth.css"> <!-- CSS для оформления формы -->
</head>
<body>
    <header>
        <div class="logo">Логотип</div>
        <nav>
            <a href="index.php">Главная</a>
            <a href="shop.php">Магазин</a>
            <a href="about.php">О нас</a>
            <a href="register.php">Регистрация</a>
        </nav>
    </header>

    <div class="auth-container">
        <h1>Авторизация</h1>
        <form action="auth.php" method="POST">
            <label for="username">Логин:</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Пароль:</label>
            <input type="password" name="password" id="password" required>
            <button type="submit">Войти</button>
        </form>
    </div>

    <footer>
        <p>Контакты: +7 (123) 456-78-90 | email@example.com</p>
        <p>&copy; 2023 Кофейный Магазин</p>
    </footer>
</body>
</html>
