
        @extends('admin-lte.dashboard')
        @section('content')

        <div class='row'>
            <div class='col-md-10'>
        @if (Session::has('msgs'))
            <div class='alert alert-danger'>{{ Session::get('msgs') }}</div>
        {{ Session::forget('msgs') }}
        @endif
        <!-- general form elements -->
          <div class='box box-primary'>
            <div class='box-header with-border'>
              <h3 class='box-title'>Salvando produto</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form action='/admin/produto/salvar' method='POST' enctype='multipart/form-data'>
              <div class='box-body'>
                <div class='form-group'>
                    <label for='exampleInput'>FK_fornecedor</label>
                    <input type='text' class='form-control' name='FK_fornecedor' placeholder='Digite FK_fornecedor' value='{{ old('FK_fornecedor') }}'>
                </div>
                <div class='form-group'>
                    <label for='exampleInput'>Nome</label>
                    <input type='text' class='form-control' name='nome' placeholder='Digite nome' value='{{ old('nome') }}'>
                </div>
                <div class='form-group'>
                    <label for='exampleInput'>Codigo</label>
                    <input type='text' class='form-control' name='codigo' placeholder='Digite codigo' value='{{ old('codigo') }}'>
                </div>
                <div class='form-group'>
                    <label for='exampleInput'>Descricao</label>
                    <input type='text' class='form-control' name='descricao' placeholder='Digite descricao' value='{{ old('descricao') }}'>
                </div>
                <div class='form-group'>
                    <label for='exampleInput'>Valor_custo</label>
                    <input type='text' class='form-control' name='valor_custo' placeholder='Digite valor_custo' value='{{ old('valor_custo') }}'>
                </div>
                <div class='form-group'>
                    <label for='exampleInput'>Valor_final</label>
                    <input type='text' class='form-control' name='valor_final' placeholder='Digite valor_final' value='{{ old('valor_final') }}'>
                </div>
                <div class='form-group'>
                    <label for='exampleInput'>Quantidade</label>
                    <input type='text' class='form-control' name='quantidade' placeholder='Digite quantidade' value='{{ old('quantidade') }}'>
                </div>
              </div>
              <div class='box-footer'>
                <button type='submit' class='btn btn-primary'>Salvar</button>
              </div>
            </form>
          </div><!-- /.box -->
        </div>
        </div>
        @endsection
