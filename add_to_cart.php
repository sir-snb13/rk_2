<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

// Проверяем, есть ли товар уже в корзине
$sql = "SELECT * FROM cart WHERE user_id = $user_id AND product_id = $product_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Если товар уже в корзине, увеличиваем количество
    $sql = "UPDATE cart SET quantity = quantity + 1 WHERE user_id = $user_id AND product_id = $product_id";
} else {
    // Иначе добавляем новый товар в корзину
    $sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES ($user_id, $product_id, 1)";
}

if ($conn->query($sql) === TRUE) {
    header("Location: shop.php");
} else {
    echo "Ошибка: " . $conn->error;
}
?>
