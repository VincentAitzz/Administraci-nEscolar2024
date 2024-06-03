<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apoderado</title>
    <!--<link rel="stylesheet" href="CSS/styleClases.css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Administración de Apoderados</h2>
        <form class="input-field" action="InsertApoderado.php" method="POST">
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
                <input type="submit" value="Ingresar" class="btnCRUD">
                <button class="btnCRUD" type="button">Editar</button>
                <button class="btnCRUD" type="button">Eliminar</button>
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
/*
        function changeButtonColor(button) {
            var buttons = document.querySelectorAll('#pagination button');
            buttons.forEach(function(btn) {
                btn.style.backgroundColor = '#17b2d1'; // Restablece el color de los botones no seleccionados
            });
            button.style.backgroundColor = '#49D3F0'; // Cambia el color del botón seleccionado
        }*/

        function renderPagination(data, itemsPerPage) {
            const totalPages = Math.ceil(data.length / itemsPerPage);
            const pagination = document.getElementById('pagination');
            pagination.innerHTML = '';

            for (let i = 1; i <= totalPages; i++) {
                const button = document.createElement('button');
                /*button.style.backgroundColor = '#49D3F0';
                button.style.color = '#364042';*/
                button.style.borderRadius = '100%';
                button.style.width= '5vh';
                button.style.height= '5vh';/*
                button.style.border = '1px solid black';*/
                button.addEventListener('click', () => {
                    currentPage = i;
                    const start = (currentPage - 1) * itemsPerPage;
                    const end = start + itemsPerPage;
                    renderTable(data, start, end);
                    //changeButtonColor(button);
                });
                pagination.appendChild(button);
            }
        }

        const itemsPerPage = 10;
        let currentPage = 1;

        fetchData('../actionsPhp/load/ldApoderado.php', data => {
            renderTable(data, 0, itemsPerPage);
            renderPagination(data, itemsPerPage);
        });
    </script>
    <div class="btnVolver">
        <a href="../HUB.php" class="btn -btnVolver">Volver</a>
    </div>
    <script src= "../js/update.js"></script>
    <script src="../js/Inserts.js"></script>
    <script src="../js/Delete.js"></script>
    <script src="../js/limpiar.js"></script>
</body>
</html>