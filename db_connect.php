<?php
$servername = "localhost";  // Имя хоста
$username = "root";         // Имя пользователя MySQL
$password = "";             // Пароль MySQL
$dbname = "shop_db";        // Имя базы данных

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . mysqli_connect_error());
}
?>
