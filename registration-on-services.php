<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Запись на услугу</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css"> 
    <style>
       body{
        background: rgb(48,230,238);
background: linear-gradient(90deg, rgba(48,230,238,1) 0%, rgba(255,209,220,1) 59%);
       }
       .container{
        margin-top: 10%;
       }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center regist-on-servise-form">
        <div class="card p-4 rounded-custom" >
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <a href="./back/registration-on-service.php" class="text-decoration-none me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 1-.5.5H2.707l4.147 4.146a.5.5 0 0 1-.708.708l-5-5a.5.5 0 0 1 0-.708l5-5a.5.5 0 1 1 .708.708L2.707 7.5H14.5A.5.5 0 0 1 15 8z"/>
                        </svg>
                    </a>
                    <h3 class="card-title m-0">Онлайн-запись</h3>
                </div>
                <form action="./back/script.php" method="post">
                    <div class="mb-4">
                        <label for="service" class="form-label">Услуга</label>
                        <input type="text" class="form-control rounded-custom" name='service' value="<?php

if (isset($_GET['service'])) {
    $service = $_GET['service'];
    echo $service; 
} else {
    echo "Ошибка: Параметр 'service' не найден в URL.";
}
?>
">
                    </div>
                    <div class="mb-4">
                        <label for="master" class="form-label">Выбрать мастера</label>
                        <select class="form-select rounded-custom" id="master" required name="master">
                            <option selected>Любой мастер</option>
                            <option value="1">
                                <?php
                                    $master_name='Олеся Б';
                                    echo ''. $master_name .''
                                ?>
                            </option>
                            <option value="2">Мастер 2</option>
                            <option value="3">Мастер 3</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="time" class="form-label">Время</label>
                        <input type="time" class="form-control rounded-custom" id="time" name='time' required>
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="form-label">Ваш телефон</label>
                        <input type="tel" class="form-control rounded-custom" id="phone" placeholder="+7-999-99-99" name='tel' required>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-pink rounded-custom" >Записаться</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>