<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';

    public function comprador(): BelongsTo
    {
        return $this->belongsTo(Comprador::class);
    }
}
