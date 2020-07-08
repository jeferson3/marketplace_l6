<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    protected $fillable = [
        'name', 'description', 'slug'
    ];
    use HasSlug;

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function product()
    {
        return $this->belongsToMany(Product::class); //relacionamento N:N,pertence a varios produtos
    }
}
