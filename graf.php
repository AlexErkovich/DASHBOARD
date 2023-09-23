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
            <h1>Связь и коммуникация</h1>
            <div class="section__main">
                <button onclick="navigationPageDashboard()" class="button"> Бизнес процессы </button>
                <button onclick="navigationPageTasks()" class="button"> Задачи </button>
                <button onclick="navigationPageDashboard()" class="button"> Dashboard </button>
            </div>
        </div>
        <canvas id="myChart"></canvas>

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
        $advertisementData = [];
        $dateLabels = [];

        $sql = "SELECT COUNT(*) AS count_communication, DATE(date) AS communication_date FROM communication GROUP BY DATE(date)";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $communicationData[] = $row['count_communication'];
                $dateLabels[] = $row['communication_date'];
            }
        }

        $sql = "SELECT COUNT(*) AS count_advertisement, DATE(date) AS advertisement_date FROM advertisement GROUP BY DATE(date)";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $advertisementData[] = $row['count_advertisement'];
            }
        }

        $conn->close();
        ?>

        
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($dateLabels); ?>,
                    datasets: [{
                        label: 'Communication',
                        data: <?php echo json_encode($communicationData); ?>,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Advertisement',
                        data: <?php echo json_encode($advertisementData); ?>,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
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
            function navigationPageDashboard() {
                window.location.href = 'index.php';
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