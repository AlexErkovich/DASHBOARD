
<?php
// Выводит данные со всех страниц
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

$tables = array("advertisement", "communication", "finance", "quality", "production");
$data = array();

foreach ($tables as $table) {
    // SQL-запрос для подсчета суммы записей для каждой даты
    $sql = "SELECT DATE(date) AS date, COUNT(*) AS count FROM $table GROUP BY DATE(date)";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Добавить данные в массив
            $data[] = array('table' => $table, 'date' => $row['date'], 'count' => $row['count']);
        }
    }
}

// Закрыть соединение с базой данных
$conn->close();

// Отправить данные в формате JSON
echo json_encode($data);
?>
