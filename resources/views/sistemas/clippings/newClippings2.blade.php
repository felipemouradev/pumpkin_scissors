
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
        <h3 class='box-title'>Salvando clipping</h3>
      </div><!-- /.box-header -->
      <!-- form start -->
      <form action='/admin/clipping/salvar' method='POST' enctype='multipart/form-data'>
        <div class='box-body'>
          <div class='form-group'>
              <label for='exampleInput'>Data_clipping</label>
              <input type='text' class='form-control' name='data_clipping' placeholder='Digite data_clipping' value='{{ old('data_clipping') }}'>
          </div>
          <div class='form-group'>
              <label for='exampleInput'>Centimetragem</label>
              <input type='text' class='form-control' name='centimetragem' placeholder='Digite centimetragem' value='{{ old('centimetragem') }}'>
          </div>
          <div class='form-group'>
              <label for='exampleInput'>Type</label>
              <input type='text' class='form-control' name='type' placeholder='Digite type' value='{{ old('type') }}'>
          </div>
          <div class='form-group'>
              <label for='exampleInput'>Jornal_id</label>
              <input type='text' class='form-control' name='jornal_id' placeholder='Digite jornal_id' value='{{ old('jornal_id') }}'>
          </div>
          <div class="form-group">
            <label>Jornal/Editoria</label>
            <select name="jornal_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="0" aria-hidden="true">
              @foreach($editorias as $editoria)
              <option value="{{ $editoria->id }}">{{ $editoria->jornal->nome." -> ".strtoupper($editoria->nome) }}</option>
              @endforeach
            </select>
          </div>
          <div class='form-group'>
              <label for='exampleInput'>Fonte_id</label>
              <input type='text' class='form-control' name='fonte_id' placeholder='Digite fonte_id' value='{{ old('fonte_id') }}'>
          </div>
          <div class='form-group'>
              <label for='exampleInput'>Status_id</label>
              <input type='text' class='form-control' name='status_id' placeholder='Digite status_id' value='{{ old('status_id') }}'>
          </div>
          <div class='form-group'>
              <label for='exampleInput'>Usuario_id</label>
              <input type='text' class='form-control' name='usuario_id' placeholder='Digite usuario_id' value='{{ old('usuario_id') }}'>
          </div>
          <div class='form-group'>
              <label for='exampleInput'>Cliente_id</label>
              <input type='text' class='form-control' name='cliente_id' placeholder='Digite cliente_id' value='{{ old('cliente_id') }}'>
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
