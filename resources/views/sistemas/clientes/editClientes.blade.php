
        @extends('admin-lte.dashboard')
        @section('content')

        <div class='row'>
            <div class='col-md-10'>
        @if (Session::has('msgs'))
            <div class='alert alert-danger'>{{ Session::get('msgs') }}</div>
        {{ Session::forget('msgs') }}
        @endif
        <!-- general form elements -->
          <div class='box box-primary'>
            <div class='box-header with-border'>
              <h3 class='box-title'>Editando  cliente</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form action='/admin/cliente/atualizar' method='POST' enctype='multipart/form-data'>
              <div class='box-body'>
                <div class='form-group'>
                    <label for='exampleInput'>Nome</label>
                    <input type='text' class='form-control' name='nome' placeholder='Digite nome' value='{{ $data->nome }}'>
                </div>
                <div class='form-group'>
                    <label for='exampleInput'>Cpf</label>
                    <input type='text' class='form-control' name='cpf' placeholder='Digite cpf' value='{{ $data->cpf }}'>
                </div>
                <div class='form-group'>
                    <label for='exampleInput'>Telefone</label>
                    <input type='text' class='form-control' name='telefone' placeholder='Digite telefone' value='{{ $data->telefone }}'>
                </div>
                <div class='form-group'>
                    <label for='exampleInput'>Mailing</label>
                    <textarea class='form-control' name='mailing' placeholder='Digite os Emails separados por virgula, exemplo: fulano@fulano.com, cicrano@cicrano.com'>
                      {{ $data->mailing }}
                    </textarea>
                </div>
                <input type='hidden' value='{{ $data->id }}' name='id' >
              </div>
              <div class='box-footer'>
                <button type='submit' class='btn btn-primary'>Salvar</button>
              </div>
            </form>
          </div><!-- /.box -->
        </div>
        </div>
        @endsection
