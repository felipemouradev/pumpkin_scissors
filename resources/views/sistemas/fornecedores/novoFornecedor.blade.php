@extends('admin-lte.dashboard')
@section('content')

<div class='row'>
  <div class='col-md-10'>
  	@if (Session::has('msgs'))
  	    <div class="alert alert-danger">{{ Session::get('msgs') }}</div>
  	{{ Session::forget('msgs') }}
  	@endif
 	<!-- general form elements -->
	  <div class="box box-primary">
	    <div class="box-header with-border">
	      <h3 class="box-title">Novo Fornecedor</h3>
	    </div><!-- /.box-header -->
	    <!-- form start -->
	    <form action="/admin/fornecedores/salvar-novo-fornecedor" method="POST" enctype="multipart/form-data">
	      <div class="box-body">
			
	      	<div class="form-group">
	      	  <label for="exampleInput">Nome da empresa</label>
	      	  <input type="text" class="form-control" name="nome" placeholder="Nome da empresa" value="{{ old('nome') }}">
	      	</div>

	      	<div class="form-group">
	      	  <label for="exampleInput">CNPJ</label>
	      	  <input type="text" class="form-control" name="cnpj" placeholder="Cnpj da empresa" value="{{ old('cnpj') }}">
	      	</div>

	      	<div class="form-group">
	      	  <label for="exampleInput">Telefone</label>
	      	  <input type="text" class="form-control" name="telefone" placeholder="Telefone da empresa" value="{{ old('telefone') }}">
	      	</div>

	      	<div class="form-group">
	      	  <label for="exampleInput">E-mail</label>
	      	  <input type="text" class="form-control" name="email" placeholder="Email da empresa" value="{{ old('email') }}">
	      	</div>

	      </div><!-- /.box-body -->

	      <div class="box-footer">
	        <button type="submit" class="btn btn-primary">Salvar</button>
	      </div>
	    </form>
	  </div><!-- /.box -->	
  </div>
</div><!-- /.row -->

@endsection