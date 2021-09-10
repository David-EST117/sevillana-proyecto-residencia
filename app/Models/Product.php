<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nombre',
        'imagen',
        'descripcion',
        'department_id',
        'category_id',
        'price_id'
    ];

     public function price(){
      return $this->belongsTo(Price::class,'price_id');
    }
    public function category(){
      return $this->belongsTo(Category::class,'category_id');
    }
    public function department(){
      return $this->belongsTo(Department::class,'department_id');
    }
    public function warehouses(){
        return $this->hasMany(Warehouse::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }
}
