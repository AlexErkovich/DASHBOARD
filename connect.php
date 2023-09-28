<?php include('template.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include('menu.php'); ?>
    <div class="main">
        <div class="title-page">
            <!-- Исправление: Добавлен вывод переменной $headerTitleConnect -->
            <h1><?php echo $headerTitleConnect; ?></h1>
            <div class="section__main">
                <button id="active" onclick="navigationPageMain()" class="button">Бизнес процессы</button>
                <button onclick="navigationPageTasks()" class="button">Задачи</button>
                <button onclick="navigationPageDashboard()" class="button">Dashboard</button>
            </div>
        </div>
        <?php
        $servername = "localhost";
        $username = "Alex";
        $password = "12345";
        $dbname = "todo_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM connect_bp";
        $result = $conn->query($sql);

        // Исправление: Перенос открывающего тега div за пределы цикла
        echo '<div class="buttons__group">';
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Исправление: Добавлены открывающий и закрывающий теги для кнопки
                echo '<button onclick="navigateTo(\'' . $row["link_value"] . '\')" class="button">';
                echo $row["name"];
                echo '<img src="' . $row["img"] . '">';
                echo '</button>';
            }
        } else {
            echo "0 результатов";
        }

        // Исправление: Закрытие тега div
        echo '</div>';

        $conn->close();
        ?>
    </div>

    <script>
        function navigateTo(link) {
            window.open(link, '_blank');
        }

        // ... (existing JavaScript code)

        function navigationPageEmail() {
            window.location.href = 'index.php';
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
