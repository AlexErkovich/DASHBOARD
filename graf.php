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
                <button onclick="navigationPageMain()" class="button"> Бизнес процессы </button>
                <button id="active" onclick="navigationPageTasks()" class="button"> Задачи </button>
                <button onclick="navigationPageDashboard()" class="button"> Dashboard </button>
            </div>
        </div>
        <div class="chart">
            <canvas id="myChart"></canvas>
        </div>

        <?php
        // ... (подключение к базе данных и запросы)

        // ... (извлечение данных из базы)

        if (isset($_POST['submit'])) {
            // ... (извлечение данных из POST)

            // Очистим массивы от пустых значений
            $communicationData = array_filter($communicationData, function($value) {
                return $value !== '';
            });
            $advertisementData = array_filter($advertisementData, function($value) {
                return $value !== '';
            });
            $financeData = array_filter($financeData, function($value) {
                return $value !== '';
            });
            $productionData = array_filter($productionData, function($value) {
                return $value !== '';
            });
            $qualityData = array_filter($qualityData, function($value) {
                return $value !== '';
            });

            // Теперь можем добавить непустые значения в базу данных
            foreach ($communicationData as $value) {
                if (!empty($value)) {
                    $sql = "INSERT INTO communication (communication_value) VALUES ('$value')";
                    $conn->query($sql);
                }
            }

            foreach ($advertisementData as $value) {
                if (!empty($value)) {
                    $sql = "INSERT INTO advertisement (advertisement_value) VALUES ('$value')";
                    $conn->query($sql);
                }
            }

            foreach ($financeData as $value) {
                if (!empty($value)) {
                    $sql = "INSERT INTO finance (finance_value) VALUES ('$value')";
                    $conn->query($sql);
                }
            }

            foreach ($productionData as $value) {
                if (!empty($value)) {
                    $sql = "INSERT INTO production (production_value) VALUES ('$value')";
                    $conn->query($sql);
                }
            }

            foreach ($qualityData as $value) {
                if (!empty($value)) {
                    $sql = "INSERT INTO quality (quality_value) VALUES ('$value')";
                    $conn->query($sql);
                }
            }
        }

        // ... (закрытие соединения и прочее)
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
                        // ... (остальные датасеты)
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
