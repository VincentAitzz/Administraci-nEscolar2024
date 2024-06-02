<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración | Curso</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Administración de Curso</h2>
        <form id="dataForm" class="input-field" method="POST">
            <input type="hidden" id="nombreTabla" value="Curso">
            <!--ID,NIVEL,LETRA,NUMERO ALUMNOS-->
            <input type="text" name="id" id="id" disabled>
            <label class="lblID">ID</label>
            <br>
            <select name="nivel" id="nivel">
                <option value="">Seleccione nivel..</option>
                <?php include '../actionsPhp/CargarNivel.php'?>
            </select>
            <br>
            <select name="letra" id="letra">
                <option value="">Seleccione letra</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="G">G</option>
            </select>
            <br>
            <input type="text" name="NumeroAlumnos" class="inputNumeroAlumnos" required>
            <label class="lblNumeroAlumnos">Numero de Alumnos</label>
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
            fetch('../actionsPhp/ldCurso.php')
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
<!-- <span class="loader"></span> 
<script src="../js/alertaInsEmpleado.js"></script>-->
<script src="../js/Inserts.js"></script>
<!--
<script src="../js/alertaAltEmpleado.js"></script>
<script src="../js/alertaDelEmpleado.js"></script>
<script src="../js/limpiarCampos.js"></script>-->
</html>
