<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY BIZNES</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Подключаем CSS файл -->
</head>
<body>
    <header class="menu"> <!-- Добавляем класс menu к header -->
        <p> <?php echo '
<header class="menu">
            <img src="img/logo.svg">
            <nav>
                <ul class="menu__list">
                    <li class="menu__item">
                        <a href="#" class="menu__link" data-toggle="submenu" data-target="Connect">Связь и коммуникация</a>
                        <ul id="Connect" class="menu__sublist hidden">
                            <li class="menu__subitem"><a href="#" class="menu__sublink">Связь и коммуникация</a></li>
                            <li class="menu__subitem"><a href="#" class="menu__sublink">Учетные записи</a></li>
                            <li class="menu__subitem"><a href="#" class="menu__sublink">Коллеги</a></li>
                        </ul>
                    </li>
                    <li class="menu__item">
                        <a href="#" class="menu__link" data-toggle="submenu" data-target="Reclama">Реклама</a>
                        <ul id="Reclama" class="menu__sublist hidden">
                            <li class="menu__subitem"><a href="#" class="menu__sublink">Планирование</a></li>
                            <li class="menu__subitem"><a href="#" class="menu__sublink">Производство</a></li>
                            <li class="menu__subitem"><a href="#" class="menu__sublink">Размещение</a></li>
                        </ul>
                    </li>
                    <li class="menu__item">
                        <a href="#" class="menu__link" data-toggle="submenu" data-target="Finance">Финансы</a>
                        <ul id="Finance" class="menu__sublist hidden">
                            <li class="menu__subitem"><a href="#" class="menu__sublink">Доход</a></li>
                            <li class="menu__subitem"><a href="#" class="menu__sublink">Расход</a></li>
                            <li class="menu__subitem"><a href="#" class="menu__sublink">Учет</a></li>
                        </ul>
                    </li>
                    <li class="menu__item">
                        <a href="#" class="menu__link" data-toggle="submenu" data-target="Production">Производство</a>
                        <ul id="Production" class="menu__sublist hidden">
                            <li class="menu__subitem"><a href="#" class="menu__sublink">Планирование</a></li>
                            <li class="menu__subitem"><a href="#" class="menu__sublink">Производство</a></li>
                            <li class="menu__subitem"><a href="#" class="menu__sublink">Размещение</a></li>
                        </ul>
                    </li>
                    <li class="menu__item">
                        <a href="#" class="menu__link" data-toggle="submenu" data-target="Qality">Качество</a>
                        <ul id="Qality" class="menu__sublist hidden">
                            <li class="menu__subitem"><a href="#" class="menu__sublink">Обучение</a></li>
                            <li class="menu__subitem"><a href="#" class="menu__sublink">Проверка качества</a></li>
                            <li class="menu__subitem"><a href="#" class="menu__sublink">Анализ качества</a></li>
                        </ul>
                    </li>
                    <li class="menu__item">
                        <a href="#" class="menu__link" data-toggle="submenu" data-target="PR">PR</a>
                        <ul id="PR" class="menu__sublist hidden">
                            <li class="menu__subitem"><a href="#" class="menu__sublink">PR</a></li>
                            <li class="menu__subitem"><a href="#" class="menu__sublink">Партнеры</a></li>
                            <li class="menu__subitem"><a href="#" class="menu__sublink">Вводные услуги</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>'?> </p>
    </header>
</body>
</html>
