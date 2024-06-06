<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HUB | Menu Principal</title>
    <link rel="stylesheet" href="css/loader.css">
    <link rel="stylesheet" href="css/root.css">
    <link rel="stylesheet" href="css/Class.css">
    <link rel="stylesheet" href="css/buttons.css">
</head>
<body>
    <label style="position: absolute; margin-top: .5vh;" >HUB | MENU PRINCIPAL</label>
    <label style="position: absolute; margin-top: 1.4vh;">───────────</label>
    <div class="contenedorMasterHUB">

        <div class="contenedorRedireccionamiento">
                <div>
                    <button class="btn" id="ap">Apoderado</button>
                </div>
                <div>
                    <button class="btn" id="al">Alumno</button>
                </div>
                <div>
                    <button class="btn" id="em">Empleado</button>
                </div>
                <div>
                    <button class="btn" id="ni">Nivel</button>
                </div>
                <div>
                    <button class="btn" id="as">Asignatura</button>
                </div>
                <div>
                    <button class="btn" id="cl">Clase</button>
                </div>
                <div>
                    <button class="btn" id="cu">Curso</button>
                </div>
        </div>
        <div class="contenedorDataHUB">
            <ul>
                <li>Numero de Apoderados:</li>
                <li>Numero de Alumnos Matriculados:</li>
                <li>Numero de Cursos:</li>
                <li>Numero de Empleados:</li>
                <li>Numero de Asignaturas:</li>
                <li>NUmero de Niveles:</li>
                <li>Numero de Clases:</li>
                <li>Numero de Profesores:</li>
            </ul>
            <ul>
                <li>0</li>
                <li>0</li>
                <li>0</li>
                <li>0</li>
                <li>0</li>
                <li>0</li>
                <li>0</li>
                <li>0</li>
            </ul>
        </div>
    </div>
    <button class="btnVolver">Volver</button>
</body>
<script>
    const apoderadoBtn = document.getElementById('ap');
    const alumnoBtn = document.getElementById('al');
    const empleadoBtn = document.getElementById('em');
    const nivelBtn = document.getElementById('ni');
    const asignaturaBtn = document.getElementById('as');
    const claseBtn = document.getElementById('cl');
    const cursoBtn = document.getElementById('cu');

    apoderadoBtn.addEventListener('click', () => {
    window.location.href = 'class/Apoderado.php';
    });

    alumnoBtn.addEventListener('click', () => {
    window.location.href = 'class/Alumno.php';
    });

    empleadoBtn.addEventListener('click', () => {
    window.location.href = 'class/Empleado.php';
    });

    nivelBtn.addEventListener('click', () => {
    window.location.href = 'class/Nivel.php';
    });

    asignaturaBtn.addEventListener('click', () => {
    window.location.href = 'class/Asignatura.php';
    });

    claseBtn.addEventListener('click', () => {
    window.location.href = 'class/Clase.php';
    });

    cursoBtn.addEventListener('click', () => {
    window.location.href = 'class/Curso.php';
    });
</script>
</html>