<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Store extends Model //procura por uma tabela chamada stores
{
    // protected $table = 'NomeDaTabela'; //aqui pode mudar o nome da tabela ao qual o model está associado;

    
    protected $fillable = [
        'name', 'description', 'phone','mobile_phone','slug', 'logo'
    ];
    
    use HasSlug;

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function user(){
        return $this->belongsTo(User::class); //relacionamento, uma loja pertence a um user
    }
    
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
