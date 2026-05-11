<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Restaurant;

class Review extends Model
{
    protected $fillable = ['name', 'email', 'rating', 'comment'];

    public function restaurant()
{
    return $this->belongsTo(Restaurant::class);
}
}
