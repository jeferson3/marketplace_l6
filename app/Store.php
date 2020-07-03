<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model //procura por uma tabela chamada stores
{
    // protected $table = 'NomeDaTabela'; //aqui pode mudar o nome da tabela ao qual o model está associado;



    public function user(){
        return $this->belongsTo(User::class); //relacionamento, uma loja pertence a um user
    }

}
