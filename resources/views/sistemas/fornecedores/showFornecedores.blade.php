@extends('admin-lte.dashboard')
@section('content')
<div class='row'>  
  <div class='col-md-10'>
    <div class='box'>
      <div class='box-header'>
        <h3 class='box-title'>Fornecedores</h3>
      </div>
      <!-- /.box-header -->
      <div class='box-body'>
        <table class='table table-condensed table-hover'>
          <tbody>
          <tr>
            <th style='width: 10px'>Codigo</th>
            <th>nome</th>
            <th>cnpj</th>
            <th>telefone</th>
            <th>email</th> 
          </tr>
          <tr>
             
            <td>{{ $data->PK_fornecedor }} </td>
            <td>{{ $data->nome }} </td>
            <td>{{ $data->cnpj }} </td>
            <td>{{ $data->telefone }} </td>
            <td>{{ $data->email }} </td>
            
          </tr>
        </tbody></table>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>
@endsection