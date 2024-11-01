<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Проверка на существование пользователя
    $sql_check = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        echo "Пользователь с таким логином уже существует.";
    } else {
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password_hashed')";

        if ($conn->query($sql) === TRUE) {
            echo "Регистрация успешна. Теперь вы можете <a href='login.php'>войти</a>.";
        } else {
            echo "Ошибка: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>
