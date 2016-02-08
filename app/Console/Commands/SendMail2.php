<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendMail2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendmail';

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
        $teste = "isso é um teste ".date('Y-m-d H:m:s')."\n";
        file_put_contents(public_path()."/teste".time().".txt",$teste.FILE_APPEND);
    }
}
