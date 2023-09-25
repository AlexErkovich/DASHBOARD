<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu</title>
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="css/menu.css">
</head>

<body>
    <?php echo
    '<div id="menu">
        <div id="mobile-menu" onclick="toggleMobileMenu()">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <ul>
            <!-- Остальные пункты меню -->
        </ul>
    </div>
    <div id="menu">
        <a href="index.php"> <img  src="img/logo.svg"></a>
        <ul>
            <li>
                <a href="#">Связь и коммуникация</a>
                <ul class="sub-menu" style="display: none;">
                    <li><a href="connect.php">Связь и коммуникация</a></li>
                    <li><a href="#">Учетные записи</a></li>
                    <li><a href="#">Коллеги</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Реклама</a>
                <ul class="sub-menu" style="display: none;">
                    <li><a href="#">Планирование</a></li>
                    <li><a href="#">Производство</a></li>
                    <li><a href="#">Размещение</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Финансы</a>
                <ul class="sub-menu" style="display: none;">
                    <li><a href="#">Доход</a></li>
                    <li><a href="#">Расход</a></li>
                    <li><a href="#">Учет</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Производство</a>
                <ul class="sub-menu" style="display: none;">
                    <li><a href="#">Планирование</a></li>
                    <li><a href="#">Обеспечение</a></li>
                    <li><a href="#">Производство</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Качество</a>
                <ul class="sub-menu" style="display: none;">
                    <li><a href="#">Обучение</a></li>
                    <li><a href="#">Проверка качества</a></li>
                    <li><a href="#">Анализ качества</a></li>
                </ul>
            </li>
            <li>
                <a href="#">PR</a>
                <ul class="sub-menu" style="display: none;">
                    <li><a href="#">PR</a></li>
                    <li><a href="#">Партнеры</a></li>
                    <li><a href="#">Вводные услуги</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <script>
        // Функция для переключения видимости подразделов
        function toggleSubMenu(event) {
        var subMenu = event.target.nextElementSibling;
        if (subMenu) {
        subMenu.style.display =
        subMenu.style.display === "none" || subMenu.style.display === ""
        ? "block"
        : "none";
        }
        }

        // Добавление обработчика событий для всех ссылок
        var menuItems = document.querySelectorAll("#menu ul li a");
        menuItems.forEach(function (item) {
        item.addEventListener("click", toggleSubMenu);
        });

        function toggleMobileMenu() {
        var menu = document.querySelector("#menu ul");
        menu.classList.toggle("mobile-menu-active");
        }
        </script>'
        ?>
</body>

</html>