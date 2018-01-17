$(document).ready(function () {
	// script para realizar para actualizar registros usando peticiones ajax
    $('.btn-update-user').click(function (e) {
        e.preventDefault();
        var div = $(this).parents('div'); //console.log('div: '+div); //fila contentiva de la data
        var id_user = div.data('user');  //console.log('id_user: '+id_user);
        var idform = '#form-update-user_'+id_user; //console.log(idform);
        var form = $(idform); //console.log(form.attr('action'));
        var url = form.attr('action'); //console.log(url);
        var data = form.serialize(); //console.log(data);        
        var user_update_ok = "#user_update_ok_"+id_user; //console.log('user_update_ok: '+user_update_ok);

        //oculta los div de errores anteriores
        $(".div-alert-error").each(function(){
          $(this).removeClass("show").addClass("hide");
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
            $(user_update_ok).removeClass("text-danger").addClass("text-success show").text(result.messenge);
        }).fail(function (result) {
            // console.log(result.messenge);
            $.each(result.responseJSON.errors,function(index,valor){
                var id_error_msg = "#error_msg_"+index+"_"+id_user;
                var id_div_input = "#div_input_"+index+"_"+id_user;
                $(id_error_msg).text(valor).removeClass("hide").addClass( "show" );
                $(id_div_input).addClass("has-error");
            });
            $(user_update_ok).addClass("text-danger show").text('Ocurrieron errores');
            
        });

    });
    //fin del evento clic
});