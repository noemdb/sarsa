$(document).ready(function () {
	// script para realizar para actualizar registros usando peticiones ajax
    $('.btn-update-rol').click(function (e) {
        e.preventDefault();
        var div = $(this).parents('div'); console.log('div: '+div); //fila contentiva de la data
        var id_rol = div.data('rol');  console.log('id_rol: '+id_rol);
        var idform = '#form-update-rol_'+id_rol; console.log(idform);
        var form = $(idform); console.log(form.attr('action'));
        var url = form.attr('action'); //console.log(url);
        var data = form.serialize(); console.log(data);
        
        var rol_update_ok = "#rol_update_ok_"+id_rol; //console.log('rol_update_ok: '+rol_update_ok);

        //oculta los div de errores anteriores
        $(".div-alert-error").each(function(){
          $(this).removeClass("show");
          $(this).addClass("hide");
        });

        //limpia los div de los input del form
        $(".div-form-input").each(function(){
          $(this).removeClass("has-error");
        });
        $(".form-control").each(function(){
          $(this).removeClass("has-error");
        });

        $.post(url, data, function (result){
            //console.log(result.messenge);
            $(rol_update_ok).addClass("text-success show").text(result.messenge);
        }).fail(function (result) {
            // console.log(result.messenge);
            $.each(result.responseJSON.errors,function(index,valor){
                var id_error_msg = "#error_msg_"+index+"_"+id_rol;
                var id_div_input = "#div_input_"+index+"_"+id_rol;
                $(id_error_msg).text(valor).addClass( "show" );
                // $(id_error_msg).removeClass("hide");
                // $(id_error_msg).addClass( "show" );
                $(id_div_input).addClass("has-error");
            });
            $(rol_update_ok).addClass("text-danger show").text('Ocurrieron errores');
            
        });

    });
    //fin del evento clic
});