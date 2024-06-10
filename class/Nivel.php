<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración | Nivel</title>
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
            <h2>Administración de Nivel</h2>
            <form id="dataForm" class="input-field" method="POST">
                <input type="hidden" id="nombreTabla" value="Nivel">

                <div class="contenedorCampos">

                    <div class="contenedorSingCampos">
                        <label class="lblID">ID</label>
                        <input type="text" name="id" id="id" disabled class="textFieldDes">
                    </div>
                    <div class="contenedorCbox">
                        <select name="Grado" id="Grado" class="comboBox">
                            <option value="">Seleccione Grado..</option>
                            <option value="1ero">1ero</option>
                            <option value="2do">2do</option>
                            <option value="3ero">3ero</option>
                            <option value="4to">4to</option>
                            <option value="5to">5to</option>
                            <option value="6to">6to</option>
                            <option value="7mo">7mo</option>
                            <option value="8vo">8vo</option>
                        </select>
                    </div>
                    <div class="contenedorCbox">
                        <select name="Categoria" id="Categoria" class="comboBox">
                            <option value="">Seleccione Categoria..</option>
                            <option value="Basico">Basico</option>
                            <option value="Medio">Medio</option>
                        </select>
                    </div>
                    <div class="contenedorButton">
                        <input type="button" value="Ingresar" class="btn" id="Ingresar">
                        <input type="button" value="Editar" class="btn" id="Editar">
                        <input type="button" value="Eliminar" class="btn" id="Eliminar">
                        <input type="button" value="Limpiar" class="btn" id="Limpiar">
                    </div>
                </div>
            </form>
        </div>
        <div class="contenedorData">
            <div class="contenedorBuscador">
                <label class="lbl">Buscador</label>
                <input type="text" required class="textFieldBuscador">
                <select name="camposDisponibles" class="comboBox">
                    <option value="ID">ID</option>
                    <option value="Grado">Grado</option>
                    <option value="Categoria">Categoria</option>
                </select>
            </div>
            <table id="tabla-nivel">
                <thead>
                    <tr>
                        <th>•</th>
                        <th>ID</th>
                        <th>Grado</th>
                        <th>Categoria</th>
                    </tr>
                </thead>
                <tbody id="tbody"></tbody>
            </table>
            <div id="btnPaginacion"></div>
            <script>
                var datos= [];
                var paginaActual = 1;
                var filasPorPagina = 6;

                function obtenerDatos(){
                    fetch('../actionsPhp/load/ldNivel.php')
                    .then(response => response.json())
                    .then(data => {
                        datos = data;
                        mostrarPagina(paginaActual);
                        generarBotones();
                    })
                    .catch(error => console.error('Error: ', error));
                }
                function mostrarPagina(paginaActual, datosParaMostrar = datos) {
                    var inicio = (paginaActual - 1) * filasPorPagina;
                    var fin = inicio + filasPorPagina;
                    var filas = datosParaMostrar.slice(inicio, fin);

                    var tbody= document.getElementById('tbody');
                    tbody.innerHTML = '';

                    filas.forEach(fila => {
                        var tr= document.createElement('tr');
                        tr.innerHTML = `
                        <td>»</td>
                        <td>${fila.ID}</td>
                        <td>${fila.Grado}</td>
                        <td>${fila.Categoria}</td>`;
                        tbody.appendChild(tr);
                    });
                }

                function filtrarDatos(){
                    var campo = document.querySelector('select[name="camposDisponibles"]').value;
                    var busqueda = document.querySelector('.textFieldBuscador').value.toLowerCase();

                    if (busqueda === '') {
                        mostrarPagina(paginaActual);
                    } else {
                        var datosFiltrados = datos.filter(fila => fila[campo].toLowerCase().includes(busqueda));
                        mostrarPagina(1, datosFiltrados);
                    }
                }
                
                function generarBotones(){
                    var numeroDePaginas = Math.ceil(datos.length / filasPorPagina);
                    var contenedor = document.getElementById('btnPaginacion');
                    contenedor.innerHTML = '';

                    for(var i = 1; i <= numeroDePaginas; i++){
                        var boton = document.createElement('button');
                        boton.textContent = i;
                        boton.addEventListener('click', function(){
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
        $('#tabla-nivel tbody').on('click','tr', function(){
            var rowData = $(this).children('td').map(function(){
                return $(this).text();
            }).get();

            $('#id').val(rowData[1]);
            $('#Grado').val(rowData[2]);
            $('#Categoria').val(rowData[3]);
        });
    });
</script>
<!-- <span class="loader"></span> -->
<script src="../js/Update.js"></script>
<script src="../js/Inserts.js"></script>
<script src="../js/Delete.js"></script>
<script src="../js/Limpiar.js"></script>

</html>
