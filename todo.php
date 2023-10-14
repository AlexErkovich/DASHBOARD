<?php include('template.php'); ?> <!-- Подключение файла с общим шаблоном -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/todo.css"> <!-- Подключение CSS-стилей для todo -->
    <link rel="stylesheet" href="css/style.css"> <!-- Подключение общих CSS-стилей -->
    <title><?php echo $headerTitle; ?></title> <!-- Установка заголовка страницы -->
</head>

<body>
    <?php include('menu.php'); ?> <!-- Подключение файла с меню -->

    <!-- Основной контент страницы -->
    <div class="main">
        <div class="title-page">
            <h1><?php echo $todoTitle; ?></h1> <!-- Вывод заголовка -->
            <div class="title-page__section">
                <button onclick="navigationPageConnect()" class="button"> Бизнес процессы </button>
                <button id="active" onclick="navigationPageTasks()" class="button"> Задачи </button>
                <button onclick="navigationPageDashboard()" class="button"> Dashboard </button>
            </div>
        </div>
        <div class="todo">
            <!-- Форма для ввода задач и отправки на сервер -->
            <form method="post" action="chart.php" onsubmit="return validateForm()">
                <!-- Блок для ввода задач связанных с коммуникациями -->
                <div class="todo__block" id="communicationBlock">
                    <label for="communication">Communication and communication</label>
                    <div class="todo__content__row">
                        <input type="text" name="communication[]" size="60">
                    </div>
                    <button class="add-button" type="button" onclick="addNewField('communicationBlock')">Создать задачу</button>
                    <div>
                        <?php echo $communicationMessage; ?> <!-- Вывод сообщения для задач связанных с коммуникациями -->
                    </div>
                </div>

                <!-- Блок для ввода задач связанных с рекламой -->
                <div class="todo__block" id="advertisementBlock">
                    <label for="advertisement">Advertisement</label>
                    <div class="todo__content__row">
                        <input type="text" name="advertisement[]" size="60">
                    </div>
                    <button class="add-button" type="button" onclick="addNewField('advertisementBlock')">Создать задачу</button>
                    <div>
                        <?php echo $advertisementMessage; ?> <!-- Вывод сообщения для задач связанных с рекламой -->
                    </div>
                </div>

                <!-- Блок для ввода задач связанных с производством -->
                <div class="todo__block" id="productionBlock">
                    <label for="production">Production</label>
                    <div class="todo__content__row">
                        <input type="text" name="production[]" size="60">
                    </div>
                    <button class="add-button" type="button" onclick="addNewField('productionBlock')">Создать задачу</button>
                    <div>
                        <?php echo $productionMessage; ?> <!-- Вывод сообщения для задач связанных с производством -->
                    </div>
                </div>

                <!-- Блок для ввода задач связанных с финансами -->
                <div class="todo__block" id="financeBlock">
                    <label for="finance">Finance</label>
                    <div class="todo__content__row">
                        <input type="text" name="finance[]" size="60">
                    </div>
                    <button class="add-button" type="button" onclick="addNewField('financeBlock')">Создать задачу</button>
                    <div>
                        <?php echo $financeMessage; ?> <!-- Вывод сообщения для задач связанных с финансами -->
                    </div>
                </div>

                <!-- Блок для ввода задач связанных с качеством -->
                <div class="todo__block" id="qualityBlock">
                    <label for="quality">Quality</label>
                    <div class="todo__content__row">
                        <input type="text" name="quality[]" size="60">
                    </div>
                    <button class="add-button" type="button" onclick="addNewField('qualityBlock')">Создать задачу</button>
                    <div>
                        <?php echo $qualityMessage; ?> <!-- Вывод сообщения для задач связанных с качеством -->
                    </div>
                </div>

                <input id="btn-save" type="submit" value="Выполнить" name="submit"> <!-- Кнопка для отправки формы -->
            </form>
        </div>

    </div>

    <!-- JavaScript для навигации по страницам и добавления новых полей в форму -->
    <script>
        function navigationPageConnect() {
            window.location.href = 'connect.php'; // Перенаправление на страницу 'connect.php'
        }

        function navigationPageTasks() {
            window.location.href = 'todo.php'; // Перенаправление на страницу 'todo.php'
        }

        function navigationPageDashboard() {
            window.location.href = 'graf.php'; // Перенаправление на страницу 'graf.php'
        }

        function addNewField(blockId) {
            let block = document.getElementById(blockId);
            let newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = blockId === 'communicationBlock' ? 'communication[]' :
                (blockId === 'advertisementBlock' ? 'advertisement[]' :
                    (blockId === 'productionBlock' ? 'production[]' :
                        (blockId === 'financeBlock' ? 'finance[]' : 'quality[]')));
            newInput.size = '60';

            // Получение последнего элемента в блоке (перед кнопкой)
            let lastElement = block.querySelector('.todo__content__row').lastElementChild;

            // Вставка нового input перед последним элементом
            //block.querySelector('.todo__content__row').insertBefore(newInput, lastElement);

            block.querySelector('.todo__content__row').insertAdjacentElement('beforeend', newInput);
        }

        function validateForm() {
            let form = document.querySelector('form');
            let communicationInputs = form.querySelectorAll('div#communicationBlock input');
            let advertisementInputs = form.querySelectorAll('div#advertisementBlock input');
            let productionInputs = form.querySelectorAll('div#productionBlock input');
            let financeInputs = form.querySelectorAll('div#financeBlock input');
            let qualityInputs = form.querySelectorAll('div#qualityBlock input');

            // Функция для проверки, является ли поле пустым
            function isEmpty(input) {
                return input.value.trim() === '';
            }

            // Проверка и удаление пустых полей
            communicationInputs.forEach((input) => {
                if (isEmpty(input)) {
                    input.parentNode.removeChild(input);
                }
            });

            advertisementInputs.forEach((input) => {
                if (isEmpty(input)) {
                    input.parentNode.removeChild(input);
                }
            });

            productionInputs.forEach((input) => {
                if (isEmpty(input)) {
                    input.parentNode.removeChild(input);
                }
            });

            financeInputs.forEach((input) => {
                if (isEmpty(input)) {
                    input.parentNode.removeChild(input);
                }
            });

            qualityInputs.forEach((input) => {
                if (isEmpty(input)) {
                    input.parentNode.removeChild(input);
                }
            });

            // Если все блоки пусты, предупреждаем пользователя
            if (communicationInputs.length === 0 &&
                advertisementInputs.length === 0 &&
                productionInputs.length === 0 &&
                financeInputs.length === 0 &&
                qualityInputs.length === 0) {
                alert('Добавьте хотя бы одну задачу.');
                return false;
            }

            return true;
        }
    </script>
</body>

</html>