<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/todo.css">
</head>

<body>
    <?php include('menu.php'); ?>
    <div class="title-page">
        <h1>Связь и коммуникация</h1>
        <div class="section__main">
            <button onclick="navigationPageDashboard()" class="button"> Бизнес процессы </button>
            <button onclick="navigationPageTasks()" class="button"> Задачи </button>
        </div>
    </div>
    <div class="todo">
        <!-- Основной блок списка задач -->
        <div class="todo__block" id="communicationBlock">
            <!-- Раздел "Communication" -->
            <label for="communication">Communication and communication</label>
            <div class="todo__content__row">
                <input type="text" id="communication" name="communication" required minlength="60" maxlength="60"
                    size="60">
                <input type="checkbox" id="row_01">

            </div>
            <input class="button-input" type="button" value="Добавить поле"
                onclick="addContentRow('Communication', 'communicationBlock')">
        </div>

        <!-- Аналогичные разделы для "Advertisement", "Finance", "Production", "Quality", "PR" -->
        <!-- Каждый раздел имеет свой уникальный идентификатор и вызывает соответствующие функции -->
        <div class="todo__block" id="advertisementBlock">
            <label for="advertisement">Advertisement</label>
            <div class="todo__content__row">
                <input type="text" id="advertisement" name="advertisement" size="60">
                <input type="checkbox" id="row_01">

            </div>
            <input class="button-input" type="button" value="Добавить поле"
                onclick="addContentRow('Advertisement', 'advertisementBlock')">
        </div>

        <div class="todo__block" id="financeBlock">
            <label for="finance">Finance</label>
            <div class="todo__content__row">
                <input type="text" id="finance" name="finance" size="60">
                <input type="checkbox" id="row_01">

            </div>
            <input class="button-input" type="button" value="Добавить поле"
                onclick="addContentRow('Finance', 'financeBlock')">
        </div>

        <div class="todo__block" id="productionBlock">
            <label for="production">Production</label>
            <div class="todo__content__row">
                <input type="text" id="production" name="production" size="60">
                <input type="checkbox" id="row_01">
            </div>
            <input class="button-input" type="button" value="Добавить поле"
                onclick="addContentRow('Production', 'productionBlock')">
        </div>

        <div class="todo__block" id="qualityBlock">
            <label for="quality">Quality</label>
            <div class="todo__content__row">
                <input type="text" id="quality" name="quality" size="60">
                <input type="checkbox" id="row_01">

            </div>
            <input class="button-input" type="button" value="Добавить поле"
                onclick="addContentRow('Quality', 'qualityBlock')">
        </div>

        <div class="todo__block" id="prBlock">
            <label for="pr">PR</label>
            <div class="todo__content__row">
                <input type="text" id="pr" name="pr" size="60">
                <input type="checkbox" id="row_01">
            </div>
            <input class="button-input" type="button" value="Добавить поле" onclick="addContentRow('PR', 'prBlock')">
        </div>

        <input id="btn-save" type="button" value="Выполнить" onclick="saveToDatabase()">
    </div>

    <script>
        // Функция для создания и добавления иконки удаления
        function createDeleteIcon() {
            const deleteIcon = document.createElement('span');
            deleteIcon.innerHTML = '&#10062;'; // Используем символ "крестика"
            deleteIcon.classList.add('delete-icon');
            deleteIcon.addEventListener('click', deleteContentRow);
            return deleteIcon;
        }

        // Функция для удаления поля
        function deleteContentRow(event) {
            const contentRow = event.target.parentElement;
            contentRow.parentElement.removeChild(contentRow);
        }

        // Функция для добавления нового поля в раздел
        function addContentRow(section, blockId) {
            const todoBlock = document.getElementById(blockId);
            const newRow = document.createElement('div');
            newRow.classList.add('todo__content__row');

            const newInputCheckbox = document.createElement('input');
            newInputCheckbox.type = 'checkbox';
            newInputCheckbox.id = `row_${Math.random().toString(36).substr(2, 9)}`; // Генерируем уникальный ID

            const newInputText = document.createElement('input');
            newInputText.type = 'text';
            newInputText.id = `${section.toLowerCase()}_${Math.random().toString(36).substr(2, 9)}`; // Генерируем уникальный ID
            newInputText.name = `${section.toLowerCase()}_task`;
            newInputText.size = 60;

            const deleteIcon = createDeleteIcon();

            newRow.appendChild(newInputCheckbox);
            newRow.appendChild(newInputText);
            newRow.appendChild(deleteIcon);

            // Append the new row at the end of the todo block
            todoBlock.querySelector('.todo__block').appendChild(newRow);
        }

        // Функция для отправки данных на сервер и обработки результата
        function saveToDatabase() {
            const communicationValue = document.getElementById('communication').value;
            const advertisementValue = document.getElementById('advertisement').value;
            const financeValue = document.getElementById('finance').value;
            const productionValue = document.getElementById('production').value;
            const qualityValue = document.getElementById('quality').value;
            const prValue = document.getElementById('pr').value;

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'save_to_db.php', true); // Изменено на save_to_db.php
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText); // Выводим сообщение об успешной отправке
                    window.location.href = 'index.php'; // Перенаправляем на страницу index.php
                }
            };
            xhr.send(`communication=${communicationValue}&advertisement=${advertisementValue}&finance=${financeValue}&production=${productionValue}&quality=${qualityValue}&pr=${prValue}`);
        }

        function navigationPageDashboard() {
            // Здесь замените 'dashboard.html' на путь к вашей странице
            window.location.href = 'index.php';
        }

        function navigationPageTasks() {
            // Здесь замените 'dashboard.html' на путь к вашей странице
            window.location.href = 'todo.php';
        }
    </script>

</body>

</html>
