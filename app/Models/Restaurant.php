<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Order;
use App\Models\Menu;
use App\Models\Category;

class Restaurant extends Model
{   use HasFactory;

    protected $fillable = [
       'user_id', 'name', 'cuisine_type', 'rating', 'description', 
    'phone', 'address', 'city', 'is_approved'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }  

    public function orders()
{
    return $this->hasMany(Order::class);
}

public function menus()
{
    return $this->hasMany(Menu::class);
}

public function categories()
{
    return $this->hasMany(Category::class);

}
}
