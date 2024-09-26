
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О нас</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css"> 
    <style>

    </style>
</head>
<body>
<?php
       include './templates/header.php';
       render_header();
       ?> 
<div class="container-fluid bg-secondary begin d-flex justify-content-center align-items-center" id='begin'> 
        <div class="text-center">
        <h1>Добро пожаловать в HairTime!</h1> 
        <br> 
        <p class="text-white">Мы рады приветствовать вас в нашем уютном салоне красоты, где каждый клиент может ощутить заботу и внимание наших профессиональных стилистов. HairTime – это не просто парикмахерская, это место, где создается стиль и подчеркивается ваша уникальность.</p> 
</div>
    </div>
    <div class="container-xl about-us" id='about-us'> 
        <h2 class="text-secondary text-center">Наша миссия</h2> 
        <p class="text-center">В HairTime мы стремимся превзойти ожидания каждого клиента, предлагая качественные услуги по уходу за волосами и стильные решения для любых случаев. Наша миссия – помочь вам выглядеть и чувствовать себя наилучшим образом каждый день.
        </p> 
    </div>    
    <?php 
         $heading='Что мы предлогаем';
         include './templates/card-blocks.php';
      ?>

 <div class="container our-team" id="our-team">
       <div class="row">
        <div class="col text-start">
             <h2 class="text-secondary">Наша команда</h2>
             <p class="text-secondary">В HairTime мы стремимся превзойти ожидания каждого клиента, предлагая качественные услуги по уходу за волосами и стильные решения для любых случаев. Наша миссия – помочь вам выглядеть и чувствовать себя наилучшим образом каждый день.</p>
        </div>
        <div class="col">
            <img src="./image/Наша команда.png" alt="">
        </div>
       </div>
 </div>
 <?php
   include "./templates/footer.php";
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
    // Получаем высоту экрана и текущую позицию прокрутки
    const screenHeight = window.innerHeight;
    const scrollPosition = window.scrollY || window.pageYOffset;
    
    // Логируем высоту экрана и текущую позицию прокрутки
    console.log('Высота экрана:', screenHeight);
    console.log('Текущая позиция прокрутки:', scrollPosition);

    // Получаем элементы, которые будут анимированы
    const beginBlock = document.getElementById('begin');
    const offerBlock = document.getElementById('offer');
    const aboutUs=document.getElementById('about-us');
    const ourTeam=document.getElementById('our-team');
    // Проверяем, достигла ли прокрутка 758 пикселей
    if (scrollPosition > 0) {
        beginBlock.classList.add('animate');
    }
    if (scrollPosition >= 650) {
        aboutUs.classList.add('animate');
    }
    if (scrollPosition >= 1100) {
        offerBlock.classList.add('animate');
    }
    if (scrollPosition >= 1500) {
        ourTeam.classList.add('animate');
    }
});
</script>
</body>
</html>