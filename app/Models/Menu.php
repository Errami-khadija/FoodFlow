<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
