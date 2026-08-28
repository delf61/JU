let currentType = '';
let currentData = [];
let editModeId = null;

const schema = {
    kraje: ['kodkra', 'nazov', 'km2', 'oby', 'arcintcis'],
    okresy: ['kodokr', 'nazov', 'kodkra', 'km2', 'oby', 'arcintcis'],
    mesta: ['kod', 'nazov', 'kodokr', 'tel', 'psc', 'arcintcis'],
    banky: ['kodban', 'skratka', 'popis', 'arcintcis']
};

const pk = {
    kraje: 'kodkra',
    okresy: 'kodokr',
    mesta: 'kod',
    banky: 'kodban'
};

function showError(msg) {
    document.getElementById('error-msg').innerText = msg;
}

export const initDictionary = {
    load: async function(type) {
        currentType = type;
        document.getElementById('dict-title').innerText = type.toUpperCase();
        document.getElementById('add-new-btn').style.display = 'inline-block';
        hideForm();
        showError('');

        try {
            const res = await fetch('/api/dictionary/' + type);
            if (!res.ok) throw new Error('Chyba načítania údajov');
            currentData = await res.json();
            renderTable();
        } catch (e) {
            showError(e.message);
        }
    },
    showForm: function(id = null) {
        editModeId = id;
        const formFields = document.getElementById('form-fields');
        formFields.innerHTML = '';
        const fields = schema[currentType];

        let record = {};
        if (id) {
            record = currentData.find(item => item[pk[currentType]] == id);
        }

        fields.forEach(field => {
            const val = record[field] || '';
            const readonly = (id && field === pk[currentType]) ? 'readonly' : '';
            formFields.innerHTML += `<label>${field}: <input type="text" id="input_${field}" value="${val}" ${readonly}></label><br>`;
        });

        document.getElementById('dict-form').style.display = 'block';
    },
    hideForm: function() {
        document.getElementById('dict-form').style.display = 'none';
        editModeId = null;
    }
};

document.getElementById('dict-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    showError('');
    const fields = schema[currentType];
    const data = {};
    fields.forEach(f => {
        data[f] = document.getElementById('input_' + f).value;
    });

    const isEdit = !!editModeId;
    const url = isEdit ? `/api/dictionary/${currentType}/${editModeId}` : `/api/dictionary/${currentType}`;
    const method = isEdit ? 'PUT' : 'POST';

    try {
        const res = await fetch(url, {
            method: method,
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        });
        const result = await res.json();
        if (result.status === 'success') {
            initDictionary.load(currentType);
        } else {
            let errMsg = 'Chyba ukladania: ';
            for(let key in result.errors) errMsg += result.errors[key] + ' ';
            showError(errMsg);
        }
    } catch (err) {
        showError('Nepodarilo sa spojiť so serverom.');
    }
});

function renderTable() {
    const thead = document.getElementById('data-thead');
    const tbody = document.getElementById('data-tbody');
    document.getElementById('data-table').style.display = 'table';

    if (currentData.length === 0) {
        thead.innerHTML = '';
        tbody.innerHTML = '<tr><td>Zatiaľ žiadne záznamy</td></tr>';
        return;
    }

    const fields = schema[currentType];
    let ths = fields.map(f => `<th>${f}</th>`).join('');
    ths += '<th>Akcie</th>';
    thead.innerHTML = `<tr>${ths}</tr>`;

    let trs = currentData.map(row => {
        let tds = fields.map(f => `<td>${row[f] || ''}</td>`).join('');
        const id = row[pk[currentType]];
        tds += `<td>
                    <button class="action-btn edit-btn" onclick="window.showForm('${id}')">Upraviť</button>
                    <button class="action-btn delete-btn" onclick="deleteRecord('${id}')">Zmazať</button>
                </td>`;
        return `<tr>${tds}</tr>`;
    }).join('');
    tbody.innerHTML = trs;
}

window.deleteRecord = async function(id) {
    if(!confirm('Naozaj zmazať?')) return;
    showError('');
    try {
        const res = await fetch(`/api/dictionary/${currentType}/${id}`, { method: 'DELETE' });
        const result = await res.json();
        if (result.status === 'success') {
            initDictionary.load(currentType);
        } else {
            let errMsg = 'Chyba mazania: ';
            for(let key in result.errors) errMsg += result.errors[key] + ' ';
            showError(errMsg);
        }
    } catch (e) {
        showError('Nepodarilo sa spojiť so serverom.');
    }
}
