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

    // Обработка данных для таблицы 'communication'
    if (isset($_POST['communication']) && is_array($_POST['communication'])) {
        foreach ($_POST['communication'] as $communication) {
            $communication = $conn->real_escape_string($communication); // Экранирование специальных символов
            $sql = "INSERT INTO communication (communication_text) VALUES ('$communication')"; // Формирование SQL-запроса для вставки данных
            if ($conn->query($sql) !== TRUE) {
                echo "Ошибка при добавлении в таблицу 'communication': " . $conn->error; // Вывод сообщения об ошибке при неудачном запросе
            }
        }
    }

    // Обработка данных для таблицы 'advertisement'
    if (isset($_POST['advertisement']) && is_array($_POST['advertisement'])) {
        foreach ($_POST['advertisement'] as $advertisement) {
            $advertisement = $conn->real_escape_string($advertisement); // Экранирование специальных символов
            $sql = "INSERT INTO advertisement (advertisement_text, date) VALUES ('$advertisement', NOW())"; // Формирование SQL-запроса для вставки данных с текущей датой
            if ($conn->query($sql) !== TRUE) {
                echo "Ошибка при добавлении в таблицу 'advertisement': " . $conn->error; // Вывод сообщения об ошибке при неудачном запросе
            }
        }
    }

    // Обработка данных для таблицы 'production'
    if (isset($_POST['production']) && is_array($_POST['production'])) {
        foreach ($_POST['production'] as $production) {
            $production = $conn->real_escape_string($production); // Экранирование специальных символов
            $sql = "INSERT INTO production (production_text, date) VALUES ('$production', NOW())"; // Формирование SQL-запроса для вставки данных с текущей датой
            if ($conn->query($sql) !== TRUE) {
                echo "Ошибка при добавлении в таблицу 'production': " . $conn->error; // Вывод сообщения об ошибке при неудачном запросе
            }
        }
    }

    // Обработка данных для таблицы 'finance'
    if (isset($_POST['finance']) && is_array($_POST['finance'])) {
        foreach ($_POST['finance'] as $finance) {
            $finance = $conn->real_escape_string($finance); // Экранирование специальных символов
            $sql = "INSERT INTO finance (finance_text, date) VALUES ('$finance', NOW())"; // Формирование SQL-запроса для вставки данных с текущей датой
            if ($conn->query($sql) !== TRUE) {
                echo "Ошибка при добавлении в таблицу 'finance': " . $conn->error; // Вывод сообщения об ошибке при неудачном запросе
            }
        }
    }

    // Обработка данных для таблицы 'quality'
    if (isset($_POST['quality']) && is_array($_POST['quality'])) {
        foreach ($_POST['quality'] as $quality) {
            $quality = $conn->real_escape_string($quality); // Экранирование специальных символов
            $sql = "INSERT INTO quality (quality_text, date) VALUES ('$quality', NOW())"; // Формирование SQL-запроса для вставки данных с текущей датой
            if ($conn->query($sql) !== TRUE) {
                echo "Ошибка при добавлении в таблицу 'quality': " . $conn->error; // Вывод сообщения об ошибке при неудачном запросе
            }
        }
    }

    // Перенаправление на index.php
    echo '<script>window.location.href = "graf.php";</script>';
}

// Закрытие соединения
$conn->close();
?>
