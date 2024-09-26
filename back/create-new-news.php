<?php
// Подключение к базе данных
$conn = new mysqli("localhost", "root", "", "HairTime");

// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение данных из формы
$postDescription = $_POST['description'];
$postDate = $_POST['date'];

// Проверяем, загружен ли файл изображения без ошибок
if (isset($_FILES['back']) && $_FILES['back']['error'] === UPLOAD_ERR_OK) {
    // Получаем информацию о файле
    $fileTmpPath = $_FILES['back']['tmp_name'];
    $fileName = $_FILES['back']['name'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // Устанавливаем целевую директорию и уникальное имя файла
    $uploadFileDir = '../image/news_image/';
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    $dest_path = $uploadFileDir . $newFileName;

    // Перемещаем файл в целевую директорию
    if (move_uploaded_file($fileTmpPath, $dest_path)) {
        // Подготавливаем SQL-запрос для вставки новой записи
        $sql = "INSERT INTO news (news_description, news_date, news_background) VALUES ('$postDescription', '$postDate', 'image/news_image/$newFileName')";

        // Выполняем запрос
        if ($conn->query($sql) === TRUE) {
            header('Location: ../admin-panel'); // Переадресация на панель администратора после успешного добавления записи
            exit;
        } else {
            echo "Ошибка вставки записи: " . $conn->error;
        }
    } else {
        echo "Ошибка перемещения файла в целевую директорию.";
        exit;
    }
} else {
    echo "Ошибка загрузки изображения: " . $_FILES['news_background']['error'];
}

$conn->close();
?>
