<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carrito extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'product_id',
        'quantity'
    ];

    /**
     * Relación con el modelo Product
     */
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
