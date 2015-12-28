@extends('admin-lte.dashboard')
@section('content')
<div class='row'>
  <div class='col-md-10'>
  @if (Session::has('msgs'))
     <div class="alert alert-danger">{{ Session::get('msgs') }}</div>
  {{ Session::forget('msgs') }}
  @endif
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Lista de Fornecedores</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body .col-sm-12 table-responsive">

      <!-- <div class="table-responsive"> -->
        <table class="table table-bordered">
          <tbody>
            <tr>
              <th style="width: 10px">Código</th>
              <th>Empresa</th>
              <th>CNPJ</th>
              <th>Telefone</th>
              <th>E-mail</th>
              <th>Ações</th>
            </tr>
            @foreach ($fornecedores as $fornecedor)
            <tr>
              <td>{{ $fornecedor->PK_fornecedor }}</td>
              <td><a href="/admin/fornecedores/{{ $fornecedor->PK_fornecedor }}">{{ $fornecedor->nome }}</a></td>
              <td>{{ $fornecedor->cnpj }}</td>
              <td>{{ $fornecedor->telefone }}</td>
              <td>{{ $fornecedor->email }}</td>
              <td>

                  <a href="/admin/fornecedores/{{ $fornecedor->PK_fornecedor }}"><span class="badge bg-green">Ver</span></a>

                  <a href="/admin/fornecedores/{{ $fornecedor->PK_fornecedor }}/editar"><span class="badge bg-yellow">Editar</span></a>
      
                  <a href="/admin/fornecedores/{{ $fornecedor->PK_fornecedor }}/deletar"><span class="badge bg-red">Excluir</span></a>
                
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      <!-- </div> -->

    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
      <ul class="pagination pagination-sm no-margin pull-right">
        {!! $fornecedores->render() !!}
      </ul>
    </div>
  </div>
  </div>
</div><!-- /.row -->
@endsection