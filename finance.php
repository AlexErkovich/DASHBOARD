<?php include('template.php'); ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include('menu.php'); ?>

    <div class="main">
        <div class="title-page">
            <h1><?php echo $headerTitleFinance; ?></h1>
            <div class="title-page__section">
                <button id="active" onclick="navigationPageMain()" class="button">Бизнес процессы</button>
                <button onclick="navigationPageTasks()" class="button">Задачи</button>
                <button onclick="navigationPageDashboard()" class="button">Dashboard</button>
            </div>
        </div>

        <div class="buttons__group">
            <?php
            $servername = "localhost";
            $username = "Alex";
            $password = "12345";
            $dbname = "todo_db";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Ошибка соединения: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM Transactions";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div>';
                    echo ' ' . $row["Location"] . '<br>';
                    echo ' ' . $row["Description"] . '<br>';
                    echo ' ' . $row["Amount"] . '<br>';
                    echo ' ' . $row["Timestamp"] . '<br>';
                    echo '</div>';
                }
            } else {
                echo "0 результатов";
            }

            $conn->close();
            ?>
        </div>
    </div>

    <script>
        function navigationPageMain() {
            // Добавить функционал для перехода на главную страницу
        }

        function navigationPageTasks() {
            window.location.href = 'todo.php';
        }

        function navigationPageDashboard() {
            window.location.href = 'graf.php';
        }
    </script>
</body>

</html>
