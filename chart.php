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
            <h1><?php echo $todoTitle; ?></h1> <!-- Вывод заголовка -->
            <div class="title-page__section">
                <button onclick="navigationPageConnect()" class="button"> Бизнес процессы </button>
                <button id="active" onclick="navigationPageTasks()" class="button"> Задачи </button>
                <button onclick="navigationPageDashboard()" class="button"> Dashboard </button>
            </div>
        </div>
    </div>
    <canvas id="chart"></canvas>

    <script>
        async function fetchData() {
            const response = await fetch('get_data.php');
            const data = await response.json();

            console.log(data); // Проверим, что данные получены правильно

            // Изменим формат даты на что-то более общее (год-месяц-день)
            const dates = data.map(item => item.date.split(' ')[0]);
            const counts = data.map(item => item.count);

            console.log(dates); // Проверим формат дат

            const ctx = document.getElementById('chart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: dates,
                    datasets: [{
                        label: 'Количество записей',
                        data: counts,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
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
                            stepSize: 1,  // Задаем шаг оси Y
                            title: {
                                display: true,
                                text: 'Количество записей'
                            }
                        }
                    }
                }
            });
        }

        fetchData();
    </script>
</body>

</html>
