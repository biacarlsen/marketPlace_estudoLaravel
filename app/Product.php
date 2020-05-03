<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'body', 'price', 'slug'];


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
}
