<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    protected $table = 'status';
    protected $guarded = ["id"];

    // public function fornecedor(){
    //    return $this->belongsTo('App\Fornecedores', 'FK_fornecedor', 'PK_fornecedor');
    // }
}
