
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
              <h3 class='box-title'>Editando  usuario</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form action='/admin/usuario/atualizar' method='POST' enctype='multipart/form-data'>
              <div class='box-body'>
                <div class='form-group'>
                    <label for='exampleInput'>Nome</label>
                    <input type='text' class='form-control' name='nome' placeholder='Digite nome' value='{{ $data->nome }}'>
                </div>
                <div class='form-group'>
                    <label for='exampleInput'>Login</label>
                    <input type='text' class='form-control' name='login' placeholder='Digite login' value='{{ $data->login }}'>
                </div>
                <div class='form-group'>
                    <label for='exampleInput'>Senha</label>
                    <input type='password' class='form-control' name='senha' placeholder='Digite senha' value='{{ $data->senha }}'>
                </div>
                <div class='form-group'>
                    <label for='exampleInput'>Email</label>
                    <input type='text' class='form-control' name='email' placeholder='Digite email' value='{{ $data->email }}'>
                </div>
                <div class='form-group'>
                    <label for='exampleInput'>Imagem Perfil</label>
                    <input type='file' class='form-control' name='image_perfil' placeholder='Digite image_perfil' value='{{ $data->image_perfil }}'>
                </div>
                <div class='form-group'>
                    <label for='exampleInput'>FlAtivo</label>
                    <input type='text' class='form-control' name='flAtivo' placeholder='Digite flAtivo' value='{{ $data->flAtivo }}'>
                </div><input type='hidden' value='{{ $data->id }}' name='id' >
              </div>
              <div class='box-footer'>
                <button type='submit' class='btn btn-primary'>Salvar</button>
              </div>
            </form>
          </div><!-- /.box -->
        </div>
        </div>
        @endsection
