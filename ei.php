<!DOCTYPE html>
<html>
<head>
    <title>Оценка настроения</title>
</head>
<body>
    <h1>Оценка настроения</h1>

    <label for="mood-range">Выберите своё настроение:</label>
    <input type="range" id="mood-range" min="1" max="6" step="1" value="3" oninput="updateMoodDescription()">

    <div id="mood-description">
        <img id="mood-image" src="" alt="Emotion Image">
    </div>

    <script>
        const moodImages = {
            1: 'img/bad.jpg',
            2: 'path_to_bad_mood_image.jpg',
            3: 'path_to_average_mood_image.jpg',
            4: 'path_to_average_mood_image.jpg',
            5: 'path_to_good_mood_image.jpg',
            6: 'path_to_excellent_mood_image.jpg'
        };

        function updateMoodDescription() {
            const moodRange = document.getElementById('mood-range');
            const moodImage = document.getElementById('mood-image');

            let moodValue = parseInt(moodRange.value);

            // Update mood description
            let moodText = '';
            switch (moodValue) {
                case 1:
                    moodText = 'Очень плохое настроение';
                    break;
                case 2:
                    moodText = 'Плохое настроение';
                    break;
                case 3:
                case 4:
                    moodText = 'Среднее настроение';
                    break;
                case 5:
                    moodText = 'Хорошее настроение';
                    break;
                case 6:
                    moodText = 'Отличное настроение';
                    break;
                default:
                    moodText = 'Неизвестное настроение';
            }

            moodImage.src = moodImages[moodValue];
            moodImage.alt = `${moodText} Image`;
        }
    </script>
</body>
</html>
