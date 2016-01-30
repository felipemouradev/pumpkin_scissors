
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
      <h3 class='box-title'>Editando  assunto</h3>
    </div><!-- /.box-header -->
    <!-- form start -->
    <form action='/admin/assunto/atualizar' method='POST' enctype='multipart/form-data'>
      <div class='box-body'>

        <div class="form-group">
          <label>Cliente</label>
          <select name="cliente_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="0" aria-hidden="true">
            @foreach($clientes as $cliente)
            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
            @endforeach
          </select>
        </div>

        <div class='form-group'>
            <label for='exampleInput'>Nome</label>
            <input type='text' class='form-control' name='nome' placeholder='Digite nome' value='{{ $data->nome }}'>
        </div>

        <input type="hidden" name="usuario_id" value="{{ Session::get('logado.0.id') }}">
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
