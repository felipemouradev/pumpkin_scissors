@extends('admin-lte.dashboard')
@section('content')
<div class='row'>
  <div class='col-md-10'>
    <div class='box'>
      <div class='box-header'>
        <h3 class='box-title'>Usuarios</h3>
      </div>
      <!-- /.box-header -->
      <div class='box-body'>
        <table class='table table-condensed'>
          <tbody>
          <tr>
            <th style='width: 10px'>Codigo</th>
            <th>Nome</th>
            <th>Login</th>
            <th>Senha</th>
            <th>Email</th>
            <th>Image_perfil</th>
            <th>FlAtivo</th>
          </tr>
            <tr>
              <td>{{ $data->id }} </td>
              <td>{{ $data->nome }} </td>
              <td>{{ $data->login }} </td>
              <td>{{ $data->senha }} </td>
              <td>{{ $data->email }} </td>
              <td><img src="{!! $data->image_perfil !!}" /> </td>
              <td>{{ $data->flAtivo }} </td>
            </tr>
        </tbody>
      </table>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>
@endsection
