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
            <h2>Administraciones de Alumnos</h2>
            <form id="dataForm" class="input-field" method="POST">
                <input type="hidden" id="nombreTabla" value="Alumno">
                <!--ID, RUT,NOMBRE,APELLIDOS,EDAD,PROMEDIO,APODERADO,CURSO-->
                <br>
                <input type="text" name="id" id="id" disabled>
                <label class="lblID">ID</label>
                <br>
                <input type="text" name="rut" id="rut" required>
                <label class="lblrut">RUT</label>
                <br>
                <input type="text" name="nombre" id="nombre" required>
                <label class="lblnombre">Nombre</label>
                <br>
                <input type="text" name="apellidos" id="apellidos" required>
                <label class="lblApellidos">Apellidos</label>
                <br>
                <input type="text" name="edad" id="edad" required>
                <label class="lblEdad">Edad</label>
                <br>
                <input type="text" name="promedio" id="promedio" required>
                <label class="lblPromedio">Promedio General</label>
                <br>
                <select name="apoderado" id="apoderado">
                    <option value="">Seleccione Apoderado..</option>
                    <?php include '../actionsPhp/Combobox/CargarApoderado.php'?>
                </select>
                <br>
                <select name="curso" id="curso">
                    <option value = "">Seleccione Curso...</option>
                    <?php include '../actionsPhp/Combobox/CargarCurso.php'?>
                </select>
                <br>
                <div class="buttonsCRUD">
                    <input type="button" value="Ingresar" class="btnCRUD" id="Ingresar">
                    <input type="button" value="Editar" class="btnCRUD" id="Editar">
                    <input type="button" value="Eliminar" class="btnCRUD" id="Eliminar">
                    <input type="button" value="Limpiar" class="btnLimpiar" id="Limpiar">
                </div>
            </form>
        </div>
        <div class="input-field2">
            <input type="text" class="inputBus" required>
        <label class="lblBus">Buscador</label>
        <select name="camposDisponibles">
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
            var busqueda = document.querySelector('.inputBus').value.toLowerCase();

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

        document.querySelector('.inputBus').addEventListener('input', filtrarDatos);
        obtenerDatos();
        </script>
        <div class="btnVolver">
            <a href="../HUB.php" class="btn -btnVolver">Volver</a>
        </div>
    </body>
    <script>
        $(document).ready(function(){
    $('#tabla-alumno tbody').on('click','tr', function(){
        var rowData = $(this).children('td').map(function(){
            return $(this).text();
        }).get();

        $('#id').val(rowData[0]); // El ID del campo en el formulario es 'id'
        $('#rut').val(rowData[1]); // El ID del campo en el formulario es 'rut'
        $('#nombre').val(rowData[2]); // El ID del campo en el formulario es 'nombre'
        $('#apellidos').val(rowData[3]); // El ID del campo en el formulario es 'apellidos'
        $('#edad').val(rowData[4]); // El ID del campo en el formulario es 'edad'
        $('#promedio').val(rowData[5]); // El ID del campo en el formulario es 'promedio'
        $('#apoderado').val(rowData[6]); // El ID del campo en el formulario es 'apoderado'
        $('#curso').val(rowData[7]); // El ID del campo en el formulario es 'curso'
    });
});

    </script>
    <!-- <span class="loader"></span> -->
    <script src= "../js/update.js"></script>
    <script src="../js/Inserts.js"></script>
    <script src="../js/Delete.js"></script>
    <script src="../js/limpiar.js"></script>
</html>
