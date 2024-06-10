<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administración | Alumno</title>
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
            <h2>Administraciones de Alumnos</h2>
            <form id="dataForm" class="input-field" method="POST">
                <input type="hidden" id="nombreTabla" value="Alumno">

                <div class="contenedorCampos">
                    <div class="contenedorSingCampos">
                        <label class="lblID">ID</label>
                        <input type="text" name="id" id="id" disabled class="textFieldDes">
                    </div>
                    <div class="contenedorSingCampos">
                        <label class="lbl">RUT</label>
                        <input type="text" name="rut" id="rut" required class="textField">
                    </div>
                    <div class="contenedorSingCampos">
                    <label class="lbl">Nombre</label>
                        <input type="text" name="nombre" id="nombre" required class="textField">
                    </div>
                    <div class="contenedorSingCampos">
                        <label class="lbl">Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos" required class="textField">
                    </div>
                    <div class="contenedorSingCampos">
                        <label class="lbl">Edad</label>
                        <input type="text" name="edad" id="edad" required class="textField">
                    </div>
                    <div class="contenedorSingCampos">
                        <label class="lbl">Promedio General</label>
                        <input type="text" name="promedio" id="promedio" required class="textField">
                    </div>

                    <div class="contenedorCbox">
                        <select name="apoderado" id="apoderado" class="comboBox">
                            <option value="">Seleccione Grado..</option>
                            <?php include '../actionsPhp/Combobox/CargarApoderado.php'?>
                        </select>
                    </div>
                    <div class="contenedorCbox">
                        <select name="curso" id="curso" class="comboBox">
                            <option value="">Seleccione Grado..</option>
                            <?php include '../actionsPhp/Combobox/CargarCurso.php'?>
                        </select>
                    </div>
                </div>
                <div class="contenedorButton">
                    <input type="button" value="Ingresar" class="btn" id="Ingresar">
                    <input type="button" value="Editar" class="btn" id="Editar">
                    <input type="button" value="Eliminar" class="btn" id="Eliminar">
                    <input type="button" value="Limpiar" class="btn" id="Limpiar">
                </div>
            </form>
        </div>
        <div class="contenedorData">
            <div class="contenedorBuscador">
                <label class="lbl">Buscador</label>
                <input type="text" class="textFieldBuscador" required>
                <select name="camposDisponibles" class="comboBox">
                    <option value="ID">ID</option>
                    <option value="RUT">Rut</option>
                    <option value="Nombre">Nombre</option>
                    <option value="Apellidos">Apellidos</option>
                    <option value="Edad">Edad</option>
                    <option value="PromedioGeneral">PromedioGeneral</option>
                    <option value="Apoderado">Apoderado</option>
                    <option value="Curso">Curso</option>
                </select>
            </div>
            <table id ="tabla-alumno">
                <thead>
                    <tr>
                        <th>•</th>
                        <th>ID</th>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Edad</th>
                        <th>PromedioGeneral</th>
                        <th>Apoderado</th>
                        <th>Curso</th>
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
                fetch('../actionsPhp/load/ldAlumno.php')
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
                    <td>${fila.RUT}</td>
                    <td>${fila.Nombre}</td>
                    <td>${fila.Apellido}</td>
                    <td>${fila.Edad}</td>
                    <td>${fila.PromedioGeneral}</td>
                    <td>${fila.Apoderado}</td>
                    <td>${fila.Curso}</td>`;
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
        </div>
        <button class="btnVolver">Volver</button>
</body>
    <script>
        const btn = document.querySelector('.btnVolver');
        btn.addEventListener('click', function() {
            window.location.href = '../HUB.php';
        });
        $(document).ready(function(){
            $('#tabla-alumno tbody').on('click','tr', function(){
            var rowData = $(this).children('td').map(function(){
            return $(this).text();
        }).get();

        $('#id').val(rowData[1]); // El ID del campo en el formulario es 'id'
        $('#rut').val(rowData[2]); // El ID del campo en el formulario es 'rut'
        $('#nombre').val(rowData[3]); // El ID del campo en el formulario es 'nombre'
        $('#apellidos').val(rowData[4]); // El ID del campo en el formulario es 'apellidos'
        $('#edad').val(rowData[5]); // El ID del campo en el formulario es 'edad'
        $('#promedio').val(rowData[6]); // El ID del campo en el formulario es 'promedio'
        $('#apoderado').val(rowData[7]); // El ID del campo en el formulario es 'apoderado'
        $('#curso').val(rowData[8]); // El ID del campo en el formulario es 'curso'
    });
});
    </script>
    <!-- <span class="loader"></span> -->
    <script src="../js/Update.js"></script>
    <script src="../js/Inserts.js"></script>
    <script src="../js/Delete.js"></script>
    <script src="../js/Limpiar.js"></script>
</html>
