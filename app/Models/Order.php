<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\Menu;
use App\Models\OrderItem;

class Order extends Model
{
     protected $fillable = [
        'user_id',
        'restaurant_id',
        'total_price',
        'status',

        'full_name',
    'phone',
    'address',
    'city',
    'zip',
    'payment_method'
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
public function items()
{
    return $this->hasMany(OrderItem::class);
}
}
