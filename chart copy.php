<?php include('template.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css"> <!-- Подключение общих CSS-стилей -->
    <title><?php echo $headerTitle; ?></title> <!-- Установка заголовка страницы -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   
</head>

<body>

    <?php include('menu.php'); ?> <!-- Подключение файла с меню -->
    <div class="main">
    <div class="title-page">
            <!-- Исправление: Добавлен вывод переменной $headerTitleConnect -->
            <h1><?php echo $headerTitleConnect; ?></h1>
            <div class="title-page__section">
                <button  onclick="navigationPageMain()" class="button">Бизнес процессы</button>
                <button onclick="navigationPageTasks()" class="button">Задачи</button>
                <button  id="active" onclick="navigationPageDashboard()" class="button">Dashboard</button>
            </div>
            
        </div>
        <div class="title-page__section">
                <button onclick="fetchData('communication')" class="button"> По отделам </button>
                <button onclick="fetchData('advertisement')" class="button"> Все вместе </button>
            </div>
        <div class="main-chart">

            <?php
            $tables = array("advertisement", "communication", "finance", "quality", "production");

            foreach ($tables as $table) {
                echo "
            
                    <div class='chart-container'>
                       <canvas id='chart-{$table}'></canvas>
                   
                </div>";
            }
            ?>
        </div>
    </div>

    <script>
        async function fetchData(tableName) {
            const response = await fetch(`get_data.php?table=${tableName}`);
            const data = await response.json();

            const dates = data.map(item => item.date.split(' ')[0]);
            const counts = data.map(item => item.count);

            const ctx = document.getElementById(`chart-${tableName}`).getContext('2d');
            const chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: dates,
                    datasets: [{
                        label: `Выполненых задач в ${tableName}`,
                        data: counts,
                        backgroundColor: 'rgba(148, 197, 255, 1)',
                        borderColor: 'rgba(3, 100, 203, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Дата'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            stepSize: 1,
                            title: {
                                display: true,
                                text: 'Количество записей'
                            }
                        }
                    }
                }
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            fetchData('advertisement');
            fetchData('communication');
            fetchData('finance');
            fetchData('quality');
            fetchData('production');
        });
    </script>

</body>

</html>