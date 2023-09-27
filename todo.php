<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/todo.css">
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo $headerTitle; ?></title>
</head>

<body>
    <?php include('menu.php'); ?>
    <div class="main">
        <div class="title-page">
        <h1><?php echo $headerTitle; ?></h1>
            <div class="section__main">
                <button  onclick="navigationPageConnect()" class="button"> Бизнес процессы </button>
                <button id="active" onclick="navigationPageTasks()" class="button"> Задачи </button>
                <button onclick="navigationPageDashboard()" class="button"> Dashboard </button>
            </div>
        </div>

        <form method="post" action="save_to_db.php">
            <div class="form__content">
                <div class="todo__block" id="communicationBlock">
                    <label for="communication">Communication and communication</label>
                    <div class="todo__content__row">
                        
                    </div>
                    <button class="add-button" type="button" onclick="addNewField('communicationBlock')">Создать задачу</button>
                    <div>
                        <?php echo $communicationMessage; ?>
                    </div>
                </div>

                <div class="todo__block" id="advertisementBlock">
                    <label for="advertisement">Advertisement</label>
                    <div class="todo__content__row">
                        
                    </div>
                    <button class="add-button" type="button" onclick="addNewField('advertisementBlock')">Создать задачу</button>
                    <div>
                        <?php echo $advertisementMessage; ?>
                    </div>
                </div>

                <div class="todo__block" id="productionBlock">
                    <label for="production">Production</label>
                    <div class="todo__content__row">
                        
                    </div>
                    <button class="add-button" type="button" onclick="addNewField('productionBlock')">Создать задачу</button>
                    <div>
                        <?php echo $productionMessage; ?>
                    </div>
                </div>

                <div class="todo__block" id="financeBlock">
                    <label for="finance">Finance</label>
                    <div class="todo__content__row">
                        
                    </div>
                    <button class="add-button" type="button" onclick="addNewField('financeBlock')">Создать задачу</button>
                    <div>
                        <?php echo $financeMessage; ?>
                    </div>
                </div>

                <div class="todo__block" id="qualityBlock">
                    <label for="quality">Quality</label>
                    <div class="todo__content__row">
                        
                    </div>
                    <button class="add-button" type="button" onclick="addNewField('qualityBlock')">Создать задачу</button>
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

        function navigationPageConnect() {
            window.location.href = 'connect.php';
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