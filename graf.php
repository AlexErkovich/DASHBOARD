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
                <button  onclick="navigationPageMain()" class="button"> Бизнес процессы </button>
                <button id="active" onclick="navigationPageTasks()" class="button"> Задачи </button>
                <button onclick="navigationPageDashboard()" class="button"> Dashboard </button>
            </div>
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
        $advertisementData = [];
        $financeData = [];
        $productionData = [];
        $dateLabels = [];

        // Communication

        $sql = "SELECT COUNT(*) AS count_communication, DATE(date) AS communication_date FROM communication GROUP BY DATE(date)";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $communicationData[] = $row['count_communication'];
                $dateLabels[] = $row['communication_date'];
            }
        }

        // Advertisement

        $sql = "SELECT COUNT(*) AS count_advertisement, DATE(date) AS advertisement_date FROM advertisement GROUP BY DATE(date)";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $advertisementData[] = $row['count_advertisement'];
            }
        }

        // Finance

        $sql = "SELECT COUNT(*) AS count_finance, DATE(date) AS finance_date FROM finance GROUP BY DATE(date)";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $financeData[] = $row['count_finance'];
            }
        }

        // Production

        $sql = "SELECT COUNT(*) AS count_production, DATE(date) AS production_date FROM production GROUP BY DATE(date)";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $productionData[] = $row['count_production'];
            }
        }

        // Quality

        $sql = "SELECT COUNT(*) AS count_quality, DATE(date) AS quality_date FROM quality GROUP BY DATE(date)";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $qualityData[] = $row['count_quality'];
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
                            backgroundColor: 'rgba(255, 251, 245, 1)',
                            borderColor: 'rgba(255, 232, 197, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Advertisement',
                            data: <?php echo json_encode($advertisementData); ?>,
                            backgroundColor: 'rgba(245, 243, 255, 1)',
                            borderColor: 'rgba(179, 164, 255, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Finance',
                            data: <?php echo json_encode($financeData); ?>,
                            backgroundColor: 'rgba(255, 236, 234, 1)',
                            borderColor: 'rgba(255, 165, 155, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Production',
                            data: <?php echo json_encode($productionData); ?>,
                            backgroundColor: 'rgba(246, 255, 236, 1)',
                            borderColor: 'rgba(188, 229, 142, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Quality',
                            data: <?php echo json_encode($qualityData); ?>,
                            backgroundColor: 'rgba(245, 245, 245, 1)',
                            borderColor: 'rgba(180, 180, 180, 1)',
                            borderWidth: 1


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