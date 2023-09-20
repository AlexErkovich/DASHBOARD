<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="todo.css"> 



</head>

<body>
    <?php
    include 'path/to/menu.php';
    ?>
    <div class="todo">
        <!-- Основной блок списка задач -->
        <div class="todo__block">
            <!-- Раздел "Communication" -->
            <label for="communication">Communication and communication</label>
            <div class="todo__content__row">
                <input type="text" id="communication" name="communication" required minlength="60" maxlength="60"
                    size="60">
                <input type="checkbox" id="row_01">
                <span class="delete-icon" onclick="deleteContentRow(this)">&#10006;</span> <!-- Иконка удаления -->
            </div>
            <input type="button" value="Добавить поле" onclick="addContentRow('Communication')">
        </div>

        <!-- Аналогичные разделы для "Advertisement", "Finance", "Production", "Quality", "PR" -->
        <!-- Каждый раздел имеет свой уникальный идентификатор и вызывает соответствующие функции -->

        <div class="todo__block">
            <label for="advertisement">Advertisement</label>
            <div class="todo__content__row">
                <input type="text" id="advertisement" name="advertisement" size="60">
                <input type="checkbox" id="row_02">
                <span class="delete-icon" onclick="deleteContentRow(this)">&#10006;</span>
            </div>
            <input type="button" value="Добавить поле" onclick="addContentRow('Advertisement')">
        </div>

        <div class="todo__block">
            <label for="finance">Finance</label>
            <div class="todo__content__row">
                <input type="text" id="finance" name="finance" size="60">
                <input type="checkbox" id="row_03">
                <span class="delete-icon" onclick="deleteContentRow(this)">&#10006;</span>
            </div>
            <input type="button" value="Добавить поле" onclick="addContentRow('Finance')">
        </div>

        <div class="todo__block">
            <label for="production">Production</label>
            <div class="todo__content__row">
                <input type="text" id="production" name="production" size="60">
                <input type="checkbox" id="row_04">
                <span class="delete-icon" onclick="deleteContentRow(this)">&#10006;</span>
            </div>
            <input type="button" value="Добавить поле" onclick="addContentRow('Production')">
        </div>

        <div class="todo__block">
            <label for="quality">Quality</label>
            <div class="todo__content__row">
                <input type="text" id="quality" name="quality" size="60">
                <input type="checkbox" id="row_05">
                <span class="delete-icon" onclick="deleteContentRow(this)">&#10006;</span>
            </div>
            <input type="button" value="Добавить поле" onclick="addContentRow('Quality')">
        </div>

        <div class="todo__block">
            <label for="pr">PR</label>
            <div class="todo__content__row">
                <input type="text" id="pr" name="pr" size="60">
                <input type="checkbox" id="row_06">
                <span class="delete-icon" onclick="deleteContentRow(this)">&#10006;</span>
            </div>
            <input type="button" value="Добавить поле" onclick="addContentRow('PR')">
        </div>

        <input id="btn-save" type="button" value="Выполнить" onclick="saveToDatabase()">

        <script>
            // Функция для создания и добавления иконки удаления
            function createDeleteIcon() {
                const deleteIcon = document.createElement('span');
                deleteIcon.innerHTML = '&#10006;'; // Используем символ "крестика"
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
            function addContentRow(section) {
                const todoBlock = document.querySelector(`.todo__block label[for="${section.toLowerCase()}"]`);
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
                todoBlock.parentElement.insertBefore(newRow, todoBlock.nextElementSibling);
            }

        </script>
        <script>
            function saveToDatabase() {
                const communicationValue = document.getElementById('communication').value;
                const advertisementValue = document.getElementById('advertisement').value;
                const financeValue = document.getElementById('finance').value;
                const productionValue = document.getElementById('production').value;
                const qualityValue = document.getElementById('quality').value;
                const prValue = document.getElementById('pr').value;

                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'http://localhost/path_to_your_project/save_to_db.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        console.log(xhr.responseText);
                    }
                };
                xhr.send(`communication=${communicationValue}&advertisement=${advertisementValue}&finance=${financeValue}&production=${productionValue}&quality=${qualityValue}&pr=${prValue}`);
            }
        </script>

</body>

</html>