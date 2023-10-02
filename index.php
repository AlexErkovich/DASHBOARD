<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/todo.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include('menu.php'); ?>
    <div class="main">

    </div>

    <script>
        // ... (existing JavaScript code)

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
</body>

</html>