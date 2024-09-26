<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ошибка</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="./style.css"> 
<style>
    .container{
        margin-top: 20%;
        margin-bottom: 20%;
    }
    h1{
        font-weight: 800;
        font-size: 50px;
    }
    @media (max-width:780px){
        .footer{
            margin-top: 25%;
        }
    }
    @media (max-width:717px){
        .footer{
            margin-top: 35%;
        }
        .container{
        margin-top: 30%;
    }
    }
    @media (max-width:566px){
        .container{
        margin-top: 35%;
    } 
    }
    @media (max-width:518px){
        .container{
        margin-top: 50%;
    } 
    }
    @media (max-width:380px){
        .footer{
            margin-top: 65%;
        }
        .container{
        margin-top: 50%;
    }
    }
</style>
</head>

<body>
<?php
       include './templates/header.php';
       render_header()
       ?> 
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h1 class="text-danger">Ошибка!</h1>
            </div>
        </div>
    </div>
    <?php
        include './templates/footer.php';
    ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
</script>
</body>
</html>