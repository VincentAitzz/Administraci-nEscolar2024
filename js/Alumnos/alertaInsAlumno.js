document.getElementById('dataForm').addEventListener('submit',function(event){
    event.preventDefault();

    var rut= document.querySelector('input[name="RUT"]').value;
    var nombre = document.querySelector('input[name="Nombre"]').value;
    var apellidos = document.querySelector('input[name="Apellidos"]').value;
    var edad = document.querySelector('input[name="Edad"]').value;
    var promedio = document.querySelector('input[name="Promedio]').value;
    var Apoderado = document.querySelector('select[name="apoderado"]').value;
    var Curso = document.querySelector('Select[name="curso"]').value;

    var xhr= new XMLHttpRequest();
    xhr.open('POST','../actionsPhp/Alumnos/insAlumno.php',true);
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhr.onload = function(){
        if(this.status == 200){
            if (this.responseText.trim() === "Registro insertado con exito"){
                alert(this.responseText);
                fetchData('../actionsPhp/Alumnos/IdAlumno.php', data => {
                    renderTable(data,0,itemsPerPage);
                    renderPagination(data, itemsPerPage);
                });
            }else{
                alert(this.responseText);
            }
        }
    };
    xhr.send=('RUT=' + rut + '&nombre=' + nombre + '&apellidos=' + apellidos + '&edad=' + edad + '&promedio='+ promedio + '&apoderado=' + Apoderado + '&curso=' + Curso);
});