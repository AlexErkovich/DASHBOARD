<?php
    $servername = "localhost";
    $username = "Alex";
    $password = "12345";
    $dbname = "todo_db";

    // Создаем подключение
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Проверка подключения
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Проверяем, была ли отправлена форма
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Обрабатываем данные из формы для communication_login и communication_password
        $communicationLogins = $_POST['communication_login'];
        $communicationPasswords = $_POST['communication_password'];
        $communicationService = $_POST['communication_service'];

        // Предполагается, что массивы communication_login и communication_password имеют одинаковый размер
        $count = count($communicationLogins);

        // Перебираем данные и вставляем их в базу данных
        for ($i = 0; $i < $count; $i++) {
            $login = $communicationLogins[$i];
            $password = $communicationPasswords[$i];
            $name_service = $communicationService[$i];

            // SQL запрос для вставки данных в таблицу accounts_communication
            $sql = "INSERT INTO accounts_communication (login, password, name_service) VALUES ('$login', '$password' ,'$name_service')";

            if ($conn->query($sql) !== TRUE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
// Перенаправляем на страницу accounts.php после успешного сохранения данных
header("Location: accounts.php");
exit();
    // Закрываем подключение
    $conn->close();
?>