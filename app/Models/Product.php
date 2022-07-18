<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $fillable = ['category_id', 'brand_id', 'image', 'sku','price', 'name', 'description'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function scopeFilter($query, array $filters){
       if($filters['search'] ?? false){
           $query->where('name', 'like', '%'. request('search'). '%')
           ->orWhere('description', 'like', '%'. request('search'). '%');
       }
    }
}
