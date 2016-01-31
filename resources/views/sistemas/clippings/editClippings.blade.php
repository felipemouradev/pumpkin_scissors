
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
              <h3 class='box-title'>Editando  clipping</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form action='/admin/clipping/atualizar' method='POST' enctype='multipart/form-data'>
              <div class='box-body'>
                <div class='form-group'>
                    <label for='exampleInput'>Data_clipping</label>
                    <input type='text' class='form-control' name='data_clipping' placeholder='Digite data_clipping' value='{{ $data->data_clipping }}'>
                </div>
                <div class='form-group'>
                    <label for='exampleInput'>Centimetragem</label>
                    <input type='text' class='form-control' name='centimetragem' placeholder='Digite centimetragem' value='{{ $data->centimetragem }}'>
                </div>
                <div class='form-group'>
                    <label for='exampleInput'>Type</label>
                    <input type='text' class='form-control' name='type' placeholder='Digite type' value='{{ $data->type }}'>
                </div>
                <div class='form-group'>
                    <label for='exampleInput'>Jornal_id</label>
                    <input type='text' class='form-control' name='jornal_id' placeholder='Digite jornal_id' value='{{ $data->jornal_id }}'>
                </div>
                <div class='form-group'>
                    <label for='exampleInput'>Editoria_id</label>
                    <input type='text' class='form-control' name='editoria_id' placeholder='Digite editoria_id' value='{{ $data->editoria_id }}'>
                </div>
                <div class='form-group'>
                    <label for='exampleInput'>Fonte_id</label>
                    <input type='text' class='form-control' name='fonte_id' placeholder='Digite fonte_id' value='{{ $data->fonte_id }}'>
                </div>
                <div class='form-group'>
                    <label for='exampleInput'>Status_id</label>
                    <input type='text' class='form-control' name='status_id' placeholder='Digite status_id' value='{{ $data->status_id }}'>
                </div>
                <div class='form-group'>
                    <label for='exampleInput'>Usuario_id</label>
                    <input type='text' class='form-control' name='usuario_id' placeholder='Digite usuario_id' value='{{ $data->usuario_id }}'>
                </div>
                <div class='form-group'>
                    <label for='exampleInput'>Cliente_id</label>
                    <input type='text' class='form-control' name='cliente_id' placeholder='Digite cliente_id' value='{{ $data->cliente_id }}'>
                </div><input type='hidden' value='{{ $data->clipping_id }}' name='clipping_id' >
              </div>
              <div class='box-footer'>
                <button type='submit' class='btn btn-primary'>Salvar</button>
              </div>
            </form>
          </div><!-- /.box -->
        </div>
        </div>
        @endsection