<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedores extends Model
{
    //
    protected $primaryKey = 'PK_fornecedor';
    protected $guarded = ['PK_fornecedor'];
}
