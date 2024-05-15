<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apoderado</title>
    <!--<link rel="stylesheet" href="CSS/styleClases.css">-->
</head>
<body>
    <div class="container">
        <h2>Administración de Apoderados</h2>
        <form id="dataForm" class="input-field" method="POST">
            <input type="hidden" name="id" id="id" value="1">
            <input type="text" id="rut" name="rut" class="inputRUT" required>
            <label class="lblRUT">RUT</label>
            <br>
            <input type="text" id="nombre" name="nombre" class="inputNombre" required>
            <label class="lblNombre">Nombre</label>
            <br>
            <input type="text" id="apellidos" name="apellidos" class="inputApellido" required>
            <label class="lblApellido">Apellido</label>
            <br>
            <input type="text" id="contacto" name="contacto" class="inputContacto" required>
            <label class="lblContacto">Contacto</label>
            <br>
            <div class="buttonsCRUD">
                <input type="submit" value="Ingresar" class="btnCRUD" id="Ingresar">
                <input type="submit" value="Editar" class="btnCRUD" id="Editar">
                <input type="submit" value="Editar" class="btnCRUD" id="Editar">
            </div>
        </form>
    </div>
    <div class="input-field2">
        <input type="text" class="inputBus" required>
        <label class="lblBus">Buscador</label>
    </div>
    <table id="tabla-apoderados">
        <thead>
            <tr>
                <th>ID</th>
                <th>RUT</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Contacto</th>
            </tr>
        </thead>
        <tbody id="tableBody"></tbody>
    </table>
    <div id="pagination" class="paginacion"></div>
    <script>
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
        
        function renderPagination(data, itemsPerPage) {
            const totalPages = Math.ceil(data.length / itemsPerPage);
            const pagination = document.getElementById('pagination');
            pagination.innerHTML = '';

            for (let i = 1; i <= totalPages; i++) {
                const button = document.createElement('button');
                button.style.borderRadius = '100%';
                button.style.width= '5vh';
                button.style.height= '5vh';
                button.addEventListener('click', () => {
                    currentPage = i;
                    const start = (currentPage - 1) * itemsPerPage;
                    const end = start + itemsPerPage;
                    renderTable(data, start, end);
                });
                pagination.appendChild(button);
            }
        }

        const itemsPerPage = 10;
        let currentPage = 1;

        fetchData('../actionsPhp/ldApoderado.php', data => {
            renderTable(data, 0, itemsPerPage);
            renderPagination(data, itemsPerPage);
        });
    </script>
    <div class="btnVolver">
        <a href="../HUB.php" class="btn -btnVolver">Volver</a>
    </div>
</body>
<script src="../js/alertaInsApoderado.js"></script>
<script src="../js/alertaAltApoderado.js"></script>
</html>