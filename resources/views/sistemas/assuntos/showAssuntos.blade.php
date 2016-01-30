@extends('admin-lte.dashboard')
@section('content')
<div class='row'>
  <div class='col-md-10'>
    <div class='box'>
      <div class='box-header'>
        <h3 class='box-title'>Assuntos</h3>
      </div>
      <!-- /.box-header -->
      <div class='box-body'>
        <table class='table table-condensed'>
          <tbody>
          <tr>
            <th style='width: 10px'>Codigo</th>
            <th>Nome</th>
            <th>Salvo por: </th>
            <th>Cliente</th>
          </tr>
          <tr>
            <td>{{ $data->id }}</td>
            <td>{{ $data->nome }}</td>
            <td>{{ $data->usuario->login }}</td>
            <td>{{ $data->cliente->nome }}</td>
          </tr>
        </tbody></table>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>
@endsection
