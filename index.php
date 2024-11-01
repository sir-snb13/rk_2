<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кофейный Магазин - Главная</title>
    <link rel="stylesheet" href="style.css">
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
                <a href="logout.php">Выйти</a>
            <?php else: ?>
                <a href="login.php">Войти</a>
                <a href="register.php">Регистрация</a>
            <?php endif; ?>
        </nav>
    </header>

    <!-- Описание магазина и продукции -->
    <main>
        <h1>Добро пожаловать в наш Кофейный Магазин!</h1>
        <p>Мы предлагаем лучшие сорта кофе со всего мира. В нашем магазине вы найдете кофе из Бразилии, Колумбии, Эфиопии, Ямайки и других стран. Наша продукция отличается высоким качеством и уникальными вкусовыми характеристиками. Мы тщательно отбираем зерна и предлагаем широкий выбор уровней обжарки, чтобы каждый мог найти свой идеальный вкус.</p>

        <h2>Популярные товары</h2>

        <!-- Секция слайд-шоу -->
        <div class="slider">
            <div class="slide active">
                <img src="images/ethiopian_sidamo.jpg" alt="Эфиопский Сидамо">
                <div class="slide-info">
                    <h3>Эфиопский Сидамо</h3>
                    <p>Эфиопский Сидамо – кофе с нотками цитрусовых и цветочным ароматом. Легкая обжарка позволяет раскрыть весь вкус.</p>
                </div>
            </div>
            <div class="slide">
                <img src="images/colombian_supremo.jpg" alt="Колумбийский Супремо">
                <div class="slide-info">
                    <h3>Колумбийский Супремо</h3>
                    <p>Насыщенный кофе с мягкой кислинкой и шоколадным послевкусием. Средняя обжарка для яркого вкуса.</p>
                </div>
            </div>
            <div class="slide">
                <img src="images/brazilian_santos.jpg" alt="Бразильский Сантос">
                <div class="slide-info">
                    <h3>Бразильский Сантос</h3>
                    <p>Мягкий кофе с ореховыми нотками и низкой кислотностью. Идеален для темной обжарки.</p>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>Контакты: +7 (123) 456-78-90 | email@example.com</p>
        <p>&copy; 2023 Кофейный Магазин</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
