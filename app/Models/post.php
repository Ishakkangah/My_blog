<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug' , 'body', 'category_id', 'thumbnail'];
    protected $with = ['author', 'tags', 'category'];


    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function getTakeImageAttribute()
    {
        return "/storage/" . $this->thumbnail;
    }
    
    public function tags()
    {
        return $this->belongsToMany(tag::class);
    }


    public function author()
    {
        return $this->belongsTo(user::class, 'user_id');
    }
}
