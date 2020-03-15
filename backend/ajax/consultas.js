function consulta(){
    $ajax({
        'url':'conexion.php',
        'type':'post',
        'data':{},
        Success:function(respuesta){
            var actualizar = $('#Actualizar');
            for(var i=0;i<respuesta.length;i++){
                var item = respuesta[i];
                var fila = "<tr>";
                fila+="<td>"+item.nombre+"</td>"+"<td>"+item.apellido+"</td>";
                fila+="<td><input data-info='"+ JSON.stringify(item)+"' class='actualizar' type='button' value='Modificar'/></td>";
                fila+="<td><input data-info='"+item.id+"' class='eliminar' type='button' value='Eliminar'/></td>";
                actualizar.append(fila);
            }

            $('tbody input.actualizar').on('click',function(e){
                var data = $(this).attr('data-info');
                var persona = JSON.parse(data);
                $('#nombre').val(persona.nombre);
                $('#apellido').val(persona.apellido);
                $('#correo').val(persona.correo);
                $('#fecha').val(persona.fecha);
                $('#id').val(persona.id);
            });
        }
    });
}

$('consulta').on('click',function(e){
    consulta(); 
});