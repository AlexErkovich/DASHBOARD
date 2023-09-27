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

        <?php
        $servername = "localhost";
        $username = "Alex";
        $password = "12345";
        $dbname = "todo_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        //Данный код представляет собой фрагмент PHP-кода, который проверяет, есть ли параметр id в URL 
        //(через GET-запрос) и является ли он числовым значением. В дальнейшем это значение используется в коде.

        //isset($_GET['id']): Эта конструкция проверяет, существует ли параметр с именем 'id'
        //в URL через GET-запрос. $_GET - это ассоциативный массив, который содержит все параметры, переданные через GET-запрос. isset возвращает true, если параметр 'id' существует в запросе.

        //is_numeric($_GET['id']): Этот код проверяет, является ли значение параметра 'id' числовым. Функция
        //is_numeric возвращает true, если значение является числом, и false в противном случае.

        //Если оба условия выполняются (то есть параметр 'id' существует и является числом), 
        //то переменной $cardId присваивается значение параметра 'id' из GET-запроса. 
        //Это позволяет использовать $cardId в дальнейшем коде для обработки запроса с указанным идентификатором.

        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $cardId = $_GET['id'];

            $sql = "SELECT * FROM content WHERE id = $cardId";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo '<div class="card-details">';
                echo '<h2>' . $row["title"] . '</h2>';
                
                echo '</div>';
            } else {
                echo "No detailed information found for the selected card.";
            }
        } else {
            echo "Invalid card ID.";
        }

        $conn->close();
        ?>
    </div>
    </div>
    <script>
        function redirectToIndex() {
            window.location.href = 'index.php';
        }
    </script>
</body>

</html>