<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración | Empleado</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/loader.css">
    <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="../css/Class.css">
    <link rel="stylesheet" href="../css/checkBox.css">
    <link rel="stylesheet" href="../css/textFields.css">
    <link rel="stylesheet" href="../css/comboBox.css">
    <link rel="stylesheet" href="../css/buttons.css">
</head>
<body>
    <div class="contenedorMaster">
        <div class="contenedorForm">
            <h2>Administración de Empleados</h2>
            <form id="dataForm" method="POST">
            <!--        El separado encerrado aca es el que tiene el valor para hacer la comparacion en el JS-->
                <input type="" name="nombreTabla" id="nombreTabla" value="Empleado" hidden>

                <div class="contenedorCampos">
                    <div class="contenedorSingCampos">
                        <label class="lblID">ID</label>
                        <input type="" name="id" id="id" disabled class="textFieldDes">
                    </div>
                    <div class="contenedorSingCampos">
                        <label class="lbl">RUT</label>
                        <input type="text" id="rut" name="rut" class="textField" required>
                    </div>
                    <div class="contenedorSingCampos">
                        <label class="lbl">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="textField" required>
                    </div>
                    <div class="contenedorSingCampos">
                        <label class="lbl">Apellidos</label>
                        <input type="text" id="apellidos" name="apellidos" class="textField" required>
                    </div>
                    <div class="contenedorSingCampos">
                        <label class="lbl">Contacto</label>
                        <input type="text" id="contacto" name="contacto" class="textField" required>
                    </div>
                    <div class="contenedorCbox">
                        <select name="cargo" id="cargo" class="comboBox">
                            <option value="">Seleccione Cargo</option>
                            <option value="Encargado de aseo">Encargado de Aseo</option>
                            <option value="Profesor">Profesor</option>
                            <option value="Profesor jefe">Profesor Jefe</option>
                            <option value="Encargado ejecutivo">Encargado Ejecutivo</option>
                        </select>  
                    </div>
                    <div class="contenedorCheck">
                        <div class="wrap-check-53">
                            <input class="switch" type="checkbox" id="switch-contrato" name="switch" value="private">
                            <label for="switch-contrato">
                              <span class="switch-x-text">Contrato</span>
                              <span class="switch-x-toggletext">
                                <span class="switch-x-unchecked"><span class="switch-x-hiddenlabel">Unchecked: </span>Indefinido</span>
                                <span class="switch-x-checked"><span class="switch-x-hiddenlabel">Checked: </span>Definido</span>
                              </span>
                            </label>
                          </div>
                    </div>
                    <div class="contenedorCheck">
                        <div class="wrap-check-53">
                            <input class="switch" type="checkbox" id="switch-estado" name="switch" value="private">
                            <label for="switch-estado">
                              <span class="switch-x-text">Estado</span>
                              <span class="switch-x-toggletext">
                                <span class="switch-x-unchecked"><span class="switch-x-hiddenlabel">Unchecked: </span>Inactivo</span>
                                <span class="switch-x-checked"><span class="switch-x-hiddenlabel">Checked: </span>Activo</span>
                              </span>
                            </label>
                          </div>
                    </div>
                </div>
                <div class="contenedorButton">
                    <input type="submit" value="Ingresar" class="btn" id="Ingresar">
                    <input type="submit" value="Editar" class="btn" id="Editar">
                    <input type="submit" value="Eliminar" class="btn" id="Eliminar">
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
                    <option value="RUT">RUT</option>
                    <option value="Nombre">Nombre</option>
                    <option value="Apellidos">Apellidos</option>
                </select> 
            </div>
        <table id="tabla-empleado">
            <thead>
                <tr>
                    <th>•</th>
                    <th>ID</th>
                    <th>RUT</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Cargo</th>
                    <th>Tipo de Contrato</th>
                    <th>Estado</th>
                    <th>Contacto</th>
                </tr>
            </thead>
            <tbody id="tableBody"></tbody>
        </table>
        <div id="btnPaginacion"></div>
        <script>
            var datos = [];
            var paginaActual = 1;
            var filasPorPagina = 6;

        function obtenerDatos() {
            fetch('../actionsPhp/load/ldEmpleado.php')
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
                    <td>»</td>
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
                var busqueda = document.querySelector('.textFieldBuscador').value.toLowerCase();

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
        $('#tabla-empleado tbody').on('click', 'tr', function(){
            var rowData = $(this).children('td').map(function(){
                return $(this).text();
            }).get();
                
            $('#id').val(rowData[1]);
            $('#rut').val(rowData[2]);
            $('#nombre').val(rowData[3]);
            $('#apellidos').val(rowData[4]);
            $('#cargo').val(rowData[5]);
            $('#switch-contrato').prop('checked', rowData[6] === 'Definido');
            $('#switch-estado').prop('checked', rowData[7] === 'Activo');
            $('#contacto').val(rowData[8]);
        });
    });
</script>
<!-- <span class="loader"></span> 
<script src="../js/alertaInsEmpleado.js"></script>-->
    <script src= "../js/Update.js"></script>
    <script src="../js/Inserts.js"></script>
    <script src="../js/Delete.js"></script>
    <script src="../js/Limpiar.js"></script>
</html>