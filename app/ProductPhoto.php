<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    // campo que poderá ser atribuído um valor
    protected $fillable = ['image'];

    // relacionamento: essa imagem pertence a um produto
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
