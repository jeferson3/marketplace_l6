<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model //procura por uma tabela chamada stores
{
    // protected $table = 'NomeDaTabela'; //aqui pode mudar o nome da tabela ao qual o model está associado;

    protected $fillable = [
        'name', 'description', 'phone','moble_phone','slug'
    ];

    public function user(){
        return $this->belongsTo(User::class); //relacionamento, uma loja pertence a um user
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }

}
