<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY BIZNES</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Меню -->
    <header class="menu">
        <img src="img/logo.svg">
        <nav>
            <ul class="menu__list">
                <li class="menu__item">
                    <a href="#" class="menu__link" data-toggle="submenu" data-target="Connect">Связь и коммуникация</a>
                </li>
                <li class="menu__item">
                    <a href="#" class="menu__link" data-toggle="submenu" data-target="Reclama">Реклама</a>
                </li>
                <li class="menu__item">
                    <a href="#" class="menu__link" data-toggle="submenu" data-target="Finance">Финансы</a>
                </li>
                <li class="menu__item">
                    <a href="#" class="menu__link" data-toggle="submenu" data-target="Production">Производство</a>
                </li>
                <li class="menu__item">
                    <a href="#" class="menu__link" data-toggle="submenu" data-target="Qality">Качество</a>
                </li>
                <li class="menu__item">
                    <a href="#" class="menu__link" data-toggle="submenu" data-target="PR">PR</a>
                </li>
            </ul>
        </nav>

        <div id="Connect" class="menu__sublist hidden">
            <li class="menu__subitem"><a href="#" class="menu__sublink">Связь и коммуникация</a></li>
            <li class="menu__subitem"><a href="#" class="menu__sublink">Учетные записи</a></li>
            <li class="menu__subitem"><a href="#" class="menu__sublink">Коллеги</a></li>
        </div>

        <div id="Reclama" class="menu__sublist hidden">
            <li class="menu__subitem"><a href="#" class="menu__sublink">Планирование</a></li>
            <li class="menu__subitem"><a href="#" class="menu__sublink">Производство</a></li>
            <li class="menu__subitem"><a href="#" class="menu__sublink">Размещение</a></li>
        </div>

        <div id="Finance" class="menu__sublist hidden">
            <li class="menu__subitem"><a href="#" class="menu__sublink">Доход</a></li>
            <li class="menu__subitem"><a href="#" class="menu__sublink">Расход</a></li>
            <li class="menu__subitem"><a href="#" class="menu__sublink">Учет</a></li>
        </div>

        <div id="Production" class="menu__sublist hidden">
            <li class="menu__subitem"><a href="#" class="menu__sublink">Планирование</a></li>
            <li class="menu__subitem"><a href="#" class="menu__sublink">Производство</a></li>
            <li class="menu__subitem"><a href="#" class="menu__sublink">Размещение</a></li>
        </div>

        <div id="PR" class="menu__sublist hidden">
            <li class="menu__subitem"><a href="#" class="menu__sublink">PR</a></li>
            <li class="menu__subitem"><a href="#" class="menu__sublink">Партнеры</a></li>
            <li class="menu__subitem"><a href="#" class="menu__sublink">Вводные услуги</a></li>
        </div>

        <div id="Qality" class="menu__sublist hidden">
            <li class="menu__subitem"><a href="#" class="menu__sublink">Обучение</a></li>
            <li class="menu__subitem"><a href="#" class="menu__sublink">Проверка качества</a></li>
            <li class="menu__subitem"><a href="#" class="menu__sublink">Анализ качества</a></li>
        </div>

        <script>
            function toggleSubmenu(event) {
                event.preventDefault();
                const targetId = event.target.getAttribute('data-target');
                const sublist = document.getElementById(targetId);

                const linkRect = event.target.getBoundingClientRect();

                sublist.style.top = `${linkRect.bottom}px`;
                sublist.style.left = `${linkRect.left}px`;

                sublist.classList.toggle('hidden');
            }

            const submenuToggles = document.querySelectorAll('[data-toggle="submenu"]');

            submenuToggles.forEach(toggle => {
                toggle.addEventListener('click', toggleSubmenu);
            });
        </script>
    </header>
</body>

</html>