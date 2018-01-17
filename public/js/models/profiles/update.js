$(document).ready(function () {
	// script para realizar para actualizar registros usando peticiones ajax
    $('.btn-update-profile').click(function (e) {
        e.preventDefault();
        var div = $(this).parents('div'); //console.log('div: '+div); //fila contentiva de la data
        var id_profile = div.data('profile');  //console.log('id_profile: '+id_profile);
        var idform = '#form-update-profile_'+id_profile; //console.log(idform);
        var form = $(idform); //console.log(form.attr('action'));
        var url = form.attr('action'); //console.log(url);
        var data = form.serialize(); //console.log(data);
        
        var profile_update_ok = "#profile_update_ok_"+id_profile; //console.log('profile_update_ok: '+profile_update_ok);

        //oculta los div de errores anteriores
        $(".div-alert-error").each(function(){
          $(this).removeClass("show").addClass("hide");
          // $(this).addClass("hide");
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
            $(profile_update_ok).removeClass("text-danger").addClass("text-success show").text(result.messenge);
        }).fail(function (result) {
            // console.log(result.messenge);
            $.each(result.responseJSON.errors,function(index,valor){
                var id_error_msg = "#error_msg_"+index+"_"+id_profile;
                var id_div_input = "#div_input_"+index+"_"+id_profile;
                $(id_error_msg).text(valor).removeClass("hide").addClass( "show" );
                $(id_div_input).addClass("has-error");
            });
            $(profile_update_ok).addClass("text-danger show").text('Ocurrieron errores');
            
        });

    });
    //fin del evento clic
});