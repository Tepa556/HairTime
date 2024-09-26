<?php
session_start(); // Начало сессии

$conn = new mysqli('localhost', 'root', '', 'HairTime');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin_email = $_POST['email'];
    $admin_pass = $_POST['pass'];

    // Подготовленный запрос для предотвращения SQL-инъекций
    $stmt = $conn->prepare("SELECT * FROM admins WHERE admin_email = ? AND admin_password = ?");
    $stmt->bind_param('ss', $admin_email, $admin_pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Успешная авторизация
        $_SESSION['is_admin_logged_in'] = true;
        $_SESSION['admin_name'] = $result->fetch_assoc()['admin_name']; // Сохраняем имя администратора
        header('Location: ../admin-panel'); // Перенаправление на панель администратора
        exit();
    } else {
        // Неверные данные для входа
        echo "Неправильный email или пароль.";
    }
}
?>