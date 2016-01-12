@extends('admin-lte.dashboard')
@section('content')
<div class='row'>
  <div class='col-md-10'>
    <div class='box'>
      <div class='box-header'>
        <h3 class='box-title'>Produtos</h3>
      </div>
      <!-- /.box-header -->
      <div class='box-body'>
        <table class='table table-condensed'>
          <tbody>
          <tr>
            <th style='width: 10px'>Codigo</th>
            <th>Fornecedor</th>
            <th>Nome</th>
            <th>Codigo</th>
            <th>Descricao</th>
            <th>Valor_custo</th>
            <th>Valor_final</th>
            <th>Quantidade</th>
        </tr>
        <tr>
          <td>{{ $data->PK_produto }} </td>
          <td>{{ $data->fornecedor->nome }} </td>
          <td>{{ $data->nome }} </td>
          <td>{{ $data->codigo }} </td>
          <td>{{ $data->descricao }} </td>
          <td>{{ $data->valor_custo }} </td>
          <td>{{ $data->valor_final }} </td>
          <td>{{ $data->quantidade }} </td>
        </tr>
        </tbody></table>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>
@endsection
