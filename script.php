<?php
// Получаем запрашиваемую страницу из URL
$page = isset($_GET['page']) ? $_GET['page'] : 'home'; // Задаем 'home' как страницу по умолчанию

// Путь к файлу страницы
$pagePath = __DIR__ . '/pages/' . $page . '.php';

// Проверяем, существует ли файл
if (file_exists($pagePath)) {
    include($pagePath);
} else {
    // Если файл не существует, перенаправляем на страницу 404 ошибки
    header("Location: error");
    exit();
}
?>
