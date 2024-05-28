<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración | Alumnos</title>
    <link rel="stylesheet" href="../css/StyleAlumno.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='../actionsPhp/agregarAlumno.js'></script>
</head>
<body>
    <div class="container">
        <h2>Administracion de Alumnos</h2>
        <form id="dataForm" class="input-field" method="POST">
            <div class="campos">
            <input type="text" id="ID" class="inputID" required>
            <label  for="ID" class="lblID">ID</label>
            <br>
            </div>
            <!-- Rut-->
            <div class="campos">
            <input type="text" id="RUT" class="inputRut" required>
            <label for="RUT" class="lblRUT">RUT</label>
            <br>
            </div>
            <!-- Nombre-->
            <input type="text" id="Nombre" class="inputNombre" required>
            <label for="Nombre" class="lblNombre">Nombre</label>
            <br>
            <!-- Apellidos-->
            <input type="text" id="Apellidos" class="inputApellido" required>
            <label for="Apellidos" class="lblApellido">Apellidos</label>
            <br>
            <!-- Edad -->
            <input type="text" id="Edad" class="inputEdad" required>
            <label for="Edad" class="lblEdad">Edad</label>
            <br>
            <!-- Promedio-->
            <input type="text" id="Promedio" class="inputPromedio" required>
            <label for="Promedio" class="lblPromedio">Promedio</label>
            <br>
            <!-- Apoderado-->
            <select id="apoderado" name="apoderado">
                <option value="">Seleccionar Apoderado..</option>
                <?php include '../actionsPhp/Alumnos/cargarApoderado.php';?>
            </select>
            <br>
            <!-- Curso-->
            <select id="curso" name="curso">
                <option value="">Seleccione Curso..</option>
                <?php include '../actionsPhp/Alumnos/cargarCurso.php';?>
            </select>
            <br>
            <!-- Botones -->
            <div class="buttonsCRUD">
                <input type="submit" value="Ingresar" class="btnCRUDD" id="Ingresar">
                <input type="submit" value="Editar" class="btnCRUDD" id="Editar">
                <input type="submit" value="Eliminar" class="btnCRUDD" id="Eliminar">
            </div>
        </form>
    </div>
    <div class="input-field2">
        <input type="text" class="inputBus" required>
        <label class="lblBus">Buscador</label>
        <select name="camposDisponibles">
            <option value="ID">ID</option>
            <option value="Rut">Rut</option>
            <option value="Nombre">Nombre</option>
            <option value="Apellidos">Apellidos</option>
            <option value="Edad">Edad</option>
            <option value="Promedio">Promedio</option>
            <option value="Apoderado">Apoderado</option>
            <option value="Curso">Curso</option>
        </select>
        </div>
    <table id="tabla-alumnos">
        <thead>
            <tr>
                <th>ID</th>
                <th>RUT</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Edad</th>
                <th>Promedio</th>
                <th>Apoderado</th>
                <th>Curso</th>
            </tr>
        </thead>
        <tbody id="tablebody"></tbody>
    </table>
    
    <br>
    <div id="btnPaginacion"></div>
    <div class="btnVolver">
        <a href="../HUB.php" class="btn -btnVolver">Volver</a>
    </div>
    <script>
        var datos=[];
        var paginaActual = 1;
        var filasporPagina = 6;
        // Datos para la tabla
        function obtenerDatos(){
            fetch('../actionsPhp/Alumnos/IdAlumno.php')
            .then(response => response.json())
            .then(data => {
                datos = data;
                mostrarPagina(paginaActual);
                generarBotones();
            })
            .catch(error=>console.error('Error:',error));
        }
        // paginas de la tabla
        function mostrarPagina(pagina, datosParaMostrar = datos){
            var inicio=(pagina -1) * filasporPagina;
            var fin= inicio + filasporPagina;
            var filas = datosParaMostrar.slice(inicio,fin);

            var tbody=document.getElementById('tablebody');
            tbody.innerHTML = '';

            filas.forEach(fila =>{
                var tr= document.createElement('tr');
                tr.innerHTML = `<td>${fila.ID}</td><td>${fila.RUT}</td><td>${fila.Nombre}</td><td>${fila.Apellido}</td><td>${fila.Edad}</td><td>${fila.PromedioGeneral}</td><td>${fila.Apoderado}</td><td>${fila.Curso}</td>`;
                tbody.appendChild(tr);
            });
        }
        // Funcion busqueda
        function filtrarDatos(){
            var campo = document.querySelector('select[name="camposDisponibles"]').value;
            var busqueda = document.querySelector('.inputBus').value.toLowerCase();

            if (busqueda === ''){
                mostrarPagina(paginaActual);
            } else {
                var datosFiltrados = datos.filter(function(fila) {
                    return fila[campo].toLowerCase().includes(busqueda);
                });
                mostrarPagina(1, datosFiltrados);
            }
        }

        // botones paginacion
        function generarBotones(){
            var numeroDePaginas = Math.ceil(datos.length / filasporPagina);
            var contenedor = document.getElementById('btnPaginacion');
            
            for (var i = 1; i <= numeroDePaginas; i++) {
                var boton = document.createElement('button'); // Crear un nuevo botón
                boton.textContent = i;
                boton.addEventListener('click', function(){
                    paginaActual = parseInt(this.textContent);
                    mostrarPagina(paginaActual);
                });
                contenedor.appendChild(boton);
            }
        }

        document.querySelector('.inputBus').addEventListener('input',filtrarDatos);
        obtenerDatos();
    </script>
    <script>
        //script de la tabla para q funcione
        $(document).ready(function(){
            $('#tabla-alumnos tbody').on('click', 'tr', function(){
                var rowData = $(this).children('td').map(function(){
                    return $(this).text();
                }).get();
                
                $('#ID').val(rowData[0]);
                $('#RUT').val(rowData[1]);
                $('#Nombre').val(rowData[2]);
                $('#Apellidos').val(rowData[3]);
                $('#Edad').val(rowData[4]);
                $('#Promedio').val(rowData[5]);
                $('#Apoderado').val(rowData[6]);
                $('#Curso').val(rowData[7]);
            });
        });
    </script>
    <script src="../js/Alumnos/alertaInsAlumno.js"></script>
    <script src="../js/Alumnos/alertaActAlumno.js"></script>
    <script src="../js/Alumnos/alertaDelAlumno.js"></script>
</body>
</html>