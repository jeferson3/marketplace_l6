<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model //procura por uma tabela chamada products
{
    // protected $table = 'NomeDaTabela'; //aqui pode mudar o nome da tabela ao qual o model está associado;
    protected $fillable = ['name', 'description', 'price', 'slug', 'body'];


    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function categorie()
    {
        return $this->belongsToMany(Category::class);  //relacionamento N:N, pertence a varias categorias
    }

}
