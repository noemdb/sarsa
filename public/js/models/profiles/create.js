$(document).ready(function() {
    $('.btn-profile-create').click(function (e) {
        e.preventDefault();
        var row = $(this).parents('tr'); //console.log(row);
        var id_user = row.data('user'); //console.log('id_user: '+id_user);

        var idform = '#form-profile-create-'+id_user; //console.log(idform);
        var form = $(idform); // console.log(form);
        var user_id = form.data('user_id'); console.log('user_id: '+user_id);
        var url = form.attr('action'); //console.log(url);
        var data = form.serialize(); //console.log(data);
        var modal_active = '#edit_modal_'+id_user; //console.log('modal_active: '+modal_active);

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
            //console.log(result.messenge);
            var id_div = '#alert-result-oper';
            $(id_div).removeClass("hide");
            $(id_div).addClass("show");
            $(id_div).text(result.messenge+': '+result.username);
            
            location.reload(true);
        }).fail(function (result) {
            $.each(result.responseJSON.errors,function(index,valor){

              var id_error_msg = "#error_msg_"+index+"_create";
              var id_div_input = "#div_input_"+index+"_create";

              $(id_error_msg).text(valor);
              $(id_error_msg).removeClass("hide");
              $(id_error_msg).addClass( "show" );
              $(id_div_input).addClass( "has-error" );

            });

        });
    });
});