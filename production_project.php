<?php include('template.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/progress.js"></script>
</head>

<body>
    <?php include('menu.php'); ?>
    <div class="main">
        <div class="project_block">
            <h1>Прогресс бар с чекбоксами</h1>

            <div id="progress-bar">
                <div class="progress-fill"></div>
                <div id="progress" class="progress">0%</div>
            </div>

            <div class="project_block_checkbox" id="checkbox-container">
                <!-- Здесь будут добавлены чекбоксы -->
            </div>

            <button onclick="createCheckbox()">Добавить чекбокс</button>
        </div>


        <script>
            function navigateTo(link) {
                window.open(link, '_blank');
            }

            // ... (existing JavaScript code)

            function navigationPageEmail() {
                window.location.href = 'index.php';
            }

            function navigationPageTasks() {
                window.location.href = 'todo.php';
            }

            function navigationPageDashboard() {
                window.location.href = 'graf.php';
            }
        </script>
</body>

</html>