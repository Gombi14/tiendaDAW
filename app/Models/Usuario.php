<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name',
        'password',
        'surname',
        'phone',
        'email',
        'address',
        'role'
    ];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'user_id');
    }
}
