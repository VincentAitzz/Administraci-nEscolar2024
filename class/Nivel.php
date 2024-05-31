<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración | Niveles</title>
</head>
<body>
<div class="container">
        <h2>Administración de Niveles</h2>
        <form id="dataForm" class="input-field" method="POST">
            <input type="" name="id" id="id" disabled>
            <label class="lblID">ID</label>
            <br>
            <select name="grado" id="grado" onchange="filtrarOpciones()">
                <option value="">Seleccione Grado</option>
                <option value="1ero">Primero</option>
                <option value="2do">Segundo</option>
                <option value="3ero">Tercero</option>
                <option value="4to">Cuarto</option>
                <option value="5to">Quinto</option>
                <option value="6to">Sexto</option>
                <option value="7mo">Septimo</option>
                <option value="8vo">Octavo</option>
            </select>
            <br>
            <select name="categoria" id="categoria" onchange="filtrarOpciones()">
                <option value="">Seleccione Categoria</option>
                <option value="Básico">Básico</option>
                <option value="Medio">Medio</option>
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
    <br>
    <a href="../HUB.php">Volver</a>
</body>
<script>
    function filtrarOpciones() {
        var grado = document.getElementById("grado");
        var categoria = document.getElementById("categoria");
        if (grado.value === "5to" || grado.value === "6to" || grado.value === "7mo" || grado.value === "8vo") {
            categoria.options[2].style.display = "none";
        } else {
            categoria.options[2].style.display = "block";
        }

        if (categoria.value === "Medio") {
            for (var i = 0; i < grado.options.length; i++) {
                if (i > 4) {
                    grado.options[i].style.display = "none";
                } else {
                    grado.options[i].style.display = "block";
                }
            }   
        } else {
            for (var j = 0; j < grado.options.length; j++) {
                grado.options[j].style.display = "block";
            }
        }
    }
</script>
<script src="../js/alertaInsNivel.js"></script>
<script src="../js/alertaAltNivel.js"></script>
<script src="../js/alertaDelNivel.js"></script>
<script src="../js/limpiarCampos.js"></script>
</html>