@extends('admin-lte.dashboard')
@section('content')
<div class='row'>
  <div class='col-md-10'>
  @if (Session::has('msgs'))
     <div class='alert alert-danger'>{{ Session::get('msgs') }}</div>
  {{ Session::forget('msgs') }}
  @endif
  <div class='box'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Lista de Produtos</h3>
    </div>

    <div class='box-body .col-sm-12 table-responsive'>

        <table class='table table-bordered'>
          <tbody>
            <tr>
              <th style='width: 10px'>Código</th>
              <th>Fornecedor</th>
              <th>Nome</th>
              <th>Codigo</th>
              <th>Descricao</th>
              <th>Valor_custo</th>
              <th>Valor_final</th>
              <th>Quantidade</th>
              <th>Ações</th>
        </tbody>
        @foreach ($data as $k )
        <tr>
          <td>{{ $k->PK_produto }}</td>
          <td>{{ $k->fornecedor->nome }}</td>
          <td><a href='/admin/produto/{{ $k->PK_produto }}'>{{ $k->nome }}</a></td>
          <td>{{ $k->codigo }}</td>
          <td>{{ $k->descricao }}</td>
          <td>{{ $k->valor_custo }}</td>
          <td>{{ $k->valor_final }}</td>
          <td>{{ $k->quantidade }}</td>
          <td>
              <a href='/admin/produto/{{ $k->PK_produto }}'><span class='badge bg-green'>Ver</span></a>
              <a href='/admin/produto/{{ $k->PK_produto }}/editar'><span class='badge bg-yellow'>Editar</span></a>
              <a href='/admin/produto/{{ $k->PK_produto }}/deletar'><span class='badge bg-red'>Excluir</span></a>
          </td>
      </tr>
        @endforeach
      </table>
    </div>

    <div class='box-footer clearfix'>
      <ul class='pagination pagination-sm no-margin pull-right'>
        {!! $data->render() !!}
      </ul>
    </div>
  </div>
  </div>
</div><!-- /.row -->
@endsection
