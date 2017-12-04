<div class="panel panel-{{ $class_form_create_user or 'default' }}">
  <div class="panel-heading">Formulario para el Registro de Nuevo Usuario.</div>
  <div class="panel-body">
    {!! Form::open(['route' => 'users.store', 'method' => 'POST', 'id'=>'form-user-create']) !!}
    {{-- {{ csrf_field() }} --}}

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        {{-- partial con el formulario y campos --}}
        @include('admin.users.forms.fields')
      </div>
    </div>
    
    <div align="center">
        <div class="btn-group">

          <button type="submit" class="btn-user-create btn btn-primary" value="create" id="create">
              <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
              Registrar 
          </button>
          <button type="reset" class="btn-user-reset btn btn-warning" value="Reset" id="reset">
              <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
              Reset 
          </button>

        </div>
        
    </div>
    {{-- </form> --}}
  {!! Form::close() !!}    
  </div>
</div>

@section('scripts')
    @parent

    <script>
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
                      $(id_div).removeClass("hide");
                      $(id_div).addClass("show");
                      $(id_div).html(valor);                        
                      $(id_div).fadeIn();
                    });
                    
                });
            });
        });
    </script>
    
@endsection