@extends('admin-lte.dashboard')
@section('content')
<div class='row'>
  <div class='col-md-10'>
    <div class='box'>
      <div class='box-header'>
        <h3 class='box-title'>Clippings</h3>
      </div>
      <!-- /.box-header -->
      <div class='box-body'>
        <table class='table table-condensed'>
          <tbody>
          <tr>
            <th style='width: 10px'>Codigo</th>
            <th>Assunto</th>
            <th>Tipo</th>
            <th>Clipping</th>
          </tr>

          <tr>
            <td>{{ $data->id }}</td>
            <td>{{ $data->assunto->nome }} </td>
            <td>
              <?php
              switch($data->type) {
                case($data->type == "n") :
                  echo "Notícia";
                    break;
                case($data->type == "i") :
                  echo "Informativo";
                    break;
                case($data->type == "pb") :
                  echo "Publicidade";
                    break;
                case($data->type == "pp") :
                  echo "Propaganda";
                    break;
              } ?>
            </td>
            <td><a href="{{$data->file_image}}">{{
              date("d.m.y",strtotime($data->data_clipping))." - ".$data->jornal->nome." - " .$data->editoria->nome." - ".
              $data->fonte->nome." - ".$data->status->nome." - ".$data->centimetragem
            }}</a></td>

          </tr>
        </tbody>
      </table>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>
@endsection
