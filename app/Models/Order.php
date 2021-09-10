<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'ruta',
        'fecha',
        'estatus',
        'user_id'
    ];

    public function user(){
      return $this->belongsTo(User::class,'user_id');
    }

    public function products(){
        return $this->belongsToMany(Product::class,'order_product','order_id','product_id')->withPivot('cantidad','monto')->withTimestamps();
    }
}
