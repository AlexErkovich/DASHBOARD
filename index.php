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
        <div class="title-page">
            <h1>Связь и коммуникация</h1>
            <div class="section__main">
                <button onclick="navigationPageDashboard()" class="button"> Бизнес процессы </button>
                <button onclick="navigationPageTasks()" class="button"> Задачи </button>
                <button onclick="navigationPageDashboard()" class="button"> Dashboard </button>
            </div>
        </div>

        <form method="post" action="save_to_db.php">
            <div class="todo__block" id="communicationBlock">
                <label for="communication">Communication and communication</label>
                <div class="todo__content__row">
                    <input type="text" id="communication" name="communication[]" size="60">
                </div>
                <button type="button" onclick="addNewField('communicationBlock')">Добавить поле</button>
                <div>
                    <?php echo $communicationMessage; ?>
                </div>
            </div>
            <div class="todo__block" id="advertisementBlock">
                <label for="advertisement">Advertisement</label>
                <button type="button" onclick="addNewField('advertisementBlock')">Добавить поле</button>
                <div class="todo__content__row">
                    <input type="text" id="advertisement" name="advertisement[]" size="60">
                </div>
                <div>
                    <?php echo $advertisementMessage; ?>
                </div>
            </div>
            <input id="btn-save" type="submit" value="Выполнить" name="submit">
        </form>
    </div>

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

        function addNewField(blockId) {
            let block = document.getElementById(blockId);
            let newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = blockId === 'communicationBlock' ? 'communication[]' : 'advertisement[]';
            newInput.size = '60';

            // Get the label element
            let label = block.querySelector('label');

            // Insert the new input after the label
            insertAfter(newInput, label);
        }

        // Function to insert an element after another
        function insertAfter(newNode, referenceNode) {
            referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
        }
    </script>
</body>

</html>
