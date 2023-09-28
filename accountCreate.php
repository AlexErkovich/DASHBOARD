<?php include('template.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>accounts_category</title>
    <link rel="stylesheet" href="css/todo.css"> <!-- Подключение CSS-стилей для todo -->
    <link rel="stylesheet" href="css/style.css"> <!-- Подключение общих CSS-стилей -->
</head>

<body>
    <?php include('menu.php'); ?>
    <div class="main">
        <div class="title-page">
            <h1><?php echo $headerTitleConnect__accounts; ?></h1> <!-- Вывод заголовка -->
            <div class="section__main">
                <button onclick="navigationPageCreateAccount()" class="button">Создать учетную запись</button>
            </div>
        </div>

        <form method="post" action="save_account.php">
            <div class="form__content">

                <!-- Блок для ввода задач связанных с коммуникациями -->
                <div class="todo__block" id="communicationBlock">
                    <label for="communication">Communication and communication</label>
                    <div class="todo__content__row">
                        <div class="todo__content__input">
                            <label>Введи логин сервиса</label>
                            <input type="text" name="communication_login[]" size="60">
                        </div>
                        <div class="todo__content__input">
                            <label>Введи Пароль </label>
                            <input type="text" name="communication_password[]" size="60">
                        </div>
                        <div class="todo__content__input">
                            <label>Введи название сервиса </label>
                            <input type="text" name="communication_service[]" size="60">
                        </div>
                    
                        <?php echo $communicationMessage; ?> <!-- Вывод сообщения для задач связанных с коммуникациями -->
                    </div>
                </div>

                <input id="btn-save" type="submit" value="Создать" name="submit"> <!-- Кнопка для отправки формы -->
        </form>
        <form method="post" action="save_account.php">
            <div class="form__content">

                <!-- Блок для ввода задач связанных с коммуникациями -->
                <div class="todo__block" id="communicationBlock">
                    <label for="communication">Communication and communication</label>
                    <div class="todo__content__row">
                        <div class="todo__content__input">
                            <label>Введи логин сервиса</label>
                            <input type="text" name="communication_login[]" size="60">
                        </div>
                        <div class="todo__content__input">
                            <label>Введи Пароль </label>
                            <input type="text" name="communication_password[]" size="60">
                        </div>
                        <div class="todo__content__input">
                            <label>Введи название сервиса </label>
                            <input type="text" name="communication_service[]" size="60">
                        </div>
                    
                        <?php echo $communicationMessage; ?> <!-- Вывод сообщения для задач связанных с коммуникациями -->
                    </div>
                </div>

                <input id="btn-save" type="submit" value="Создать" name="submit"> <!-- Кнопка для отправки формы -->
        </form>
    </div>

    </div>

    <script>
        function navigationPageCreateAccount() {
            window.location.href = 'accounts_category.php';
        }

        function copyPassword(password) {
            navigator.clipboard.writeText(password);
            alert('Пароль скопирован: ' + password);
        }

        function navigationPageMain() {
            // Your code for navigating to the main page
        }

        function navigationPageTasks() {
            // Your code for navigating to the tasks page
        }

        function navigationPageDashboard() {
            // Your code for navigating to the dashboard page
        }
    </script>
</body>

</html>