<?php
// Подключение к базе данных
$conn = new mysqli("localhost", "root", "", "HairTime");

// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение данных из формы
$postid = $_POST['news_id'];
$postDescription = $_POST['news_description'];
$postDate = $_POST['news_date'];

// Проверяем, загружен ли файл изображения без ошибок
if (isset($_FILES['news_background']) && $_FILES['news_background']['error'] === UPLOAD_ERR_OK) {
    // Получаем информацию о файле
    $fileTmpPath = $_FILES['news_background']['tmp_name'];
    $fileName = $_FILES['news_background']['name'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // Устанавливаем целевую директорию и уникальное имя файла
    $uploadFileDir = '../image/news_image/';
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    $dest_path = $uploadFileDir . $newFileName;
    // Перемещаем файл в целевую директорию
    if (move_uploaded_file($fileTmpPath, $dest_path)) {
        $sql = "UPDATE news SET news_description='$postDescription', news_date='$postDate', news_background='image/news_image/$newFileName' WHERE id=$postid";
    } else {
        echo "Ошибка перемещения файла в целевую директорию.";
        exit;
    }
}
if ($conn->query($sql) === TRUE) {
    header('Location: ../admin-panel'); // Переадресация на панель администратора после успешного обновления
    exit;
} else {
    echo "Ошибка обновления: " . $conn->error;
}

$conn->close();
?>
