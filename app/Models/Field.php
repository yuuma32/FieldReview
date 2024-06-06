<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'post',
        'address',
        'tel',
        'url',
        'image',
        'detail',
        'created_at',
        'updated_at',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'reviews');
    }
}
