<?php
// detalhes do banco - relacionamentos:
// 1:1 - Um pra um (usuario e loja) | hasOne e belongsTo
// 1:N - um pra muito (loja e produtos) | hasMany e belongsTo
// N:N - mtos pra mtos (produtos e categorias) | belongsToMany

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // CASTS - remove campos específicos das colletions
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // CASTS - converte valores para uma coluna específica
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // Relacionamento de user com store(1:1)
    // nao precisa importar pq está dentro do mesmo namespace
    public function store()
    {
        return $this->hasOne(Store::class);
    }
}
