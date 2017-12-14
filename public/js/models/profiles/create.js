$(document).ready(function() {
    $('.btn-profile-create').click(function (e) {
        e.preventDefault();
        var row = $(this).parents('tr'); console.log(row);
        var id_user = row.data('user');  console.log('id_user: '+id_user);
        var idform = '#form-profile-create-'+id_user; console.log(idform);
        var form = $(idform); console.log(form);
        var url = form.attr('action'); console.log(url);
        var data = form.serialize(); console.log(data);
        var modal_active = 'edit_modal_'+id_user; console.log('modal_active: '+modal_active);

        //limpia los div de errores anteriores
        $(".div-alert-error").each(function(){
          // console.log('text: '+$(this).text());
          $(this).removeClass("show");
          $(this).addClass("hide");
        });               

        $.post(url, data, function (result){
            //console.log(result.messenge);
            var id_div = '#alert-result-oper';
            $(id_div).removeClass("hide");
            $(id_div).addClass("show");
            $(id_div).text(result.messenge+': '+result.username);
            // form.trigger('reset');
            $("#"+modal_active).modal('hide');

        }).fail(function (result) {
            $.each(result.responseJSON.errors,function(index,valor){
              var id_div = "#error_msg_"+index+"_"+id_user;
              $(id_div).removeClass("hide");
              $(id_div).addClass("show");
              $(id_div).html(valor);                        
              $(id_div).fadeIn();
            });
            
        });
    });
});