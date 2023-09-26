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
            <h1><?php echo $headerTitle; ?></h1>
            <div class="section__main">
                <button id="active" onclick="navigationPageMain()" class="button"> Бизнес процессы </button>
                <button onclick="navigationPageTasks()" class="button"> Задачи </button>
                <button onclick="navigationPageDashboard()" class="button"> Dashboard </button>
            </div>
        </div>
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

        $sql = "SELECT * FROM connect_bp";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '
                <div class="connect">
                    <button onclick="navigateTo(\'' . $row["link_value"] . '\')" class="button"> ' . $row["name"] . '
        <img src="' . $row["link"] . '" >
    </button>
                </div>
                
                ';
            }
        } else {
            echo "0 результатов";
        }

        // Close the connection
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