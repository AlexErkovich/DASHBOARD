
  const checkboxData = JSON.parse(localStorage.getItem('checkboxData')) || []; // Загружаем данные из Local Storage или создаем пустой массив

  function updateProgressBar() {
    const progressBar = document.getElementById('progress-bar');
    const progress = document.getElementById('progress');
    const progressFill = document.querySelector('#progress-bar .progress-fill');

    const completedCheckboxes = checkboxData.filter(item => item.checked).length;
    const totalCheckboxes = checkboxData.length;

    const percentage = (completedCheckboxes / totalCheckboxes) * 100;
    progressFill.style.width = percentage + '%';
    progress.textContent = Math.round(percentage) + '%';

    // Сохраняем данные в Local Storage
    localStorage.setItem('checkboxData', JSON.stringify(checkboxData));
  }

  function createCheckbox() {
    const checkboxContainer = document.getElementById('checkbox-container');
    const checkbox = document.createElement('input');
    checkbox.type = 'checkbox';
    checkbox.addEventListener('change', () => {
      updateCheckboxData();
      updateProgressBar();
    });

    const input = document.createElement('input');
    input.type = 'text';
    input.placeholder = 'Введите текст';
    input.addEventListener('input', () => {
      updateCheckboxData();
    });

    const deleteButton = document.createElement('button');
    deleteButton.textContent = 'Удалить';
    deleteButton.addEventListener('click', () => {
      deleteCheckbox(checkbox, input, deleteButton);
      updateCheckboxData();
      updateProgressBar();
    });

    const checkboxDiv = document.createElement('div');
    checkboxDiv.appendChild(checkbox);
    checkboxDiv.appendChild(input);
    checkboxDiv.appendChild(deleteButton);

    checkboxContainer.appendChild(checkboxDiv);

    // Добавляем информацию о новом чекбоксе в массив
    checkboxData.push({
      checkbox,
      input,
      deleteButton,
      checked: false
    });

    updateProgressBar();
  }

  function deleteCheckbox(checkbox, input, deleteButton) {
    const checkboxIndex = checkboxData.findIndex(item => item.checkbox === checkbox);
    if (checkboxIndex !== -1) {
      checkboxData.splice(checkboxIndex, 1);
    }
    checkbox.parentElement.removeChild(checkbox);
    input.parentElement.removeChild(input);
    deleteButton.parentElement.removeChild(deleteButton);
    updateCheckboxData();
    updateProgressBar();
  }

  function updateCheckboxData() {
    checkboxData.forEach(item => {
      item.checked = item.checkbox.checked;
      item.text = item.input.value;
    });
    // Сохраняем данные в Local Storage
    localStorage.setItem('checkboxData', JSON.stringify(checkboxData));
  }

  // Загружаем данные при загрузке страницы

  function loadSavedData() {
    const savedData = JSON.parse(localStorage.getItem('checkboxData'));
    if (savedData) {
      checkboxData.length = 0;
      savedData.forEach(item => {
        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.checked = item.checked;
        checkbox.addEventListener('change', () => {
          updateCheckboxData();
          updateProgressBar();
        });

        const input = document.createElement('input');
        input.type = 'text';
        input.placeholder = 'Введите текст';
        input.value = item.text || '';
        input.addEventListener('input', () => {
          updateCheckboxData();
        });

        const deleteButton = document.createElement('button');
        deleteButton.textContent = 'Удалить';
        deleteButton.addEventListener('click', () => {
          deleteCheckbox(checkbox, input, deleteButton);
          updateCheckboxData();
          updateProgressBar();
        });

        const checkboxDiv = document.createElement('div');
        checkboxDiv.appendChild(checkbox);
        checkboxDiv.appendChild(input);
        checkboxDiv.appendChild(deleteButton);

        const checkboxContainer = document.getElementById('checkbox-container');
        checkboxContainer.appendChild(checkboxDiv);

        checkboxData.push({
          checkbox,
          input,
          deleteButton,
          checked: item.checked,
          text: item.text
        });
      });

      updateProgressBar();
    }
  }

  loadSavedData(); // Вызываем функцию загрузки данных при загрузке страницы



