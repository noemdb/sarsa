$(document).ready(function() {
  $('.btn-user-create').click(function (e) {
      e.preventDefault();
      var id_user = $(this).data('id'); //console.log(id_user);
      var idform = '#form-user-create'; //console.log(idform);
      var form = $(idform); // console.log(form);
      var url = form.attr('action'); //console.log(url);
      var data = form.serialize(); //console.log(data);
      var modal_active = 'user-create'; //console.log('modal_active: '+modal_active);
      var id_span_result = '#text-user-create-result-oper'; // console.log(id_span_result);

      //limpia (alert-error) los div de errores
      $(".div-alert-error").each(function(){
        $(this).removeClass("show");
        $(this).addClass("hide");
      });

      //limpia (los has-error) los input del form
      $(".div-form-input").each(function(){
        $(this).removeClass("has-error");
      });

      $(id_span_result).removeClass("show");
      $(id_span_result).addClass("hide");             

      $.post(url, data, function (result){
          //console.log(result.messenge);
          
          $(id_span_result).removeClass("hide text-danger");
          $(id_span_result).addClass("show text-success");
          $(id_span_result).text(result.messenge+': '+result.username);

          form.trigger('reset');

      }).fail(function (result) {

          $.each(result.responseJSON.errors,function(index,valor){
                var id_error_msg = "#error_msg_"+index+"_"+id_user;
                var id_div_input = "#div_input_"+index+"_"+id_user;
                $(id_error_msg).text(valor);
                $(id_error_msg).removeClass("hide");
                $(id_error_msg).addClass( "show" );
                $(id_div_input).addClass( "has-error" );
            });

          $(id_span_result).removeClass("hide text-success");
          $(id_span_result).addClass("show text-danger");
          $(id_span_result).text('Se encontraron errores.');
          
      });
  });
});