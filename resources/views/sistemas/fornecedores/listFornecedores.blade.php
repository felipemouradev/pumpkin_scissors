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
      <h3 class='box-title'>Lista de Fornecedores</h3>
    </div>

    <div class='box-body .col-sm-12 table-responsive'>

        <table class='table table-bordered'>
          <tbody>
            <tr><th style='width: 10px'>Código</th>
<th>Nome</th>
<th>Cnpj</th>
<th>Telefone</th>
<th>Email</th>
<th>Ações</th>
        </tbody>
        @foreach ($data as $k )
            <tr><td>{{ $k->PK_fornecedor }}</td>
<td><a href='/admin/fornecedor/{{ $k->PK_fornecedor }}'>{{ $k->nome }}</a></td>
<td>{{ $k->cnpj }}</td>
<td>{{ $k->telefone }}</td>
<td>{{ $k->email }}</td>

              <td>
                  <a href='/admin/fornecedor/{{ $k->PK_fornecedor }}'><span class='badge bg-green'>Ver</span></a>
                  <a href='/admin/fornecedor/{{ $k->PK_fornecedor }}/editar'><span class='badge bg-yellow'>Editar</span></a>
                  <a href='/admin/fornecedor/{{ $k->PK_fornecedor }}/deletar'><span class='badge bg-red'>Excluir</span></a>
                
              </td>
            </tr>
            @endforeach
        </tbody>
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