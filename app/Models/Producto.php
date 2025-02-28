<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'featured',
        'category_id',
        'active'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'category_id');
    }

    public function pedido()
    {
        return $this->belongsToMany(Pedido::class, 'order_product', 'product_id', 'order_id')->withPivot('quantity');
    }

}
