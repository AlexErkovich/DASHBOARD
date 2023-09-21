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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $communicationValue = $_POST['communication'];
    $advertisementValue = $_POST['advertisement'];
    $financeValue = $_POST['finance'];
    $productionValue = $_POST['production'];
    $qualityValue = $_POST['quality'];
    $prValue = $_POST['pr'];

    // Подготовка SQL-запроса
    $sql = "INSERT INTO todo_table (communication, advertisement, finance, production, quality, pr)
            VALUES ('$communicationValue', '$advertisementValue', '$financeValue', '$productionValue', '$qualityValue', '$prValue')";

    if ($conn->query($sql) === TRUE) {
        echo "Данные успешно сохранены в базе данных.";
    } else {
        echo "Ошибка при сохранении данных: " . $conn->error;
    }
}

// Закрываем соединение
$conn->close();
?>
