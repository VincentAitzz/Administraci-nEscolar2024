<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración | Nivel</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<form id="dataForm" class="input-field" method="POST">
        <h2>Administracion de Niveles de Curso</h2>
        <input type="" name="nombreTabla" id="nombreTabla" value="Nivel" hidden>
            <!-- ID CURSO PARA ACTUALIZAR/ELIMINAR-->
        <input type="text" id="ID" disable>
        <label for="ID" class="lblID">ID (uso de Editar/Eliminar)</label>
        <br>
        <select id="grado" name="grado">
            <option value="">Seleccione Grado...</option>
            <option value="1ero">1ero</option>
            <option value="2do">2do</option>
            <option value="3ero">3ero</option>
            <option value="4to">4to</option>
            <option value="5to">5to</option>
            <option value="6to">6to</option>
            <option value="7mo">7mo</option>
            <option value="8vo">8vo</option>
        </select>
        <br>
        <select id="categoria" name="categoria">
            <option value="">Seleccione Categoria...</option>
            <option value="Básico">Básico</option>
            <option value="Medio">Medio</option>
        </select>
        <div class="buttons">
            <button class="btnCRUDD" value='Ingresar'id="Ingresar">Agregar</button>
            <button class="btnCRUDD" id="btnEditar">Editar</button>
            <button class="btnCRUDD" id="btnEliminar">Eliminar</button>
            <br>
        </div>
</form>
    <br>
    <div class="input-field2">
        <input type="text" class="inputBus" required>
        <label for="inputBuscar" class="lblBuscar">Buscador</label>
        <select name="camposDisponibles">
            <option value="ID">ID</option>
            <option value="Grado">Grado</option>
            <option value="Categoria">Categoria</option>
        </select>
        <br>
            <table id="tabla-nivel">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Grado</th>
                        <th>Categoria</th>
                    </tr>
                </thead>
                <tbody id="tablebody"></tbody>
            </table>
    </div>
    
    <br>
    <div id="btnPaginacion"></div>
    <div class="btnVolver">
        <a href="../HUB.php" class="btn -btnVolver">Volver</a>
    </div>
    <script>
        var datos = [];
        var paginaActual = 1;
        var filasPorPagina = 6;

        function obtenerDatos() {
            fetch('../actionsPhp/ldNivel.php')
            .then(response => response.json())
            .then(data => {
                datos = data;
                mostrarPagina(paginaActual);
                generarBotones();
            })
            .catch(error => console.error('Error:', error));
        }

        function mostrarPagina(pagina, datosParaMostrar = datos) {
            var inicio = (pagina - 1) * filasPorPagina;
            var fin = inicio + filasPorPagina;
            var filas = datosParaMostrar.slice(inicio, fin);

            var tbody = document.getElementById('tablebody');
            tbody.innerHTML = '';

            filas.forEach(fila => {
                var tr = document.createElement('tr');
                tr.innerHTML = `
                <td>${fila.ID}</td>
                <td>${fila.Grado}</td>
                <td>${fila.Categoria}</td>`;
                tbody.appendChild(tr);
            });
        }

        function filtrarDatos() {
            var campo = document.querySelector('select[name="camposDisponibles"]').value;
            var busqueda = document.querySelector('.inputBus').value.toLowerCase();

            if (busqueda === '') {
                mostrarPagina(paginaActual);
            } else {
                var datosFiltrados = datos.filter(fila => fila[campo].toLowerCase().includes(busqueda));
                mostrarPagina(1, datosFiltrados);
            }
        }

        function generarBotones() {
            var numeroDePaginas = Math.ceil(datos.length / filasPorPagina);
            var contenedor = document.getElementById('btnPaginacion');
            contenedor.innerHTML = '';

            for (var i = 1; i <= numeroDePaginas; i++) {
                var boton = document.createElement('button');
                boton.textContent = i;
                boton.addEventListener('click', function() {
                    paginaActual = parseInt(this.textContent);
                    mostrarPagina(paginaActual);
                });

                contenedor.appendChild(boton);
            }
        }

        document.querySelector('.inputBus').addEventListener('input', filtrarDatos);
        obtenerDatos();
    </script>
</body>
</html>