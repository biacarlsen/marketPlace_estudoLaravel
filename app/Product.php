<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasSlug;
    
    protected $fillable = ['name', 'description', 'body', 'price', 'slug'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    // relacionamento de store com produtos (1:N)
    // produtos pertence a store
    public function store()
    {
        return $this->belongsTo(store::class);
    }

    // relacionamento de produtos com categorias (N:N)
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    // relacionamento: esse produto tem muitas imagens
    public function photos()
    {
        return $this->hasMany(ProductPhoto::class);
    }
}
