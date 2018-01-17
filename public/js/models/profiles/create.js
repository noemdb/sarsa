$(document).ready(function () {
  // script para realizar para actualizar registros usando peticiones ajax
    $('.btn-profile-create').click(function (e) {
        e.preventDefault();
        // var div = $(this).parents('div'); //console.log(row);
        var user_id = $(this).data('user'); //console.log('user_id: '+user_id);

        var idform = '#form-profile-create-'+user_id; //console.log(idform);
        var form = $(idform); //console.log(form);
        var url = form.attr('action'); //console.log(url);
        var data = form.serialize(); //console.log(data);
        var profile_create_ok = "#profile_create_ok_"+user_id; //console.log('profile_create_ok: '+profile_create_ok);

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
            $(profile_create_ok).removeClass("text-danger").addClass("text-success show").text(result.messenge);
            var opt_user_id = $("select[name='user_id'] :selected"); //console.log('opt_user_id: '+opt_user_id);
            $(opt_user_id).remove();
            $(idform).trigger("reset");
        }).fail(function (result) {
            // console.log(result.messenge);
            $.each(result.responseJSON.errors,function(index,valor){
                var id_error_msg = "#error_msg_"+index+"_"+user_id;
                var id_div_input = "#div_input_"+index+"_"+user_id;
                $(id_error_msg).text(valor).removeClass("hide").addClass( "show" );
                $(id_div_input).addClass("has-error");
            });
            $(profile_create_ok).addClass("text-danger show").text('Ocurrieron errores');
            
        });

    });
    //fin del evento clic
});