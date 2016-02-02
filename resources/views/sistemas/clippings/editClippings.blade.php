
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
              <h3 class='box-title'>Editando  clipping</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form action='/admin/clipping/atualizar' method='POST' enctype='multipart/form-data'>
              <div class='box-body'>
                <div class='form-group'>
                    <label for='exampleInput'><h2>Cliente: </label>
                    <small>{{ $data->cliente->nome }}</small></h2>
                </div>
                <div class='form-group'>
                    <label for='exampleInput'>Data</label>
                    <input type='text' class='form-control' name='data_clipping' placeholder='Digite data_clipping' value='{{ $data->data_clipping }}'>
                </div>

                <div class="form-group">
                  <label>Tipo Clipping</label>
                  <select name="type" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="0" aria-hidden="true">
                    <option value="n" @if($data->type == "nn") selected @endif>Notícia</option>
                    <option value="i" @if($data->type == "i") selected @endif>Informativo (ainda não funciona)</option>
                    <option value="pb" @if($data->type == "pb") selected @endif>Publicidade (ainda não funciona)</option>
                    <option value="pp" @if($data->type == "pp") selected @endif>Propaganda (ainda não funciona)</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Jornal/Editoria</label>
                  <select name="editoria_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="0" aria-hidden="true">
                    @foreach($editorias as $editoria)
                      <option value="{{ $editoria->id }}" @if($data->editoria_id == $editoria->id) {{ 'selected' }} @endif>{{ $editoria->jornal->nome." -> ".$editoria->nome }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Fonte</label>
                  <select name="fonte_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="0" aria-hidden="true">
                    @foreach($fontes as $fonte)
                      <option value="{{ $fonte->id }}" @if($data->fonte_id == $fonte->id) {{ 'selected' }} @endif>{{ $fonte->nome }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Status</label>
                  <select name="status_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="0" aria-hidden="true">
                    @foreach($status as $s)
                      <option value="{{ $s->id }}" @if($data->status_id == $s->id) {{ 'selected' }} @endif>{{ $s->nome }}</option>
                    @endforeach
                  </select>
                </div>

                <div class='form-group'>
                    <label for='exampleInput'>Centimetragem</label>
                    <input type='text' class='form-control' name='centimetragem' placeholder='Digite centimetragem' value='{{ $data->centimetragem }}'>
                </div>
                <input type='hidden' value='{{ $data->id }}' name='id' >
                <input type='hidden' value='{{ $data->cliente->id }}' name='cliente_id' >
                <input type='hidden' value='{{ Session::get('logado.0.id') }}' name='usuario_id' >

              </div>
              <div class='box-footer'>
                <button type='submit' class='btn btn-primary'>Salvar</button>
              </div>
            </form>
          </div><!-- /.box -->
        </div>
        </div>
        @endsection
