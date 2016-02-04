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
              <th>Código</th>
              <th width="15%">Data</th>
              <th>Centimetragem</th>
              <th>Tipo</th>
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
          <td>{{ date('d/m/Y',strtotime($k->data_clipping)) }}</td>
          <td>{{ $k->centimetragem }}</td>
          <td>
            <?php
            switch($k->type) {
              case($k->type == "n") :
                echo "Notícia";
                  break;
              case($k->type == "i") :
                echo "Informativo";
                  break;
              case($k->type == "pb") :
                echo "Publicidade";
                  break;
              case($k->type == "pp") :
                echo "Propaganda";
                  break;
            } ?>
          </td>
          <td>{{ $k->jornal->nome }}</td>
          <td>{{ $k->editoria->nome }}</td>
          <td>{{ $k->fonte->nome }}</td>
          <td>{{ $k->status->nome }}</td>
          <td><a href='/admin/cliente/{{ $k->cliente->id }}'>{{ $k->cliente->nome }}</a></td>
          <td><a href='/admin/usuario/{{ $k->usuario->id }}'>{{ $k->usuario->nome }}</a></td>
          <td>
            <a href='/admin/clipping/{{ $k->id }}'><span class='badge bg-green'>Ver</span></a>
            <a href='/admin/clipping/{{ $k->id }}/editar'><span class='badge bg-yellow'>Editar</span></a>
            <a href='/admin/clipping/{{ $k->id }}/deletar'><span class='badge bg-red'>Excluir</span></a>
            <a href='/admin/clipping/{{ $k->id }}/send-clipping'><span class="badge bg-light-blue">Enviar</span>
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
