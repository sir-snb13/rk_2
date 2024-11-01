<?php
session_start();

// Проверка авторизации
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обратная связь</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="contact.css">
</head>
<body>
<header>
    <div class="logo">
        <img src="images/logo.png" alt="Логотип Кофейного Магазина">
        Кофейный Магазин
    </div>
    <nav>
        <a href="index.php">Главная</a>
        <a href="shop.php">Магазин</a>
        <a href="feedback.php">Обратная связь</a>
        <a href="logout.php">Выйти</a>
    </nav>
</header>

<main>
    <h1>Обратная связь</h1>
    <form action="feedback.php" method="POST">
        <label for="subject">Тема:</label>
        <input type="text" id="subject" name="subject" required>

        <label for="message">Сообщение:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <button type="submit" name="submit">Отправить</button>
    </form>

    <?php
    // Обработка формы
    if (isset($_POST['submit'])) {
        $user_id = $_SESSION['user_id'];
        $subject = htmlspecialchars($_POST['subject']);
        $message = htmlspecialchars($_POST['message']);

        // Подключение к базе данных
        require_once 'db_connect.php';

        // Вставка данных в базу
        $stmt = $conn->prepare("INSERT INTO feedback (user_id, subject, message) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $user_id, $subject, $message);

        if ($stmt->execute()) {
            echo "<p>Ваше сообщение отправлено. Спасибо за обратную связь!</p>";
        } else {
            echo "<p>Произошла ошибка при отправке сообщения. Попробуйте еще раз.</p>";
        }

        $stmt->close();
        $conn->close();
    }
    ?>
</main>

<footer>
    <p>Контакты: +7 (123) 456-78-90 | sir.snb13@gmail.com</p>
    <p>&copy; 2023 Кофейный Магазин</p>
</footer>
</body>
</html>
