
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración | Alumno</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

    <div class="container">
        <h2>Administración de Alumno</h2>
        <form id ="dataForm" class="input-field" method="POST">
            <input type="" name="nombreTABLA" ID = "nombreTABLA" value="Alumno" hidden>

            <input type="" name="id" id="id" disabled>
            <label class="lblID">ID</label>
            <br>
            <input type="text" id="rut" name="rut" class="inputRut" required>
            <label class="lblRut">Rut</label>
            <br>
            <input type="text" id="nombre" name="nombre" class="inputNombre" required>
            <label class="lblNombre">Nombre</label>
            <br>
            <input type="text" id="apellidos" name="apellidos" class="inputApellidos" required>
            <label class="lblApellidos">Apellidos</label>
            <br>
            <input type="text" id="edad" name="edad" class="inputEdad" required>
            <label class="lblEdad">Edad</label>
            <br>
            <input type="text" id="promediogeneral" name="promediogeneral" class="inputPromedioG" required>
            <label class="lblPromedioG">Promedio General</label>
            <br>
            <select name="apoderado" id="apoderado">
                <option>Seleccione Apoderado..</option>
                <?php include '../actionsPhp/Combobox/CBapoderadoAlumno.php'?>
            </select>
            <select name="curso" id="curso">
                <option>Seleccione Curso..</option>
                <?php include '../actionsPhp/Combobox/CBCursoAlumno.php' ?>
            </select>
            <br>
            <div class="buttonsCRUD">
            <input type="submit" value="Ingresar" class="btnCRUD" id="Ingresar">
                <input type="submit" value="Editar" class="btnCRUD" id="Editar">
                <input type="submit" value="Eliminar" class="btnCRUD" id="Eliminar">
                <input type="button" value="Limpiar" class="btnLimpiar" id="Limpiar" onclick="limpiarCampos()">
            </div>
        </form>
    </div>
    <div class="input-field2">
        <input type="text" class="inputBus" required>
        <label class="lblBus">Buscador</label>
        <select name="camposDisponibles">
            <option value="ID">ID</option>
            <option value="RUT">RUT</option>
            <option value="Nombre">Nombre</option>
            <option value="Apellidos">Apellidos</option>
            <option value="Edad">ID</option>
            <option value="PromedioGeneral">RUT</option>
            <option value="Apoderado">Nombre</option>
            <option value="Curso">Apellidos</option>
        </select>   
    </div>
    <table id="tabla-empleado">
    <thead>
            <tr>
                <th>ID</th>
                <th>RUT</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Edad</th>
                <th>PromedioGeneral</th>
                <th>Apoderado</th>
                <th>Curso</th>
            </tr>
        </thead>
        <tbody id="tableBody"></tbody>
        <div id="btnPaginacion"></div>
    <script>
        var datos = [];
        var paginaActual = 1;
        var filasPorPagina = 6;

        function obtenerDatos() {
            fetch('../actionsPhp/ldEmpleado.php')
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
                <td>${fila.ID}</td>
                <td>${fila.RUT}</td>
                <td>${fila.Nombre}</td>
                <td>${fila.Apellidos}</td>
                <td>${fila.Cargo}</td>
                <td>${fila.TipoContrato}</td>
                <td>${fila.Estado}</td>
                <td>${fila.Contacto}</td>`;
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
    <div class="btnVolver">
        <a href="../HUB.php" class="btn -btnVolver">Volver</a>
    </div>
</body>
<script>
    $(document).ready(function(){
        $('#tabla-empleado tbody').on('click', 'tr', function(){
            var rowData = $(this).children('td').map(function(){
                return $(this).text();
            }).get();
                
            $('#id').val(rowData[0]);
            $('#rut').val(rowData[1]);
            $('#nombre').val(rowData[2]);
            $('#apellidos').val(rowData[3]);
            $('#cargo').val(rowData[4]);
            $('#tipo-label').prop('checked', rowData[5] === 'Definido');
            $('#estado-label').prop('checked', rowData[6] === 'Activo');
            $('#contacto').val(rowData[7]);
        });
    });
</script>
<!-- <span class="loader"></span> 
<script src="../js/alertaInsEmpleado.js"></script>-->
<script src="../js/Inserts.js"></script>
<!--
<script src="../js/alertaAltEmpleado.js"></script>
<script src="../js/alertaDelEmpleado.js"></script>
<script src="../js/limpiarCampos.js"></script>-->
</html>