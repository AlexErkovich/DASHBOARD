<?php include('template.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>График</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php include('menu.php'); ?>
    <div class="main">
        <div class="title-page">
            <h1><?php echo $headerTitleConnect; ?></h1>
            <div class="title-page__section">
                <button onclick="navigationPageMain()" class="button"> Бизнес процессы </button>
                <button onclick="navigationPageTasks()" class="button"> Задачи </button>
                <button id="active" onclick="navigationPageDashboard()" class="button"> Dashboard </button>
            </div>
        </div>
        <div class="chart">
            <canvas id="myChart"></canvas>
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

        $communicationData = [];
        

        // Communication
        $sql = "SELECT COUNT(*) AS count_communication, DATE(date) AS communication_date FROM communication GROUP BY DATE(date)";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $communicationData[$row['communication_date']] = $row['count_communication'];
                $dateLabels[] = $row['communication_date'];
            }
        } else {
            $communicationData[date("Y-m-d")] = 0;
            $dateLabels[] = date("Y-m-d");
        }

        $conn->close();
        ?>

        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'line',  
                data: {
                    labels: <?php echo json_encode($dateLabels); ?>,
                    datasets: [
                        {
                            label: 'Communication',
                            data: <?php echo json_encode(array_values($communicationData)); ?>,
                            backgroundColor: 'rgba(255, 251, 245, 0.5)',
                            borderColor: 'rgba(255, 232, 197, 1)',
                            borderWidth: 1,
                            fill: false  
                        },
                        {
                            label: 'Advertisement',
                            data: <?php echo json_encode(array_values($advertisementData)); ?>,
                            backgroundColor: 'rgba(245, 243, 255, 0.5)',
                            borderColor: 'rgba(179, 164, 255, 1)',
                            borderWidth: 1,
                            fill: false  
                        },
                        {
                            label: 'Finance',
                            data: <?php echo json_encode(array_values($financeData)); ?>,
                            backgroundColor: 'rgba(255, 236, 234, 0.5)',
                            borderColor: 'rgba(255, 165, 155, 1)',
                            borderWidth: 1,
                            fill: false  
                        },
                        {
                            label: 'Production',
                            data: <?php echo json_encode(array_values($productionData)); ?>,
                            backgroundColor: 'rgba(246, 255, 236, 0.5)',
                            borderColor: 'rgba(188, 229, 142, 1)',
                            borderWidth: 1,
                            fill: false  
                        },
                        {
                            label: 'Quality',
                            data: <?php echo json_encode(array_values($qualityData)); ?>,
                            backgroundColor: 'rgba(245, 245, 245, 0.5)',
                            borderColor: 'rgba(180, 180, 180, 1)',
                            borderWidth: 1,
                            fill: false  
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

        <script>
            function navigationPageMain() {
                window.location.href = 'connect.php';
            }

            function navigationPageTasks() {
                window.location.href = 'todo.php';
            }

            function navigationPageDashboard() {
                window.location.href = 'graf.php';
            }
        </script>
    </div>
</body>

</html>
