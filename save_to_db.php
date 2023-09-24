<?php
$servername = "localhost";
$username = "Alex";
$password = "12345";
$dbname = "todo_db";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['communication']) && is_array($_POST['communication'])) {
        foreach ($_POST['communication'] as $communication) {
            $communication = $conn->real_escape_string($communication); // Escape special characters
            $sql = "INSERT INTO communication (communication_text) VALUES ('$communication')";
            if ($conn->query($sql) !== TRUE) {
                echo "Ошибка при добавлении в таблицу 'communication': " . $conn->error;
            }
        }
    }

    if (isset($_POST['advertisement']) && is_array($_POST['advertisement'])) {
        foreach ($_POST['advertisement'] as $advertisement) {
            $advertisement = $conn->real_escape_string($advertisement); // Escape special characters
            $sql = "INSERT INTO advertisement (advertisement_text, date) VALUES ('$advertisement', NOW())"; // Adding date
            if ($conn->query($sql) !== TRUE) {
                echo "Ошибка при добавлении в таблицу 'advertisement': " . $conn->error;
            }
        }
    }

    if (isset($_POST['production']) && is_array($_POST['production'])) {
        foreach ($_POST['production'] as $production) {
            $production = $conn->real_escape_string($production); // Escape special characters
            $sql = "INSERT INTO production (production_text, date) VALUES ('$production', NOW())"; // Adding date
            if ($conn->query($sql) !== TRUE) {
                echo "Ошибка при добавлении в таблицу 'production': " . $conn->error;
            }
        }
    }

    if (isset($_POST['finance']) && is_array($_POST['finance'])) {
        foreach ($_POST['finance'] as $finance) {
            $finance = $conn->real_escape_string($finance); // Escape special characters
            $sql = "INSERT INTO finance (finance_text, date) VALUES ('$finance', NOW())"; // Adding date
            if ($conn->query($sql) !== TRUE) {
                echo "Ошибка при добавлении в таблицу 'finance': " . $conn->error;
            }
        }
    }

    if (isset($_POST['quality']) && is_array($_POST['quality'])) {
        foreach ($_POST['quality'] as $quality) {
            $quality = $conn->real_escape_string($quality); // Escape special characters
            $sql = "INSERT INTO quality (quality_text, date) VALUES ('$quality', NOW())"; // Adding date
            if ($conn->query($sql) !== TRUE) {
                echo "Ошибка при добавлении в таблицу 'quality': " . $conn->error;
            }
        }
    }

    // Перенаправление на index.php
    echo '<script>window.location.href = "graf.php";</script>';
}

$conn->close();
?>
