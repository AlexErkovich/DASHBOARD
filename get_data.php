<?php
$servername = "localhost";
$username = "Alex";
$password = "12345";
$dbname = "todo_db";

// Создание подключения к базе данных
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$table = $_GET['table']; // Получаем название таблицы из параметра

// SQL-запрос для подсчета суммы записей для каждой даты
$sql = "SELECT DATE(date) AS date, COUNT(*) AS count FROM $table GROUP BY DATE(date)";

$result = $conn->query($sql);
$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Закрыть соединение с базой данных
$conn->close();

// Отправить данные в формате JSON
echo json_encode($data);
?>
