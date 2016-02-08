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
      <form action="/admin/clipping/savemail" method="post">
        <h3>Notícias</h3>
        @foreach ($data as $k )
        @if($k->type=="n")
        <input type="checkbox" value="{{$k->id.'@'.$k->cliente->id}}" name="compost[]"> #
        <a href="{{$k->file_image}}">{{ date('d/m/Y',strtotime($k->data_clipping))." - ".$k->jornal->nome." - ".$k->editoria->nome." - ".$k->fonte->nome." - ".$k->status->nome." - ".$k->centimetragem }}</a>
         - ({{ $k->cliente->nome }})
        <br>
        @endif
        @endforeach
        <div class='box-footer'>
          <button type='submit' class='btn btn-primary'>Salvar</button>
        </div>
      </form>
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
