<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    //

    protected $primaryKey = 'PK_produto';
    protected $guarded = ["PK_produto"];

    public function fornecedor(){
       return $this->belongsTo('App\Fornecedores', 'FK_fornecedor', 'PK_fornecedor');
    }
}
