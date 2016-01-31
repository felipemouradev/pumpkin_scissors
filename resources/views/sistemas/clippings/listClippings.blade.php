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
      <h3 class='box-title'>Lista de Clippings</h3>
    </div>

    <div class='box-body .col-sm-12 table-responsive'>

        <table class='table table-bordered'>
          <tbody>
            <tr>
              <th style='width: 10px'>Código</th>
              <th>Data_clipping</th>
              <th>Centimetragem</th>
              <th>Type</th>
              <th>Jornal</th>
              <th>Editoria</th>
              <th>Fonte</th>
              <th>Status</th>
              <th>Cliente</th>
              <th>Salvo por: </th>
              <th>Ações</th>
            </tr>
        </tbody>
        @foreach ($data as $k )
        <tr>
          <td>{{ $k->id }}</td>
          <td>{{ $k->data_clipping }}</td>
          <td>{{ $k->centimetragem }}</td>
          <td>{{ $k->type }}</td>
          <td>{{ $k->jornal_id }}</td>
          <td>{{ $k->editoria->nome }}</td>
          <td>{{ $k->fonte->nome }}</td>
          <td>{{ $k->status->nome }}</td>
          <td>{{ $k->cliente->nome }}</td>
          <td>{{ $k->usuario->nome }}</td>
          <td>
            <a href='/admin/clipping/{{ $k->id }}'><span class='badge bg-green'>Ver</span></a>
            <a href='/admin/clipping/{{ $k->id }}/editar'><span class='badge bg-yellow'>Editar</span></a>
            <a href='/admin/clipping/{{ $k->id }}/deletar'><span class='badge bg-red'>Excluir</span></a>
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
