
  @extends('admin-lte.dashboard')
  @section('content')

  <div class='row'>
    <div class='col-md-10'>
    @if(Session::has('success'))
      <div class='alert alert-success'>
        {{ Session::get('success')}}
      </div>
    {{ Session::forget('success') }}
    @endif
    @if (Session::get('status'))
    <?php
      $erros = Session::get('status');

      //dd($erros);
      $count = 0;
    ?>
    <div class='alert alert-danger'>
    Ops! algo deu errado! veja abaixo o que aconteceu </br>
    @if(!is_array($erros)) {{ "# ".$erros }}
    @else
    @foreach ($erros as $level0)

      @if(!is_array($level0))
        {{ $level0 }}
      @else

      Clipping #{{ $count }}
        @foreach($level0 as $level1)
         <li>{{ $level1[key($level1)] }}</li>
        @endforeach
      @endif
      <?php $count++; ?>
    @endforeach
    @endif
    </div>
    {{ Session::forget('status') }}
    @endif
  <!-- general form elements -->
    <div class='box box-primary'>
      <div class='box-header with-border'>
        <h3 class='box-title'>Salvando clipping</h3>
      </div><!-- /.box-header -->
      <!-- form start -->
      <form action='/admin/clipping/criar' method='post'>
        <div class='box-body'>

          <div class="form-group">
            <label>Selecione um Cliente</label>
            <select name="cliente_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="0" aria-hidden="true">
              @foreach($clientes as $cliente)
              <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Numero de Clippings</label>
            <select name="num_clipping" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="0" aria-hidden="true">
              @for($i=1; $i<= 10; $i++)
              <option value="{{ $i }}">{{ $i }}</option>
              @endfor
            </select>
          </div>

          <div class="form-group">
            <label>Tipo Clipping</label>
            <select name="type" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="0" aria-hidden="true">

              <option value="n">Notícia</option>
              <option value="i">Informativo (ainda não funciona)</option>
              <option value="pb">Publicidade (ainda não funciona)</option>
              <option value="pp">Propaganda (ainda não funciona)</option>

            </select>
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
