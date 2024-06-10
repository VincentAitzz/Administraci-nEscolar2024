<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apoderado</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/loader.css">
    <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="../css/Class.css">
    <link rel="stylesheet" href="../css/textFields.css">
    <link rel="stylesheet" href="../css/comboBox.css">
    <link rel="stylesheet" href="../css/buttons.css">
</head>
<body>
    <div class="contenedorMaster">
        <div class="contenedorForm">
            <h2>Administración de Apoderados</h2>
            <form id="dataForm" method="POST">
                <input type="" name="nombreTabla" id="nombreTabla" value="Apoderado" hidden>
                <div class="contenedorSingCampos">
                    <label class="lblID">ID</label>
                    <input type="text" name="id" id="id" disabled class="textFieldDes">
                </div>
                <div class="contenedorSingCampos">
                    <label class="lbl">RUT</label>
                    <input type="text" id="rut" name="rut" class="textField" required>
                </div>
                <div class="contenedorSingCampos">
                    <label class="lbl">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="textField" required>
                </div>
                <div class="contenedorSingCampos">
                    <label class="lbl">Apellido</label>
                    <input type="text" id="apellidos" name="apellidos" class="textField" required>
                </div>
                <div class="contenedorSingCampos">
                    <label class="lbl">Contacto</label>
                    <input type="text" id="contacto" name="contacto" class="textField" required>
                </div>
                <div class="contenedorButton">
                    <input type="submit" value="Ingresar" class="btn" id="Ingresar">
                    <input type="submit" value="Editar" class="btn" id="Editar">
                    <input type="submit" value="Eliminar" class="btn" id="Eliminar">
                    <input type="button" value="Limpiar" class="btn" id="Limpiar" onclick="limpiarCampos()">
                </div>
            </form>
        </div>
        <div class="contenedorData">
            <div class="contenedorBuscador">
                <label class="lbl">Buscador</label>
                <input type="text" class="textFieldBuscador" required>
                <select name="camposDisponibles" class="comboBox">
                    <option value="ID">ID</option>
                    <option value="RUT">RUT</option>
                    <option value="Nombre">Nombre</option>
                    <option value="Apellidos">Apellidos</option>
                </select>
            </div>
            <table id="tabla-apoderados">
                <thead>
                    <tr>
                        <th>•</th>
                        <th>ID</th>
                        <th>RUT</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Contacto</th>
                    </tr>
                </thead>
                <tbody id="tableBody"></tbody>
            </table>
            <div id="btnPaginacion"></div>
            <script>
                var datos = [];
                var paginaActual = 1;
                var filasPorPagina = 6;

                function obtenerDatos() {
                    fetch('../actionsPhp/load/ldApoderado.php')
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

                    var tbody = document.getElementById('tableBody');
                    tbody.innerHTML = '';

                    filas.forEach(fila => {
                        var tr = document.createElement('tr');
                        tr.innerHTML = `
                        <td>»</td>
                        <td>${fila.ID}</td>
                        <td>${fila.RUT}</td>
                        <td>${fila.Nombre}</td>
                        <td>${fila.Apellidos}</td>
                        <td>${fila.Contacto}</td>`;
                        tbody.appendChild(tr);
                    });
                }

                function filtrarDatos() {
                    var campo = document.querySelector('select[name="camposDisponibles"]').value;
                    var busqueda = document.querySelector('.textFieldBuscador').value.toLowerCase();

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

                document.querySelector('.textFieldBuscador').addEventListener('input', filtrarDatos);
                obtenerDatos();
            </script>
        </div>
        <button class="btnVolver">Volver</button>
    </div>
</body>
<script>
    const btn = document.querySelector('.btnVolver');
    btn.addEventListener('click', function() {
        window.location.href = '../HUB.php';
    });
    $(document).ready(function(){
        $('#tabla-apoderados tbody').on('click', 'tr', function(){
            var rowData = $(this).children('td').map(function(){
                return $(this).text();
            }).get();
                
            $('#id').val(rowData[1]);
            $('#rut').val(rowData[2]);
            $('#nombre').val(rowData[3]);
            $('#apellidos').val(rowData[4]);
            $('#contacto').val(rowData[5]);
        });
    });
</script>
<script src="../js/Inserts.js"></script>
<script src="../js/Delete.js"></script>
<script src="../js/Update.js"></script>
<script src="../js/Limpiar.js"></script>
</html>