@extends('admin-lte.dashboard')
@section('content')
<div class='row'>
  <div class='col-md-10'>
    <div class='box'>
      <div class='box-header'>
        <h3 class='box-title'>Clippings</h3>
      </div>
      <!-- /.box-header -->
      <div class='box-body'>
        <table class='table table-condensed'>
          <tbody>
          <tr><th style='width: 10px'>Codigo</th><th>Data_clipping</th><th>Centimetragem</th><th>Type</th><th>Jornal_id</th><th>Editoria_id</th><th>Fonte_id</th><th>Status_id</th><th>Usuario_id</th><th>Cliente_id</th> </tr><tr><td>{{ $data->id }} </td><td>{{ $data->data_clipping }} </td><td>{{ $data->centimetragem }} </td><td>{{ $data->type }} </td><td>{{ $data->jornal_id }} </td><td>{{ $data->editoria_id }} </td><td>{{ $data->fonte_id }} </td><td>{{ $data->status_id }} </td><td>{{ $data->usuario_id }} </td><td>{{ $data->cliente_id }} </td></tr>
        </tbody></table>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>
@endsection