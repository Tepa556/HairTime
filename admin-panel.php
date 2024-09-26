<?php
session_start();

$conn = new mysqli("localhost", "root", "", "HairTime");

// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Запрос для получения новостей и событий
$sql = "SELECT id, news_description, news_date, news_background FROM news";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <style>
        .container-lg {
            margin-top: 5%;
        }

        .container-lg h1 {
            font-weight: 800;
            margin-top: 2%;
        }
        .add-news-container {
            border: none;
            margin-bottom: 5%;
        }
        @media (max-width:360px){
            .footer{
                margin-top: 30%;
            }
        }
    </style>
</head>

<body>
    <?php
    if ($_SESSION['is_admin_logged_in'] === true) {
        include './templates/header.php';
        render_header();
    ?> 
    <div class="container-lg">
        <div class="container add-news-container">
            <div class="row">
                <div class="col d-flex justify-content-start">
                    <h1 class="text-secondary">Новости и события</h1>
                </div>
                <div class="col d-flex justify-content-end">
    <a href="create-new">
        <button class="btn add_news">Добавить новость/событие</button>
    </a>
</div>

            </div>
        </div>
        <div class="container">
            <?php
            if ($result->num_rows > 0) {
                $counter = 0; // Инициализируем счетчик

                // Если есть записи в базе данных, выводим их
                while ($row = $result->fetch_assoc()) {
                    if ($counter % 2 == 0) {
                        // Открываем новый ряд, если это первый элемент или каждый третий элемент
                        echo '<div class="row mb-4">';
                    }

                    // Выводим колонку с новостью
                    ?>
            <div class="col m-4">
                <div class="promo-card"
                    style="background-image: url('<?php echo htmlspecialchars($row['news_background']); ?>');"
                    data-id="<?php echo $row['id']; ?>">
                    <div class="edit-icons">
                        <!-- Добавляем data-* атрибуты с id, описанием и датой -->
                        <img src="./image/Кнопка редактирования.png" alt="Редактировать" class="edit-button"
                            data-id="<?php echo htmlspecialchars($row['id']); ?>"
                            data-description="<?php echo htmlspecialchars($row['news_description']); ?>"
                            data-date="<?php echo htmlspecialchars($row['news_date']); ?>" data-bs-toggle="modal"
                            data-bs-target="#changeForm">
                        <img src="./image/Кнопка удалить.png" alt="Удалить" class="delete-button"
                            data-id="<?php echo htmlspecialchars($row['id']); ?>" data-bs-toggle="modal"
                            data-bs-target="#deleteModal">
                    </div>
                    <div class="overlay">
                        <p class="news-description"><?php echo htmlspecialchars($row['news_description']); ?></p>
                    </div>
                    <div class="date-badge news-date"><?php echo htmlspecialchars($row['news_date']); ?></div>
                </div>
            </div>
            <?php
                    $counter++;

                    if ($counter % 2 == 0) {
                        // Закрываем ряд после вывода двух элементов
                        echo '</div>';
                    }
                }

                // Если ряд не был закрыт после последнего элемента, закрываем его
                if ($counter % 2 != 0) {
                    echo '</div>';
                }
            } else {
                // Если записей нет, выводим сообщение
                echo "<h2 class='text-center text-secondary'>Новостей/событий пока нет.</h2>";
            }
            ?>
        </div>
    </div>
    <?php
        include './templates/footer.php';
    } else {
        header('Location: log_in_admin_panel');
    }
    ?>
    <!-- Модальные окна -->
    <!-- Форма изменений -->
    <div class="modal fade" id="changeForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Изменить данные</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="./back/edit-news.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="newsDescription" class="form-label">Описание:</label>
                            <input type="text" class="form-control" id="newsDescription" name="news_description">
                        </div>

                        <div class="mb-3">
                            <label for="newsDate" class="form-label">Дата:</label>
                            <input type="date" class="form-control" id="newsDate" name="news_date">
                        </div>
                         <div class="mb-3">
                            <label for="newsImage" class="form-label">Изображение:</label>
                            <input type="file" class="form-control" id="newsImage" name="news_background">
                         </div>
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="newsId" name="news_id">
                        </div>
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!--Окно удаления-->
<div class="modal fade" tabindex="-1" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Удалить новость/событие</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Вы уверены, что хотите удалить эту новость/событие?</p>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" action="./back/delete-news.php" method="POST">
                    <!-- Скрытое поле для передачи id -->
                    <input type="hidden" name="news_id" id="deleteNewsId" value="">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Нет</button>
                    <button type="submit" class="btn btn-success">Да</button>
                </form>
            </div>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="./script.js"></script>
    <script>
    // Обработка клика на кнопку редактирования
    document.querySelectorAll('.edit-button').forEach(button => {
        button.addEventListener('click', function() {
            // Извлекаем данные из data-* атрибутов
            const newsId = this.getAttribute('data-id');
            const newsDescription = this.getAttribute('data-description');
            const newsDate = this.getAttribute('data-date');

            // Устанавливаем значения в форму модального окна
            document.getElementById('newsId').value = newsId;
            document.getElementById('newsDescription').value = newsDescription;
            document.getElementById('newsDate').value = newsDate;
        });
    });

// Обработка клика на кнопку удаления
document.querySelectorAll('.delete-button').forEach(button => {
    button.addEventListener('click', function() {
        // Получаем ID новости из data-id атрибута
        const newsId = this.getAttribute('data-id');
        // Устанавливаем ID в скрытое поле формы удаления
        document.getElementById('deleteNewsId').value = newsId;
    });
});

    </script>
</body>

</html>
