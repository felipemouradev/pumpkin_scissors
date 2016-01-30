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
      <h3 class='box-title'>Lista de Assuntos</h3>
    </div>

    <div class='box-body .col-sm-12 table-responsive'>

        <table class='table table-bordered'>
          <tbody>
            <tr>
              <th style='width: 10px'>Código</th>
              <th>Nome</th>
              <th>Salvo por :</th>
              <th>Cliente</th>
              <th>Ações</th>
            </tr>
          </tbody>
          @foreach ($data as $k )
          <tr>
            <td>{{ $k->id }}</td>
            <td><a href='/admin/assunto/{{ $k->id }}'>{{ $k->nome }}</a></td>
            <td><a href='/admin/usuario/{{ $k->usuario->id }}'>{{ $k->usuario->login }}</a></td>
            <td><a href='/admin/cliente/{{ $k->cliente->id }}'>{{ $k->cliente->nome }}</a></td>
            <td>
                <a href='/admin/assunto/{{ $k->id }}'><span class='badge bg-green'>Ver</span></a>
                <a href='/admin/assunto/{{ $k->id }}/editar'><span class='badge bg-yellow'>Editar</span></a>
                <a href='/admin/assunto/{{ $k->id }}/deletar'><span class='badge bg-red'>Excluir</span></a>
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
