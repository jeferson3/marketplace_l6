<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model //procura por uma tabela chamada products
{
    // protected $table = 'NomeDaTabela'; //aqui pode mudar o nome da tabela ao qual o model está associado;
    protected $fillable = ['name', 'description', 'price', 'slug', 'body'];

    use HasSlug;

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function category()
    {
        return $this->belongsToMany(Category::class);  //relacionamento N:N, pertence a varias categorias
    }
    public function photo()
    {
        return $this->hasMany(ProductPhoto::class);
    }

}
