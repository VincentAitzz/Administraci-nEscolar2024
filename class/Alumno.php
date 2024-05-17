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
        <h2>Administracion De alumnos</h2>
    
        <form id="dataForm" class="input-field" method="POST">
            <!-- Rut-->
            <input type="text" id="rutAlumno" class="inputRut" required>
            <label for="rutAlumno" class="lblRut">RUT</label>
            <br>
            <!-- Nombre-->
            <input type="text" id="nombre" name="nombre" class="inputNombre" required>
            <label for="nombre" class="lblNombre">Nombre</label>
            <br>
            <!-- Apellido-->
            <input type="text" id="apellidos" name="Apellidos" class="inputApellidoAlumno" required>
            <label for="apellidos" class="lblApellido">Apellidos</label>
            <br>
            <!-- Edad-->
            <input type="text" id="edad" name="Edad" class="inputEdadAlumno" required>
            <label for="edad" class="lblEdadAlumnos">Edad</label>
            <br>
            <!-- Promedio-->
            <input type="text" id="promedio" name="Promedio" class="inputPromedioAlumno" required>
            <label for="promedio" class="lblPromedioAlumnos">Promedio</label>
            <br>
            <!-- Apoderado-->
            <select id="apoderado" name="apoderado">
                <option value="">Seleccionar Apoderado...</option>
                <?php include '../actionsPhp/cargarApoderado.php'; ?>
            </select>
            <br>
            <!-- Curso-->
            <select id="cursoAlumnos" name="cursoAlumnos">
                <option value="">Seleccione Curso...</option>
                <?php include '../actionsPhp/cargarCurso.php';?>
                <!-- Más cursos según necesario -->
            </select>
            <br>
            <div class="buttonsCRUD">
                <input type="submit" value="Ingresar" class="btnCRUD" id="Ingresar">
                <input type="submit" value="Editar" class="btnCRUD" id="Editar">
                <input type="submit" value="Eliminar" class="btnCRUD" id="Eliminar">
            </div>
        </form>
            
        
        <div class="input-field2">
        <input type="text" class="inputBus" required>
        <label class="lblBus">Buscador</label>
        <select name="camposDisponibles">
            <option value="ID">ID</option>
            <option value="RUT">RUT</option>
            <option value="Nombre">Nombre</option>
            <option value="Apellidos">Apellidos</option>
        </select>
        </div>
        </div>  
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
    <div id="btnPaginacion"></div>
    
    <div class="btnVolver">
        <a href="../HUB.php" class="btn -btnVolver">Volver</a>
    </div>
    
    <script>
        var datos = [];
        var paginaActual = 1;
        var filasPorPagina = 6;
        
        function obtenerDatos() {
            fetch('../actionsPhp/IdAlumno.php')
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
                tr.innerHTML = `<td>${fila.ID}</td><td>${fila.RUT}</td><td>${fila.Nombre}</td><td>${fila.Apellidos}</td><td>${fila.Edad}</td><td>${fila.Promedio}</td><td>${fila.Alumno}</td><td>${fila.Curso}</td>`;
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
    
    <script>
        $(document).ready(function(){
            $('#tabla-alumnos tbody').on('click', 'tr', function(){
                var rowData = $(this).children('td').map(function(){
                    return $(this).text();
                }).get();
                
                $('#id').val(rowData[0]);
                $('#rut').val(rowData[1]);
                $('#nombre').val(rowData[2]);
                $('#apellidos').val(rowData[3]);
                $('#Edad').val(rowData[4]);
                $('#Promedio').val(rowData[5]);
                $('#Apoderado').val(rowData[6]);
                $('#Curso').val(rowData[7]);
            });
        });
    </script>
    
    <script src="../js/alertaInsAlumno.js"></script>
    <script src="../js/alertaAltAlumno.js"></script>
    <script src="../js/alertaDelAlumno.js"></script>
</body>
</html>
