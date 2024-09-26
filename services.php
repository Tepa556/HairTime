<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Наши услуги</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css"> 
</head>
<body>
<?php
       include './templates/header.php';
       render_header();
       ?> 
    <?php
       $heading='Что мы предлогаем';
       include './templates/card-blocks.php'
    ?>
    <?php
       $heading='Список стрижек';
       include './templates/card-blocks.php'
    ?>
    <?php 
      include "./templates/footer.php"
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="./script.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const burger = document.getElementById('burger');
        const nav = document.getElementById('navbarNav');
        const voidBlock = document.getElementById('voidBlock');

        burger.addEventListener('click', function () {
            nav.classList.toggle('active');
            voidBlock.classList.toggle('active');
        });

        // Закрытие меню при клике на полупрозрачный блок
        voidBlock.addEventListener('click', function () {
            nav.classList.remove('active');
            voidBlock.classList.remove('active');
        });

    });
    window.addEventListener('scroll', function () {
    // Получаем текущую позицию прокрутки
    const scrollPosition = window.scrollY || window.pageYOffset;

    // Получаем все элементы с классом our-offer
    const offers = document.querySelectorAll('.our-offer');

    // Анимация для первого элемента (появляется сразу)
    if (offers.length > 0 && scrollPosition > 0) {
        offers[0].classList.add('animate');
    }

    // Анимация для второго элемента (появляется при прокрутке до 800 пикселей)
    if (offers.length > 1 && scrollPosition >= 800) {
        offers[1].classList.add('animate');
    }
});

</script>
</body>
</html>