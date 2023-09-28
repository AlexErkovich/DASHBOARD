<?php include('template.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>accounts</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include('menu.php'); ?>
    <div class="main">
        <div class="title-page">
            <h1><?php echo $headerTitleConnect__accounts; ?></h1>
            <div class="section__main">
                <button id="active" onclick="navigationPageMain()" class="button"> Бизнес процессы </button>
                <button onclick="navigationPageTasks()" class="button"> Задачи </button>
                <button onclick="navigationPageDashboard()" class="button"> Dashboard </button>
            </div>
        </div>
        <div class="spans">
            <?php
            $servername = "localhost";
            $username = "Alex";
            $password = "12345";
            $dbname = "todo_db";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            $tables = array("accounts_production", "accounts_communication", "accounts_finance", "accounts_advertisement");

            // ряд с табами 
            echo '<div class="spans">';
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
            // ряд с табами закрылся

            // Close the connection
            $conn->close();
            ?>
        </div>

        <script>
            function navigateTo(link) {
                window.open(link, '_blank');
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

            // Изменение: добавлена функция для отображения данных таблицы
            function showTableDetails(tableName) {
                window.location.href = 'accounts_category.php?name=' + tableName;
            }
        </script>
    </div>
</body>

</html>