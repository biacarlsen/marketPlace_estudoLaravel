<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description', 'slug'];

    
    // relacionamento de categorias com produtos (N:N)
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
