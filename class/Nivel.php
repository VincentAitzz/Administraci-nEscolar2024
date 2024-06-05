<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración | Nivel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Administración de Curso</h2>
        <form id="dataForm" class="input-field" method="POST">
            <input type="hidden" id="nombreTabla" value="nivel">
            <!--ID,GRADO,CATEGORIA-->
            <input type="text" name="id" id="id" disabled>
            <label class="lblID">ID</label>
            <br>
            <select name="Grado" id="Grado">
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
            <br>
            <select name="Categoria" id="Categoria">
                <option value="">Seleccione Categoria..</option>
                <option value="Basico">Basico</option>
                <option value="Medio">Medio</option>
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
            <option value="Grado">Grado</option>
            <option value="Categoria">Categoria</option>
        </select>
    </div>
    <table id="tabla-nivel">
        <thead>
            <tr>
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
                <td>${fila.ID}</td>
                <td>${fila.Grado}</td>
                <td>${fila.Categoria}</td>`;
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
        $('#tabla-nivel tbody').on('click','tr', function(){
            var rowData = $(this).children('td').map(function(){
                return $(this).text();
            }).get();

            $('#id').val(rowData[0]);
            $('#Grado').val(rowData[1]);
            $('#Categoria').val(rowData[2]);
        });
    });
</script>
<!-- <span class="loader"></span> -->
<script src= "../js/update.js"></script>
<script src="../js/Inserts.js"></script>
<script src="../js/Delete.js"></script>
<script src="../js/limpiar.js"></script>

</html>
