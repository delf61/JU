const app = {
    currentType: null,

    // Mapping of dictionary types to their fields and primary keys
    schema: {
        kraje: {
            pk: 'kodkra',
            fields: [
                { name: 'kodkra', label: 'Kód kraja', type: 'text', required: true },
                { name: 'nazov', label: 'Názov', type: 'text', required: true },
                { name: 'km2', label: 'Rozloha (km2)', type: 'number', required: false },
                { name: 'oby', label: 'Obyvateľstvo', type: 'number', required: false },
                { name: 'arcintcis', label: 'Archívne číslo', type: 'text', required: false }
            ]
        },
        okresy: {
            pk: 'kodokr',
            fields: [
                { name: 'kodokr', label: 'Kód okresu', type: 'text', required: true },
                { name: 'nazov', label: 'Názov', type: 'text', required: true },
                { name: 'kodkra', label: 'Kód kraja', type: 'text', required: true },
                { name: 'km2', label: 'Rozloha (km2)', type: 'number', required: false },
                { name: 'oby', label: 'Obyvateľstvo', type: 'number', required: false },
                { name: 'arcintcis', label: 'Archívne číslo', type: 'text', required: false }
            ]
        },
        mesta: {
            pk: 'kod',
            fields: [
                { name: 'kod', label: 'Kód mesta', type: 'text', required: true },
                { name: 'nazov', label: 'Názov', type: 'text', required: true },
                { name: 'kodokr', label: 'Kód okresu', type: 'text', required: true },
                { name: 'tel', label: 'Telefón', type: 'text', required: false },
                { name: 'psc', label: 'PSČ', type: 'text', required: false },
                { name: 'arcintcis', label: 'Archívne číslo', type: 'text', required: false }
            ]
        },
        banky: {
            pk: 'kodban',
            fields: [
                { name: 'kodban', label: 'Kód banky', type: 'text', required: true },
                { name: 'skratka', label: 'Skratka', type: 'text', required: true },
                { name: 'popis', label: 'Popis', type: 'text', required: false },
                { name: 'arcintcis', label: 'Archívne číslo', type: 'text', required: false }
            ]
        }
    },

    showMessage(id, message, timeout = 3000) {
        const el = document.getElementById(id);
        el.textContent = message;
        el.style.display = 'block';
        if (timeout) {
            setTimeout(() => { el.style.display = 'none'; }, timeout);
        }
    },

    async loadDictionaries(type) {
        this.currentType = type;
        document.getElementById('dictionary-title').textContent = type.charAt(0).toUpperCase() + type.slice(1);
        document.getElementById('btn-add-new').style.display = 'inline-block';
        this.hideForm();

        try {
            const response = await fetch(`/dictionary/api/list/${type}`);
            if (!response.ok) throw new Error('Failed to fetch data');
            const data = await response.json();
            this.renderTable(type, data);
        } catch (error) {
            this.showMessage('error-message', error.message);
        }
    },

    renderTable(type, data) {
        const schema = this.schema[type];
        const table = document.getElementById('data-table');
        const thead = document.getElementById('data-table-head');
        const tbody = document.getElementById('data-table-body');

        thead.innerHTML = '';
        tbody.innerHTML = '';
        table.style.display = 'table';

        // Headers
        const headerRow = document.createElement('tr');
        schema.fields.forEach(field => {
            const th = document.createElement('th');
            th.textContent = field.label;
            headerRow.appendChild(th);
        });
        const thActions = document.createElement('th');
        thActions.textContent = 'Akcie';
        headerRow.appendChild(thActions);
        thead.appendChild(headerRow);

        // Body
        data.forEach(row => {
            const tr = document.createElement('tr');
            schema.fields.forEach(field => {
                const td = document.createElement('td');
                td.textContent = row[field.name] || '';
                tr.appendChild(td);
            });

            const pkValue = row[schema.pk];
            const tdActions = document.createElement('td');
            tdActions.innerHTML = `
                <button class="btn" onclick="app.editDictionary('${type}', '${pkValue}')">Upraviť</button>
                <button class="btn" onclick="app.deleteDictionary('${type}', '${pkValue}')" style="background-color: #f44336; color: white;">Zmazať</button>
            `;
            tr.appendChild(tdActions);
            tbody.appendChild(tr);
        });
    },

    showForm(action = 'create', data = {}) {
        const schema = this.schema[this.currentType];
        document.getElementById('dictionary-form-container').style.display = 'block';
        document.getElementById('form-title').textContent = action === 'create' ? 'Pridať záznam' : 'Upraviť záznam';
        document.getElementById('form-action-type').value = action;
        document.getElementById('form-record-id').value = action === 'edit' ? data[schema.pk] : '';

        const formFields = document.getElementById('form-fields');
        formFields.innerHTML = '';

        schema.fields.forEach(field => {
            const div = document.createElement('div');
            div.className = 'form-group';
            div.innerHTML = `
                <label>${field.label}</label>
                <input type="${field.type}" id="field-${field.name}" name="${field.name}" ${field.required ? 'required' : ''} value="${data[field.name] || ''}" ${action === 'edit' && field.name === schema.pk ? 'readonly' : ''}>
            `;
            formFields.appendChild(div);
        });
    },

    hideForm() {
        document.getElementById('dictionary-form-container').style.display = 'none';
        document.getElementById('dictionary-form').reset();
    },

    async editDictionary(type, id) {
        try {
            const response = await fetch(`/dictionary/api/show/${type}/${id}`);
            if (!response.ok) throw new Error('Failed to fetch record');
            const data = await response.json();
            this.showForm('edit', data);
        } catch (error) {
            this.showMessage('error-message', error.message);
        }
    },

    async deleteDictionary(type, id) {
        if (!confirm('Naozaj chcete zmazať tento záznam?')) return;

        try {
            const response = await fetch(`/dictionary/api/delete/${type}/${id}`, {
                method: 'DELETE'
            });
            const result = await response.json();

            if (!response.ok) throw new Error(result.messages?.error || 'Failed to delete record');

            this.showMessage('success-message', 'Záznam bol zmazaný.');
            this.loadDictionaries(type);
        } catch (error) {
            this.showMessage('error-message', error.message);
        }
    },

    async saveDictionary(event) {
        event.preventDefault();
        const type = this.currentType;
        const schema = this.schema[type];
        const action = document.getElementById('form-action-type').value;
        const id = document.getElementById('form-record-id').value;

        const formData = new FormData(event.target);
        const data = {};

        schema.fields.forEach(field => {
            data[field.name] = formData.get(field.name);
        });

        const url = action === 'create' ? `/dictionary/api/create/${type}` : `/dictionary/api/update/${type}/${id}`;
        const method = action === 'create' ? 'POST' : 'PUT';

        try {
            const response = await fetch(url, {
                method: method,
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();
            if (!response.ok) throw new Error(result.messages?.error || 'Failed to save record');

            this.showMessage('success-message', 'Záznam bol uložený.');
            this.hideForm();
            this.loadDictionaries(type);
        } catch (error) {
            this.showMessage('error-message', error.message);
        }
    }
};

window.app = app;
