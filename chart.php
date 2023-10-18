<?php include('template.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css"> <!-- Подключение общих CSS-стилей -->
    <title><?php echo $headerTitle; ?></title> <!-- Установка заголовка страницы -->
    <title>График данных из таблицы production</title>
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
                <button id="active" onclick="navigationPageDashboard()" class="button">Dashboard</button>
            </div>
        </div>
        <div class="title-page">
            <div class="title-page__section">
                <button onclick="fetchData('communication')" class="button"> Communication </button>
                <button onclick="fetchData('advertisement')" class="button"> Advertisement </button>
                <button onclick="fetchData('production')" class="button"> Production </button>
                <button onclick="fetchData('finance')" class="button"> Finance </button>
                <button onclick="fetchData('quality')" class="button"> Quality </button>
            </div>
        </div>
    </div>
    <canvas id="chart"></canvas>

    <script>
    async function fetchData(tableName) {
        const response = await fetch(`get_data.php?table=${tableName}`);
        const data = await response.json();

        // Изменим формат даты на что-то более общее (год-месяц-день)
        const dates = data.map(item => item.date.split(' ')[0]);
        const counts = data.map(item => item.count);

        const ctx = document.getElementById('chart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Количество выполненных задач',
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
        fetchData('advertisement'); // По умолчанию загружаем данные для communication
       
    });
    document.addEventListener('DOMContentLoaded', () => {
        fetchData('production'); 
       
    });
</script>

</body>

</html>
