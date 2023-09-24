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
                <button onclick="navigationPageMain()" class="button"> Бизнес процессы </button>
                <button id="active" onclick="navigationPageTasks()" class="button"> Задачи </button>
                <button onclick="navigationPageDashboard()" class="button"> Dashboard </button>
            </div>
        </div>

        <form method="post" action="save_to_db.php">
            <div class="form__content">
                <div class="todo__block" id="communicationBlock">
                    <label for="communication">Communication and communication</label>
                    <div class="todo__content__row">
                        <input type="text" id="communication" name="communication[]" size="60">
                    </div>
                    <button class="add-button" type="button" onclick="addNewField('communicationBlock')">Добавить поле</button>
                    <div>
                        <?php echo $communicationMessage; ?>
                    </div>
                </div>

                <div class="todo__block" id="advertisementBlock">
                    <label for="advertisement">Advertisement</label>
                    <div class="todo__content__row">
                        <input type="text" id="advertisement" name="advertisement[]" size="60">
                    </div>
                    <button class="add-button" type="button" onclick="addNewField('advertisementBlock')">Добавить поле</button>
                    <div>
                        <?php echo $advertisementMessage; ?>
                    </div>
                </div>

                <div class="todo__block" id="productionBlock">
                    <label for="production">Production</label>
                    <div class="todo__content__row">
                        <input type="text" id="production" name="production[]" size="60">
                    </div>
                    <button class="add-button" type="button" onclick="addNewField('productionBlock')">Добавить поле</button>
                    <div>
                        <?php echo $productionMessage; ?>
                    </div>
                </div>

                <div class="todo__block" id="financeBlock">
                    <label for="finance">Finance</label>
                    <div class="todo__content__row">
                        <input type="text" id="finance" name="finance[]" size="60">
                    </div>
                    <button class="add-button" type="button" onclick="addNewField('financeBlock')">Добавить поле</button>
                    <div>
                        <?php echo $financeMessage; ?>
                    </div>
                </div>

                <div class="todo__block" id="qualityBlock">
                    <label for="quality">Quality</label>
                    <div class="todo__content__row">
                        <input type="text" id="quality" name="quality[]" size="60">
                    </div>
                    <button class="add-button" type="button" onclick="addNewField('qualityBlock')">Добавить поле</button>
                    <div>
                        <?php echo $qualityMessage; ?>
                    </div>
                </div>
            </div>
            <input id="btn-save" type="submit" value="Выполнить" name="submit">
        </form>

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

        function addNewField(blockId) {
            let block = document.getElementById(blockId);
            let newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = blockId === 'communicationBlock' ? 'communication[]' :
                (blockId === 'advertisementBlock' ? 'advertisement[]' :
                    (blockId === 'productionBlock' ? 'production[]' : 'finance[]'));
            newInput.size = '60';

            // Check if the previous input is empty before adding a new one
            let lastInput = block.querySelector('input[type="text"]');
            if (lastInput && lastInput.value.trim() === '') {
                alert('Please fill the previous input before adding a new one.');
                return; // Stop execution if the previous input is empty
            }

            // Get the label element
            let label = block.querySelector('label');

            // Insert the new input after the label
            insertAfter(newInput, label);
        }
    </script>
</body>

</html>