<?php
$servername = "localhost"; // Имя сервера базы данных
$username = "Alex"; // Имя пользователя базы данных
$password = "12345"; // Пароль пользователя базы данных
$dbname = "todo_db"; // Имя базы данных

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // Если не удалось подключиться, выводим ошибку и завершаем выполнение
}

// Проверка на метод запроса POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Функция для экранирования данных
    function escapeData($conn, $data) {
        return $conn->real_escape_string($data);
    }

    // Обработка данных и вставка в соответствующие таблицы
    function processAndInsert($conn, $table) {
        if (isset($_POST[$table]) && is_array($_POST[$table])) {
            foreach ($_POST[$table] as $item) {
                $item = escapeData($conn, $item);
                if (!empty($item)) {
                    $sql = "INSERT INTO $table ({$table}_text, date) VALUES ('$item', NOW())";
                    if ($conn->query($sql) !== TRUE) {
                        echo "Ошибка при добавлении в таблицу '$table': " . $conn->error;
                    }
                }
            }
        }
    }

    // Обработка и вставка данных для каждой таблицы
    $tables = array('communication', 'advertisement', 'production', 'finance', 'quality');
    foreach ($tables as $table) {
        processAndInsert($conn, $table);
    }

    // Перенаправление на chart.php и вывод сообщения
    echo '<script>alert("Данные отправлены."); window.location.href = "chart.php";</script>';
}

// Закрытие соединения
$conn->close();
?>
