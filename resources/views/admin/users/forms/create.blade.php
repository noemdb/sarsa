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

          <button type="submit" class="btn-user-create btn btn-primary btn-block" value="create" id="create">
              <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
              Registrar 
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

                $("#error_msg_ div").each(function(){
                    alert($(this).text())
                });               

                $.post(url, data, function (result){
                    //console.log(result.messenge);
                    //location.reload();
                    
                    $('#alert-result-oper').removeClass("hide");
                    $('#alert-result-oper').addClass("show");

                    $('#alert-result-oper').text(result.messenge+': '+result.username);

                    form.trigger('reset');

                    $.each(result, function(index,valor){
                      $("#error_msg_"+index+"_"+id_user).fadeOut();
                    });

                }).fail(function (result) {
                    $.each(result.responseJSON.errors,function(index,valor){
                        console.log(result.messenge);
                        $("#error_msg_"+index+"_"+id_user).fadeOut();
                        $("#msg_"+index+"_"+id_user).html(valor);
                        $("#error_msg_"+index+"_"+id_user).fadeIn();
                    });
                });
            });
        });
    </script>
    
@endsection