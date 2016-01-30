
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
              <h3 class='box-title'>Salvando editoria</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form action='/admin/editoria/salvar' method='POST' enctype='multipart/form-data'>
              <div class='box-body'>
                <div class="form-group">
                  <label>Jornal</label>
                  <select name="jornal_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="0" aria-hidden="true">
                    @foreach($jornais as $jornal)
                    <option value="{{ $jornal->id }}">{{ $jornal->nome }}</option>
                    @endforeach
                  </select>
                </div>
                <div class='form-group'>
                    <label for='exampleInput'>Nome</label>
                    <input type='text' class='form-control' name='nome' placeholder='Digite nome' value='{{ old('nome') }}'>
                </div>
              </div>
              <div class='box-footer'>
                <button type='submit' class='btn btn-primary'>Salvar</button>
              </div>
            </form>
          </div><!-- /.box -->
        </div>
        </div>
        @endsection
