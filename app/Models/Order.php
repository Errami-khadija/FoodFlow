<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\Menu;

class Order extends Model
{
     protected $fillable = [
        'user_id',
        'restaurant_id',
        'total_price',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function menus()
{
    return $this->belongsToMany(Menu::class, 'order_items')
                ->withPivot('quantity', 'price');
}
}
