function fetchData(url, callback) {
    fetch(url)
        .then(response => response.json())
        .then(data => callback(data))
        .catch(error => console.error('Error fetching data:', error));
}

function renderTable(data, start, end) {
    const tableBody = document.getElementById('tableBody');
    tableBody.innerHTML = '';

    for (let i = start; i < end; i++) {
        const item = data[i];
        if (item) {
            const row = `<tr><td>${item.ID}</td><td>${item.RUT}</td><td>${item.Nombre}</td><td>${item.Apellidos}</td><td>${item.Contacto}</td></tr>`;
            tableBody.innerHTML += row;
        }
    }
}

function changeButtonColor(button) {
    var buttons = document.querySelectorAll('#pagination button');
    buttons.forEach(function(btn) {
        btn.style.backgroundColor = '#17b2d1'; // Restablece el color de los botones no seleccionados
    });
    button.style.backgroundColor = '#49D3F0'; // Cambia el color del botón seleccionado
}

function renderPagination(data, itemsPerPage) {
    const totalPages = Math.ceil(data.length / itemsPerPage);
    const pagination = document.getElementById('pagination');
    pagination.innerHTML = '';

    for (let i = 1; i <= totalPages; i++) {
        const button = document.createElement('button');
        button.style.backgroundColor = '#49D3F0';
        button.style.color = '#364042';
        button.style.borderRadius = '100%';
        button.style.width= '5vh';
        button.style.height= '5vh';
        button.style.border = '1px solid black';
        button.addEventListener('click', () => {
            currentPage = i;
            const start = (currentPage - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            renderTable(data, start, end);
            changeButtonColor(button);
        });
        pagination.appendChild(button);
    }
}

const itemsPerPage = 10;
let currentPage = 1;

fetchData('actionsPhp/ldApoderado.php', data => {
    renderTable(data, 0, itemsPerPage);
    renderPagination(data, itemsPerPage);
});