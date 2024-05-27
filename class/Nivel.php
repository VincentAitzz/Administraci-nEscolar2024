<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración | Niveles</title>
</head>
<body>
    <div class="container">
        <h2>Administracion de Niveles</h2>
        <form id="dataform" class="input-field" method="Post">
            <input type="text" id="ID" class="inputID" required>
            <label for="ID" class="lblID">ID</label>
            <br>
            <!--GRADO-->
            <select id="GRADO" name="GRADO">
                <option value="">Seleccione Grado..</option>
                <option value="1ero">1ero</option>
                <option value="2do">2do</option>
                <option value="3ro">3ro</option>
                <option value="4to">4to</option>
                <option value="5to">5to</option>
                <option value="6to">6to</option>
                <option value="7mo">7mo</option>
                <option value="8vo">8vo</option>
            </select>
            <br>
            <!--CATEGORIA-->
            <select id="CATEGORIA" name="CATEGORIA">
                <option value="">Seleccione Categoria..</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="G">G</option>
            </select>
            <!--Botones-->
            <div class="buttonsCRUD">
                <input type="submit" value="Ingresar" class="btnCRUDD" id="Ingresar">
                <input type="submit" value="Editar" class="btnCRUDD" id="Editar">
                <input type="submit" value="Eliminar" class="btnCRUDD" id="Eliminar">
            </div>
        </form>
    </div>
    <div class="input-field2">
        <input type="text" class="inputbus" required>
        <label class="lblBus">Buscador</label>
        <select name="CamposDisponibles">
            <option value="ID">ID</option>
            <option value="Grado">Grado</option>
            <option value="Categoria">Categoria</option>
        </select>
    </div>
    <table id ="Tabla-Nivel">
        <thead>
        <tr>
            <th>ID</th>
            <th>Grado</th>
            <th>Categoria</th>
        </tr>
    </thead>
    <tbody id="tablebody"></tbody>
    </table>
    <br>
    <div id="btnPaginacion"></div>
    <div class="btnVolver"><a href="../HUB.php">Volver</a></div>
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
            //paginas coso
            // paginas de la tabla
            function mostrarPagina(pagina, datosParaMostrar = datos){
                var inicio=(pagina -1) * filasporPagina;
                var fin= inicio + filasporPagina;
                var filas = datosParaMostrar.slice(inicio,fin);

                var tbody=document.getElementById('tablebody');
                tbody.innerHTML = '';

                filas.forEach(fila =>{
                    var tr= document.createElement('tr');
                    tr.innerHTML = `<td>${fila.ID}</td><td>${fila.Grado}</td><td>${fila.Categoria}</td>`;
                    tbody.appendChild(tr);
                });
            }
            //busqueda bt
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
            //botones paginacion
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
            $(document).ready(function(){
                $('#Tabla-Nivel tbody').on('click','tr',function(){
                    var rowData= $(this).children('td').map(function(){
                        return $(this).text();
                    }).get();

                    $('#ID').val(rowData[0]);
                    $('#Grado').val(rowData[1]);
                    $('#Categoria').val(rowData[2]);
                });
            });
        </script>
        
        <script src="../js/Alumnos/alertaInsAlumno.js"></script>
        <script src="../js/Alumnos/alertaActAlumno.js"></script>
        <script src="../js/Alumnos/alertaDelAlumno.js"></script>
</body>
</html>