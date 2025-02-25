<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'active'];   
    public function productos(): HasMany
    {
        return $this->hasMany(Producto::class);
    }
}
