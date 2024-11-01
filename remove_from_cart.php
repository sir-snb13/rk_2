<?php
session_start();
include 'db_connect.php';

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Получаем ID записи в корзине, которую нужно удалить
$cart_id = $_POST['cart_id'];

// Удаляем товар из корзины
$sql = "DELETE FROM cart WHERE id = $cart_id";
if ($conn->query($sql) === TRUE) {
    header("Location: cart.php"); // Перенаправляем обратно в корзину после удаления
} else {
    echo "Ошибка при удалении товара из корзины: " . $conn->error;
}
?>
