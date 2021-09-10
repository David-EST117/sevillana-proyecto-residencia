<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'mayoreo',
        'menudeo',
        'unitario',
        'oferta',
        'fecha_inicial',
        'fecha_final'
    ];
    public function products(){
        return $this->hasMany(Product::class);
    }
}
