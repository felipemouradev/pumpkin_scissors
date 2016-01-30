
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
              <h3 class='box-title'>Editando  editoria</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form action='/admin/editoria/atualizar' method='POST' enctype='multipart/form-data'>
              <div class='box-body'>
                <div class='form-group'>
                    <label for='exampleInput'>Nome</label>
                    <input type='text' class='form-control' name='nome' placeholder='Digite nome' value='{{ $data->nome }}'>
                </div>
                <div class='form-group'>
                    <label for='exampleInput'>Slug_name</label>
                    <input type='text' class='form-control' name='slug_name' placeholder='Digite slug_name' value='{{ $data->slug_name }}'>
                </div>
                <div class='form-group'>
                    <label for='exampleInput'>Jornal_id</label>
                    <input type='text' class='form-control' name='jornal_id' placeholder='Digite jornal_id' value='{{ $data->jornal_id }}'>
                </div><input type='hidden' value='{{ $data->editoria_id }}' name='editoria_id' >
              </div>
              <div class='box-footer'>
                <button type='submit' class='btn btn-primary'>Salvar</button>
              </div>
            </form>
          </div><!-- /.box -->
        </div>
        </div>
        @endsection