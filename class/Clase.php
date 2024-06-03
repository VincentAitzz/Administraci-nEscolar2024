<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración | Clase</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    <div class="container">
        <h2>Administración de Clase</h2>
        <form id="dataForm" class="input-field" method="POST">
            <input type="hidden" id="nombreTabla" value="Clase">
            <!--id,Nombre,Profesor,Curso,Aula,Fecha-->
            <input type="text" id="id" name="id" disabled>
            <label class="lblID">ID</label>
            <br>
            <select id="Nombre" name="Nombre">
                <option value="">Seleccione Asignatura..</option>
                <?php include '../actionsPhp/Combobox/CargarAsignatura.php'?>
            </select>
            <br>
            <select name="Profesor" id="Profesor">
                <option value="">Seleccione Profesor..</option>
                <?php include '../actionsPhp/Combobox/CargarProfesor.php'?>
            </select>
            <br>
            <select name="Curso" id="Curso">
                <option value="">Seleccione Curso..</option>
                <?php include '../actionsPhp/Combobox/CargarCurso.php'?>
            </select>
            <br>
            <input type="text" name="Aula" id="Aula">
            <label class="lblAula">Aula</label>
            <br>
            <input type="text" name="Fecha" id="Fecha">
            <label class="lblFecha">Fecha</label>
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
            <option value="Nombre">Nombre</option>
            <option value="Profesor">Profesor</option>
            <option value="Curso">Curso</option>
            <option value="Aula">Aula</option>
            <option value="Fecha">Fecha</option>
        </select>
    </div>
    <table id="tabla-clase">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Profesor</th>
                <th>Curso</th>
                <th>Aula</th>
                <th>Fecha</th>
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
            fetch('../actionsPhp/load/ldClase.php')
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
                <td>${fila.NombreAsig}</td>
                <td>${fila.Profesor}</td>
                <td>${fila.Curso}</td>
                <td>${fila.Aula}</td>
                <td>${fila.Fecha_Hora}</td>`;
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
    <script>
    // Fecha automatica >?D
    var now = new Date();
    
    // Formateamos la fecha y hora
    var formattedDate = now.getFullYear() + '-' + (now.getMonth() + 1).toString().padStart(2, '0') + '-' + now.getDate().toString().padStart(2, '0');
    var formattedTime = now.getHours().toString().padStart(2, '0') + ':' + now.getMinutes().toString().padStart(2, '0') + ':' + now.getSeconds().toString().padStart(2, '0');
    
    // Combinamos la fecha y hora en un solo valor
    var dateTime = formattedDate + ' ' + formattedTime;
    
    $('#Fecha').val(dateTime);
</script>

</body>
    <script>
        $(document).ready(function(){
        $('#tabla-clase tbody').on('click','tr', function(){
            console.log('Fila clickeada'); // Añadir este console.log para verificar
            var rowData = $(this).children('td').map(function(){
                return $(this).text();
            }).get();

            $('#id').val(rowData[0]);
            $('#Nombre').val(rowData[1]);
            $('#Profesor').val(rowData[2]);
            $('#Curso').val(rowData[3]);
            $('#Aula').val(rowData[4]);
            $('#Fecha').val(rowData[5]);
        });
    });

    </script>
    <!-- <span class="loader"></span> -->
    <script src= "../js/update.js"></script>
    <script src="../js/Inserts.js"></script>
    <script src="../js/Delete.js"></script>
    <script src="../js/limpiar.js"></script>

</html>
