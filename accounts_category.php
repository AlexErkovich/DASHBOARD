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
                echo '<h1>' . $accountsTitle . '</h1>';
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
            $tables = array("accounts_production", "accounts_communication", "accounts_finance", "accounts_advertisement");

            // ряд с табами 
            echo '<div class="tab_category_password">';
            
            // Конструкция foreach ($tables as $table) в PHP используется для итерации по элементам массива.
            // В данном случае, foreach проходит по каждому элементу массива $tables и временно присваивает
            // его значение переменной $table.
            // Вот как это работает:
            // foreach - это цикл в PHP, предназначенный для перебора элементов массива.
            // $tables - это массив, который содержит набор значений (в данном контексте, имен таблиц базы данных).
            // $table - это временная переменная, которая будет хранить значение текущего элемента массива при каждой
            // итерации цикла.
            //Таким образом, каждая итерация цикла foreach будет брать следующее значение из массива
            // $tables и присваивать его переменной $table. Это позволяет вам выполнять операции с каждым элементом массива.
          
            //$tables = array("table1", "table2", "table3");
            
            //foreach ($tables as $table) {
                //echo $table;  // Здесь $table будет поочередно содержать "table1", "table2", "table3"
            //}
            //В данном примере foreach перебирает массив $tables и для каждой итерации переменная
            // $table принимает значение текущего элемента из массива.
            
            
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
            '</div>';
            echo '<div class="article__group">';
            if (isset($_GET['name'])) {
                $tableName = $_GET['name'];

                // Изменение: запрос к указанной таблице
                $sql = "SELECT name_service, login, password FROM $tableName";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                       
                        
                        echo '<article>';
                        echo '<h5>' . $row["name_service"] . '</h5>';
                        echo '<p>' . $row["login"] . '</p>';
                        echo '<button onclick="copyPassword(\'' . $row['password'] . '\')" class="button">Скопировать пароль</button>';
                        // Исправление: добавлен закрывающий тег article
                        echo '</article>';
                        // Исправление: добавлен закрывающий тег div
                        
                    
                        
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
            function showTableDetails(tableName) {
                window.location.href = 'accounts_category.php?name=' + tableName;
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
    </div>
</body>

</html>