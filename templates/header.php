<?php
session_start();

function render_header() {
    echo "<header class='header'>
            <div class='container-header'>
                <div class='header__inner'>
                    <a href='./index.php' class='header__logo'>
                        <img src='./image/Логотип.png' alt='Логотип' class='logo'>
                        <div class='header__logo-text'>Navbar</div>
                    </a>
                    <div class='header__burger' id='burger'>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <nav class='header__nav' id='navbarNav'>
                        <ul class='nav__list'>
                            <li class='nav__item'><a href='about-us' class='nav__link'>О нас</a></li>
                            <li class='nav__item'><a href='services' class='nav__link'>Услуги</a></li>
                            <li class='nav__item'><a href='contacts' class='nav__link'>Контакты</a></li>";

    if (isset($_SESSION['is_admin_logged_in']) && $_SESSION['is_admin_logged_in'] === true) {
        echo "<li class='nav__item'><a href='admin-panel' class='nav__link'><img src='./image/Иконка аккаунт.png' class='admin-icon'></a></li>
              <li class='nav__item'><a href='back/exit-from-admin' class='nav__link'>Выйти</a></li>";
    }

    echo "              </ul>
                    </nav>
                </div>
            </div>
            <div class='void-block' id='voidBlock'></div>
        </header>";
}
?>
