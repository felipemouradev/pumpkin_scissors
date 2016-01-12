<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;


class GeraForm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'geraform {path?} {tabela?} {name?}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function pegaColunasTabela($tabela){

        $cons = DB::getSchemaBuilder()->getColumnListing($tabela);


        return $cons;
    }

    public function montaShow ($tabela,$name) {
      $theme = "@extends('admin-lte.dashboard')
@section('content')
<div class='row'>
  <div class='col-md-10'>
    <div class='box'>
      <div class='box-header'>
        <h3 class='box-title'>".ucfirst($tabela)."</h3>
      </div>
      <!-- /.box-header -->
      <div class='box-body'>
        <table class='table table-condensed'>
          <tbody>
          <tr>";
            $shemas = $this->pegaColunasTabela($tabela);
            $count = count($shemas);
            $PK = $shemas[0];


            unset($shemas[$count-2]);
            unset($shemas[$count-1]);

            $count = 0;
            foreach($shemas as $k) :
              if ($count == 0):
                $theme .= "<th style='width: 10px'>Codigo</th>";
                $count++;
                continue;
              else :
              $theme .= "<th>".ucfirst($k)."</th>";
              endif;
            endforeach;
          $theme .= " </tr>";

          $data = "data";
          $k = "k";

          $theme .= "<tr>";

          foreach ($shemas as $valor) :

            $theme .= "<td>{{ $".$data."->".$valor." }} </td>";

          endforeach;


          $theme .= "</tr>";

        $theme .= "
        </tbody></table>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>
@endsection";

    return $theme;

    }

    public function montaIndex($tabela,$name) {

        $theme =
"@extends('admin-lte.dashboard')
@section('content')
<div class='row'>
  <div class='col-md-10'>
  @if (Session::has('msgs'))
     <div class='alert alert-danger'>{{ Session::get('msgs') }}</div>
  {{ Session::forget('msgs') }}
  @endif
  <div class='box'>
    <div class='box-header with-border'>
      <h3 class='box-title'>Lista de ".ucfirst($tabela)."</h3>
    </div>

    <div class='box-body .col-sm-12 table-responsive'>

        <table class='table table-bordered'>
          <tbody>
            <tr>";

        $arr1 = $this->pegaColunasTabela($tabela);
        $count = count($arr1);

        $PK = $arr1[0];


        unset($arr1[$count-2]);
        unset($arr1[$count-1]);

        $count = 0;

        foreach ($arr1 as $chave) :

        if ($count==0) :
            $theme .= "<th style='width: 10px'>Código</th>\n";
            $count++;
            continue;
        endif;

        $theme .= "<th>".ucfirst($chave)."</th>\n";

        $count++;

        endforeach;
        $theme .= "<th>Ações</th>";

        $theme .= "
        </tbody>";
        $data = "data";
        $k = "k";

        $theme.="
        @foreach ($".$data." as $".$k." )
            <tr>";
            $count = 0;
            foreach ($arr1 as $valor) :
                if($count==0) :
                    $theme .= "<td>{{ $".$k."->".$PK." }}</td>\n";
                    $count++;
                    continue;
                endif;
                if ($valor == "nome") :
                    $theme .= "<td><a href='/admin/{$name}/{{ $".$k."->".$PK." }}'>{{ $".$k."->".$valor." }}</a></td>\n";
                    continue;
                endif;
                $theme .= "<td>{{ $".$k."->".$valor." }}</td>\n";
            $count++;
            endforeach;
              $theme .= "
              <td>
                  <a href='/admin/{$name}/{{ $".$k."->{$PK} }}'><span class='badge bg-green'>Ver</span></a>
                  <a href='/admin/{$name}/{{ $".$k."->{$PK} }}/editar'><span class='badge bg-yellow'>Editar</span></a>
                  <a href='/admin/{$name}/{{ $".$k."->{$PK} }}/deletar'><span class='badge bg-red'>Excluir</span></a>

              </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <div class='box-footer clearfix'>
      <ul class='pagination pagination-sm no-margin pull-right'>
        {!! $".$data."->render() !!}
      </ul>
    </div>
  </div>
  </div>
</div><!-- /.row -->
@endsection";

    return $theme;

    }
    public function montaForm($op,$tabela,$name) {
        $data = "";
        if ($op == 1) :
            $action = "salvar";
            $h1 = "Salvando ".$name;
        else :
            $data = "data";
            $action = "atualizar";
            $h1 = "Editando  ".$name;
        endif;

        $theme = "
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
              <h3 class='box-title'>{$h1}</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form action='/admin/{$name}/{$action}' method='POST' enctype='multipart/form-data'>
              <div class='box-body'>";

        $arr1 = $this->pegaColunasTabela($tabela);
        $count = count($arr1);

        $PK = $count[0];

        unset($arr1[0]);
        unset($arr1[$count-2]);
        unset($arr1[$count-1]);

        foreach ($arr1 as $k) :

            if ($op==1) $var = "old('".$k."')";
            else $var = "$".$data."->".$k;
            $PK_ = "$".$data."->PK_".$name;

            $theme .= "
                <div class='form-group'>
                    <label for='exampleInput'>".ucfirst($k)."</label>
                    <input type='text' class='form-control' name='{$k}' placeholder='Digite {$k}' value='{{ ".$var." }}'>
                </div>";


        endforeach;

        if ($op==0) :
          $theme .= "<input type='hidden' value='{{ ".$PK_." }}' name='PK_".$name."' >";
        endif;

        $theme .= "
              </div>
              <div class='box-footer'>
                <button type='submit' class='btn btn-primary'>Salvar</button>
              </div>
            </form>
          </div><!-- /.box -->
        </div>
        </div>
        @endsection";

        return $theme;
    }

    public function handle()
    {
        //$value = $this->option('nome');
        $dir = base_path()."/resources/views/";

        $tabela = $this->argument('tabela');
        $path = $this->argument('path');
        $name = $this->argument('name');

        //dd($this->pegaColunasTabela($tabela));

        $absoluteDir = $dir.$path;

        if (!is_dir($absoluteDir)) :
            mkdir($absoluteDir);
        endif;

        $theme1 = $this->montaForm($op=1,$tabela,$name);
        $theme2 = $this->montaForm($op=0,$tabela,$name);
        $index = $this->montaIndex($tabela,$name);
        $show = $this->montaShow($tabela,$name);

        if(file_put_contents($absoluteDir."new".ucfirst($tabela).".blade.php", $theme1) &&
            file_put_contents($absoluteDir."edit".ucfirst($tabela).".blade.php", $theme2) &&
            file_put_contents($absoluteDir."list".ucfirst($tabela).".blade.php", $index) &&
            file_put_contents($absoluteDir."show".ucfirst($tabela).".blade.php", $show ) ){
            $this->info("OK... Arquivos gerados");
        } else {
            $this->info("Deu merda");
        }
        //$this->info("Hello {$value}!");
    }
}
