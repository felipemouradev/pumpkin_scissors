
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
      @if (Session::has('status'))
      <?php
        $erros = Session::get('status');
        $count = 0;
      ?>
      <div class='alert alert-danger'>
      Ops! algo deu errado! veja abaixo o que aconteceu </br>
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
  </div>

  {{ Session::forget('status') }}
  @endif
  <!-- general form elements -->
    <div class='box box-primary'>
      <div class='box-header with-border'>
        <h3 class='box-title'>Salvando clipping</h3>
      </div><!-- /.box-header -->
      <!-- form start -->
      <form action='/admin/clipping/salvar' method='POST' enctype='multipart/form-data'>
        @for($i=0; $i< 3; $i++)
        <div class='box-body'>
          <div class="form-group">
            <label>Clipping #{{$i}}</label>
          </div>
          <div class="form-group">
            <label>Jornal/Editoria</label>
            <select name="assunto_id[]" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="0" aria-hidden="true">
              @foreach($assuntos as $assunto)
              <option value="{{ $assunto->id }}">{{ strtoupper($assunto->nome) }}</option>
              @endforeach
            </select>
          </div>
          <div class='form-group'>
              <label for='exampleInput'> OU Digite um Assunto: </label>
              <input type='text' class='form-control' name='assunto[]' placeholder='Digite um Assunto' value='{{ old('fonte_id') }}'>
          </div>

          <div class='form-group'>
              <label for='exampleInput'>Imagem Clipping</label>
              <input type='file' class='form-control' name='image_clipping[]' value='{{ old('image_perfil') }}'>
          </div>

          <div class='form-group'>
              <label for='exampleInput'>Arquivo Clipping <small>(.docx,.pdf) Se houver</small></label>
              <input type='file' class='form-control' name='archive[]' value='{{ old('image_perfil') }}'>
          </div>

          <input type="hidden" name="usuario_id[]" value="{{ Session::get('logado.0.id') }}">
          <input type="hidden" name="cliente_id[]" value="1">

        </div>
        @endfor
        <div class='box-footer'>
          <button type='submit' class='btn btn-primary'>Salvar</button>
        </div>
      </form>
    </div><!-- /.box -->
  </div>
  </div>
  @endsection
