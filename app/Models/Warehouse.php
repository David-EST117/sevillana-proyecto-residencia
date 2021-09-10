<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'stock',
        'fecha',
        'monto',
        'product_id',
        'provider_id'
    ];

    public function product(){
      return $this->belongsTo(Product::class,'product_id');
    }
     public function provider(){
      return $this->belongsTo(Provider::class,'provider_id');
    }

}
