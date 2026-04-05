<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Order;
use App\Models\Restaurant;

class Menu extends Model
{ 
    protected $fillable = [
    'name',
    'description',
    'price',
    'image',
    'category_id',
    'is_available',
];

protected $casts = [
    'price' => 'decimal:2',
    'is_available' => 'boolean',
];
    public function category()
{
    return $this->belongsTo(Category::class);
}

public function orders()
{
    return $this->belongsToMany(Order::class, 'order_items')
                ->withPivot('quantity', 'price');
}

 public function restaurant()
 {   return $this->belongsTo(Restaurant::class);}

}
