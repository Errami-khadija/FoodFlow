<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    
}
