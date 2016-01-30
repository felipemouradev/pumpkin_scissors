@extends('admin-lte.dashboard')
@section('content')
<div class='row'>
  <div class='col-md-10'>
    <div class="box box-primary">
      <div class="box-body box-profile">
        @if(!empty($data->image_perfil))
        <img class="profile-user-img img-responsive img-circle" src="{{asset($data->image_perfil)}}" alt="User profile picture">
        @else
        <img class="profile-user-img img-responsive img-circle" src="{{asset("/bower_components/admin-lte/dist/img/avatar04.png")}}" alt="User profile picture">
        @endif
        <h3 class="profile-username text-center">{{ $data->nome}}</h3>
        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>Email</b> <a class="pull-right">{{ $data->email }}</a>
          </li>
          <li class="list-group-item">
            <b>Login</b> <a class="pull-right">{{ $data->login }}</a>
          </li>
          <li class="list-group-item">
            <b>Cadastro em: </b> <a class="pull-right">{{ $data->created_at }}</a>
          </li>
        </ul>

        <a href="/admin/usuario/{{$data->id}}/editar" class="btn btn-primary btn-block"><b>Editar</b></a>
      </div>
    </div>
  </div>
</div>
@endsection
