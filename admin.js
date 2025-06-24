document.addEventListener('DOMContentLoaded', function() {
    const tableLinks = document.querySelectorAll('#tables-list a');
    const tableContainer = document.getElementById('table-container');
    const tableTitle = document.getElementById('table-title');
    
    // Обработка выбора таблицы
    tableLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Удаляем активный класс у всех ссылок
            tableLinks.forEach(l => l.classList.remove('active'));
            // Добавляем активный класс текущей ссылке
            this.classList.add('active');
            
            const tableName = this.getAttribute('data-table');
            loadTable(tableName);
        });
    });
    
    // Загрузка таблицы с сервера
    function loadTable(tableName) {
        tableContainer.innerHTML = '<div class="loading">Загрузка данных...</div>';
        
        fetch(`get_table.php?table=${tableName}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Ошибка сети');
            }
            return response.text();
        })
        .then(data => {
            tableContainer.innerHTML = data;
            tableTitle.textContent = getTableDisplayName(tableName);
            
            // Добавляем обработчики для новых элементов
            initTableEvents();
        })
        .catch(error => {
            console.error('Error:', error);
            tableContainer.innerHTML = `<div class="error">Ошибка загрузки: ${error.message}</div>`;
        });
    }
    
    // Инициализация событий для таблицы
    function initTableEvents() {
        // Выделение строки при клике
        tableContainer.addEventListener('click', function(e) {
            const row = e.target.closest('tr');
            if (row && !row.classList.contains('header-row')) {
                document.querySelectorAll('#table-container table tr').forEach(r => {
                    r.classList.remove('selected');
                });
                row.classList.add('selected');
            }
        });
    }
    
    // Преобразование имени таблицы в читаемый формат
    function getTableDisplayName(tableName) {
        const names = {
            'zapici': 'Записи',
            'yskygi': 'Услуги',
            'mastera': 'Мастера',
            'grafft_masterov': 'График мастеров',
            'konkretnic_yskygi': 'Конкретные услуги',
            'kosmetika_produkty': 'Косметика и продукты',
            'polzovateli': 'Пользователи',
            'type_of_service': 'Типы услуг'
        };
        return names[tableName] || tableName;
    }
    
    // Обработка кнопок управления
    document.getElementById('add-btn').addEventListener('click', function() {
        const currentTable = document.querySelector('#tables-list a.active')?.getAttribute('data-table');
        if (currentTable) {
            showEditForm(currentTable, 'add');
        } else {
            alert('Пожалуйста, выберите таблицу');
        }
    });
    
    document.getElementById('edit-btn').addEventListener('click', function() {
        const selectedRow = document.querySelector('#table-container table tr.selected');
        if (!selectedRow) {
            alert('Пожалуйста, выберите запись для редактирования');
            return;
        }
        
        const currentTable = document.querySelector('#tables-list a.active')?.getAttribute('data-table');
        const id = selectedRow.getAttribute('data-id');
        if (currentTable && id) {
            showEditForm(currentTable, 'edit', id);
        }
    });
    
    document.getElementById('delete-btn').addEventListener('click', function() {
        const selectedRow = document.querySelector('#table-container table tr.selected');
        if (!selectedRow) {
            alert('Пожалуйста, выберите запись для удаления');
            return;
        }
        
        if (confirm('Вы уверены, что хотите удалить эту запись?')) {
            const currentTable = document.querySelector('#tables-list a.active')?.getAttribute('data-table');
            const id = selectedRow.getAttribute('data-id');
            if (currentTable && id) {
                deleteRecord(currentTable, id);
            }
        }
    });
    
    function showEditForm(tableName, action, id = null) {
        tableContainer.innerHTML = '<div class="loading">Загрузка формы...</div>';
        
        fetch(`get_form.php?table=${tableName}&action=${action}${id ? '&id=' + id : ''}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Ошибка загрузки формы');
            }
            return response.text();
        })
        .then(data => {
            tableContainer.innerHTML = data;
            tableTitle.textContent = `${action === 'add' ? 'Добавить' : 'Редактировать'} ${getTableDisplayName(tableName)}`;
            
            const form = document.getElementById('edit-form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    saveForm(tableName, action, id);
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            tableContainer.innerHTML = `<div class="error">Ошибка загрузки формы: ${error.message}</div>`;
        });
    }
    
    function saveForm(tableName, action, id) {
        const form = document.getElementById('edit-form');
        const formData = new FormData(form);
        
        if (action === 'edit') {
            formData.append('id', id);
        }
        
        fetch(`save_record.php?table=${tableName}&action=${action}`, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Ошибка сервера');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                loadTable(tableName);
            } else {
                alert(data.message || 'Произошла ошибка');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Ошибка сохранения: ' + error.message);
        });
    }
    
    function deleteRecord(tableName, id) {
        fetch(`delete_record.php?table=${tableName}&id=${id}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Ошибка сервера');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                loadTable(tableName);
            } else {
                alert(data.message || 'Произошла ошибка при удалении');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Ошибка удаления: ' + error.message);
        });
    }
    
    // Инициализация при загрузке
    initTableEvents();
});