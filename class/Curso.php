<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración | Curso</title>
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
            <h2>Administración de Curso</h2>
            <form id="dataForm" class="input-field" method="POST">
                <input type="hidden" id="nombreTabla" value="Curso">
                <!--ID,NIVEL,LETRA,NUMERO ALUMNOS-->

                <div class="contenedorSingCampos">
                    <label class="lbl">ID</label>
                    <input type="text" name="id" id="id" class="textField" disabled>
                </div>
                <div class="contenedorCbox">
                    <select name="nivel" id="nivel" class="comboBox">
                        <option value="">Seleccione nivel..</option>
                        <?php include '../actionsPhp/Combobox/CargarNivel.php'?>
                    </select>
                </div>
                <div class="contenedorCbox">
                    <select name="letra" id="letra" class="comboBox">
                        <option value="">Seleccione letra</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        <option value="G">G</option>
                    </select>
                </div>
                <div class="contenedorSingCampos">
                    <label class="lbl">Numero de Alumnos</label>
                    <input type="text" name="NumeroAlumnos" class="textField" required>
                </div>
                <div class="contenedorButton">
                    <input type="button" value="Ingresar" class="btn" id="Ingresar">
                    <input type="button" value="Editar" class="btn" id="Editar">
                    <input type="button" value="Eliminar" class="btn" id="Eliminar">
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
                    <option value="Nivel">Nivel</option>
                    <option value="Letra">Letra</option>
                    <option value="NumeroAlumnos">NumeroAlumnos</option>
                </select>
            </div>
            <table id="tabla-curso">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nivel</th>
                        <th>Letra</th>
                        <th>NumeroAlumnos</th>
                    </tr>
                </thead>
                <tbody id="tableBody"></tbody>
            </table>
            <div id="btnPaginacion"></div>
            <script>
                var datos= [];
                var paginaActual = 1;
                var filasPorPagina = 6;

                function obtenerDatos(){
                    fetch('../actionsPhp/load/ldCurso.php')
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

                    var tbody= document.getElementById('tableBody');
                    tbody.innerHTML = '';

                    filas.forEach(fila => {
                        var tr= document.createElement('tr');
                        tr.innerHTML = `
                        <td>${fila.ID}</td>
                        <td>${fila.Nivel}</td>
                        <td>${fila.Letra}</td>
                        <td>${fila.NumeroAlumnos}</td>`;
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
        $('#tabla-curso tbody').on('click','tr', function(){
            var rowData = $(this).children('td').map(function(){
                return $(this).text();
            }).get();

            $('#id').val(rowData[0]);
            $('#nivel').val(rowData[1]);
            $('#letra').val(rowData[2]);
            $('#NumeroAlumnos').val(rowData[3]);
        });
    });
</script>
<!-- <span class="loader"></span> -->
<script src= "../js/update.js"></script>
<script src="../js/Inserts.js"></script>
<script src="../js/Delete.js"></script>
<script src="../js/limpiar.js"></script>

</html>
