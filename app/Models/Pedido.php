<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pedido extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'total_price',
        'status',
        'delivery_date',
        'created_at',
        'updated_at'
    ];
    

    public function usuarios(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'user_id');
    }
    

    public function productos(): BelongsToMany
    {
        return $this->belongsToMany(Producto::class, 'order_product', 'order_id', 'product_id')->withPivot('quantity');
    }
}