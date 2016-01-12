<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Permissoes as Perm;

class Permissoes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permissoes {name?}';

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

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $routeCollection = Route::getRoutes();
        $data = array();

        foreach ($routeCollection as $routes) {

            if ($routes->getActionName() != "Closure") {
                
                $rota = $routes->getActionName();
                $data = array();
                $exp = explode('\\',$rota);

                $rota = $exp[3];

                $data['rota'] = $rota;

                $exp2 = explode("@",$exp[3]);

                $controller = $exp2[0];
                $action = $exp2[1];

                $exp3 = explode('Controller',$controller);

                $nome = $exp3[0];

                $data['nome'] = $nome;

                //dd(ngettext($data['nome']));
                
                $data['descricao'] = ucfirst($action)." ".$nome;

                if ( $action=="criar" || $action=="listar" ){
                    
                    $data['display'] = 1;
                    if ($action == "criar") $data['descricao'] = "Novo ".$nome;

                }

                $isExist = Perm::where('rota',$data['rota'])->count();
                if ($isExist==0) {
                    $perm = Perm::create($data); 

                    if (!$perm) echo "erro ao salvar ".$data['descricao']."\n";
                    else echo "\nSalvo ".$data['descricao'];            
                } else {
                    echo "rota ".$data['rota']." já foi salva em outro momento\n";
                }
            }
            
        }

       // return var_dump($data);
    }
}
