<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function thumbnail()
    {
        return $this->belongsTo(Image::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
