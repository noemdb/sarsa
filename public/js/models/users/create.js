$(document).ready(function() {
  $('.btn-user-create').click(function (e) {
      e.preventDefault();
      var id_user = $(this).attr('id'); //console.log(id_user);
      var idform = '#form-user-create'; //console.log(idform);
      var form = $(idform); //console.log(form);
      var url = form.attr('action'); //console.log(url);
      var data = form.serialize(); //console.log(data);
      var modal_active = 'user-create'; //console.log('modal_active: '+modal_active);

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
          form.trigger('reset');

      }).fail(function (result) {
          $.each(result.responseJSON.errors,function(index,valor){
            var id_div = "#error_msg_"+index+"_"+id_user;
            var id_div_input = "#div_input_"+index+"_"+id_user;
            $(id_div).removeClass("hide");
            $(id_div).addClass("show");
            $(id_div).text(valor);
            $(id_div_input).addClass( "has-error" );                       
          });
          
      });
  });
});