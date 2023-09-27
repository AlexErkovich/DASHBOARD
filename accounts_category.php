<?php include('template.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>accounts_category</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include('menu.php'); ?>
    <div class="main">
        <div class="title-page">
            <?php
            if (isset($_GET['name'])) {
                $tableName = $_GET['name'];
                echo '<h1>' . $tableName . '</h1>';
            } else {
                echo '<h1>No table selected</h1>';
            }
            ?>
            <div class="section__main">
                <button id="active" onclick="navigationPageMain()" class="button">Бизнес процессы</button>
                <button onclick="navigationPageTasks()" class="button">Задачи</button>
                <button onclick="navigationPageDashboard()" class="button">Dashboard</button>
            </div>
        </div>

        <div class="passwords__block">
            <?php
            $servername = "localhost";
            $username = "Alex";
            $password = "12345";
            $dbname = "todo_db";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $tables = array("accounts_production", "accounts_communication", "accounts_finance");
            echo '<div class="content_password">';
            echo '<div class="content_passwords__password">';

            foreach ($tables as $table) {
                $sql = "SELECT COUNT(*) FROM $table";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_row()) {
                        // Изменение: добавлен вызов функции showTableDetails с передачей имени таблицы
                        echo '<span onclick="showTableDetails(\'' . $table . '\')"> ' . $table . ' (' . $row[0] . ')</span>';
                    }
                } else {
                    echo "0 результатов";
                }
            }

            echo '</div>';

            if (isset($_GET['name'])) {
                $tableName = $_GET['name'];

                // Изменение: запрос к указанной таблице
                $sql = "SELECT name_service, login, password FROM $tableName";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                       
                        echo '<div class="connect">';
                        echo '<article>' . $row["name_service"] . '</article>';
                        echo '<article>' . $row["login"] . '</article>';
                        echo '<button onclick="copyPassword(\'' . $row['password'] . '\')" class="button">Скопировать пароль</button>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "No results found for the selected table.";
                }
            }
            echo '</div>';
            $conn->close();
            ?>
        </div>

        <script>
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
    </div>
</body>

</html>