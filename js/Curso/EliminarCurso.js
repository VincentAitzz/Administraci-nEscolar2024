$(document).ready(function(){
    //Detectrar click
    $('#btnEliminar').click(function(){
        //obtener id
        var id = $('#IDCurso').val();

        $.ajax({
            url: "../actionsPhp/Curso/EliminarCurso.php",
            type:"POST",
            data:{
                id: id
            },
            success: function(response){
                alert(response);
                if(response.includes("éxito")){
                    cargarTabla();
                }
            },
            error: function(xhr,status,error){
                console.error(xhr.responseText);
            }
        })
    })
})