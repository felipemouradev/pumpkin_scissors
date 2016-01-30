@extends('admin-lte.loginPage')
@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Pumpkin Scissors - Clipping Digital</b></a>
  </div><!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Pumpkin Scissors</p>
    @if (Session::has('status'))
      <div class="alert alert-danger">{{ Session::get('status') }}</div>
      <?php Session::forget('status'); ?>
    @endif

    <form action="/auth/auth/" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Login" name="login" />
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Senha" name="password" />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
        </div><!-- /.col -->
      </div>
    </form>

  </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
@endsection
