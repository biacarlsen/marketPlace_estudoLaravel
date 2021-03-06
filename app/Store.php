<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Store extends Model
{
    use HasSlug;
    
    protected $fillable = ['name', 'description', 'phone', 'mobile_phone', 'slug', 'logo'];

    // se eu quiser chamar um nome de tabela diferente do plural do nome do model,
    // preciso setar uma variável protegida assim:
    // protected $table = 'lojas'

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    // relacionamento de store com user(1:1)
    // uma store pertence a um user
    public function user()
    {
        $this->belongsTo(User::class);
    }

    // relacionamento de store com produtos (1:N)
    // store tem muitos produtos
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
