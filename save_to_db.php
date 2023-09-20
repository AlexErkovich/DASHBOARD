<?php
$servername = "localhost"; 
$username = "Alex"; 
$password = "12345"; 
$dbname = "todo_db"; 

$conn = new mysqli($servername, $username, $password, $dbname);



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $communication = $_POST['communication'];
    $advertisement = $_POST['advertisement'];
    $finance = $_POST['finance'];
    $production = $_POST['production'];
    $quality = $_POST['quality'];
    $pr = $_POST['pr'];

    // Here you can use these variables to insert data into your database or perform other actions

    echo "Data received:\nCommunication: $communication\nAdvertisement: $advertisement\nFinance: $finance\nProduction: $production\nQuality: $quality\nPR: $pr";
} else {
    echo "Invalid request";
}
?>


