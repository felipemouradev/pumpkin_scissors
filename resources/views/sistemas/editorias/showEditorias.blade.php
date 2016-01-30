@extends('admin-lte.dashboard')
@section('content')
<div class='row'>
  <div class='col-md-10'>
    <div class='box'>
      <div class='box-header'>
        <h3 class='box-title'>Editorias</h3>
      </div>
      <!-- /.box-header -->
      <div class='box-body'>
        <table class='table table-condensed'>
          <tbody>
          <tr>
            <th style='width: 10px'>Codigo</th>
            <th>Nome</th>
            <th>Jornal</th>
          </tr>
          <tr>
            <td>{{ $data->id }}</td>
            <td>{{ $data->nome }} </td>
            <td>{{ $data->jornal->name}}</td>
          </tr>
        </tbody></table>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>
@endsection
