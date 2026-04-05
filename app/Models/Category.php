<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Order;
use App\Models\Menu;
use App\Models\Category;

class Category extends Model
{
     protected $fillable = [
        'name',
        'image', 
    ];

  public function menus()
{
    return $this->hasMany(Menu::class);
}

public function restaurant()
{
    return $this->belongsTo(Restaurant::class);
}
}
