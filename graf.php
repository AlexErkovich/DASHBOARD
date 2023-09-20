<?php
$servername = "localhost"; 
$username = "Alex"; 
$password = "12345"; 
$dbname = "todo_db"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$communication = $_POST['communication'];
$advertisement = $_POST['advertisement'];
$finance = $_POST['finance'];
$production = $_POST['production'];
$quality = $_POST['quality'];
$pr = $_POST['pr'];

$sql = "INSERT INTO todo_table (communication, advertisement, finance, production, quality, pr) VALUES ('$communication', '$advertisement', '$finance', '$production', '$quality', '$pr')";

if ($conn->query($sql) === TRUE) {
    echo "Record added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
