$(document).ready(function () {
	// script para realizar para actualizar registros usando peticiones ajax
    $('.btn-update-rol').click(function (e) {
        e.preventDefault();
        var row = $(this).parents('tr'); //console.log(row); //fila contentiva de la data
        var id_rol = row.data('rol');  console.log('id_rol: '+id_rol);
        var id_user = row.data('user');  console.log('id_user: '+id_user);
        var idform = '#form-update-rol_'+id_rol; //console.log(idform);
        var form = $(idform); //console.log(form.attr('action'));
        var url = form.attr('action'); //console.log(url);
        var data = form.serialize(); console.log(data);
        var modal_active = 'edit_modal_'+id_user; //console.log('modal_active: '+modal_active);
        var id_panel = "#panel_rol_"+id_rol; //console.log('id_panel: '+id_panel);

        //limpia los div de errores anteriores
        $(".div-alert-error").each(function(){
          $(this).removeClass("show");
          $(this).addClass("hide");
        });

        //limpia los div de los input del form
        $(".div-form-input").each(function(){
          $(this).removeClass("has-error");
        });

        $.post(url, data, function (result){
            // console.log(result.messenge);
            // $("#"+modal_active).modal('hide');
            $('.text-rols-rol-'+id_rol).text(result.rol);
            $('.text-rols-rango-'+id_rol).text(result.rango);
            $('.text-rols-descripcion-'+id_rol).text(result.descripcion);
            $('.text-rols-finicial-'+id_rol).text(result.finicial);
            $('.text-rols-ffinal-'+id_rol).text(result.ffinal);
            
            $(id_panel).removeClass("panel-warning");
            $(id_panel).addClass("panel-success");
        }).fail(function (result) {
            console.log(result.messenge);
            $.each(result.responseJSON.errors,function(index,valor){
                var id_error_msg = "#error_msg_"+index+"_"+id_rol;
                var id_div_input = "#div_input_"+index+"_"+id_rol;

                $(id_error_msg).text(valor);
                $(id_error_msg).removeClass("hide");
                $(id_error_msg).addClass( "show" );
                $(id_div_input).addClass( "has-error" );

            });
            $(id_panel).removeClass("panel-success");
            $(id_panel).addClass("panel-warning");
        });

    });
    //fin del evento clic
});