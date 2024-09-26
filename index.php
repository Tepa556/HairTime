<?php
$conn = new mysqli("localhost", "root", "", "HairTime");

// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, news_description, news_date, news_background FROM news";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HairTime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css"> 
</head>
<body>
       <?php
       include './templates/header.php';
       render_header()
       ?> 
      <div class="container-fluid bg-secondary begin d-flex justify-content-center" id='begin'>
        <h1>HairTime <br>
            Ваша личная зона преображения</h1>
      </div>
      
      <?php 
         $heading='Что мы предлогаем';
         include './templates/card-blocks.php';
      ?>
      
      <?php
         include './templates/about-us.php'
      ?>
      <div class="container-xl news-and-events" id='news'>
        <h2 class="text-secondary">Новости и события</h2>
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
            <div class="col">
                <div class="promo-card"
                    style="background-image: url('<?php echo htmlspecialchars($row['news_background']); ?>');"
                    data-id="<?php echo $row['id']; ?>">
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
    const news=document.getElementById('news');
    // Проверяем, достигла ли прокрутка 758 пикселей
    if (scrollPosition > 0) {
        beginBlock.classList.add('animate');
    }
    if (scrollPosition >= 650) {
        offerBlock.classList.add('animate');
    }
    if (scrollPosition >= 1100) {
        aboutUs.classList.add('animate');
    }
    if (scrollPosition >= 2500) {
        news.classList.add('animate');
    }
});


     
</script>
</body>
</html>