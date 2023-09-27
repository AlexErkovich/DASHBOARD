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

            $tables = array("accounts", "accounts_production");

            echo '<div class="spans">';

            foreach ($tables as $table) {
                $sql = "SELECT COUNT(*) FROM $table";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_row()) {
                        echo '<span onclick="addTagPage(\'' . $table . '\')"> ' . $table . ' (' . $row[0] . ')</span>';
                    }
                } else {
                    echo "0 результатов";
                }
            }

            echo '</div>';

            // Close the connection
            $conn->close();
            ?>
        </div>
        
        <h2> Связь и коммуникация</h2>

        <div class="passwords__block">
            <?php
            $servername = "localhost";
            $username = "Alex";
            $password = "12345";
            $dbname = "todo_db";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM accounts_production";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                <div class="password">
                   <div class="connect">
                      <article>' . $row["name_service"] . ' </article> 
                      <article>' . $row["login"] . ' </article>   
                      <button onclick="copyPassword(\'' . $row['password'] . '\')" class="button"> Скопировать пароль </button>
                    </div>
                </div>';
                }
            } else {
                echo "0 результатов";
            }

            // Close the connection
            $conn->close();
            ?>
        </div>

        <h2> Производство</h2>
        <div class="passwords__block">
            <?php
            $servername = "localhost";
            $username = "Alex";
            $password = "12345";
            $dbname = "todo_db";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM accounts";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                <div class="password">
                   <div class="connect">
                      <article>' . $row["name_service"] . ' </article> 
                      <article>' . $row["login"] . ' </article>   
                      <button onclick="copyPassword(\'' . $row['password'] . '\')" class="button"> Скопировать пароль </button>
                    </div>
                </div>';
                }
            } else {
                echo "0 результатов";
            }

            // Close the connection
            $conn->close();
            ?>
        </div>
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

        function copyPassword(password) {
            navigator.clipboard.writeText(password);
            alert('Пароль скопирован: ' + password);
        }
    </script>
</body>

</html>