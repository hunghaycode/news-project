<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    public function scopeActiveEntries($query)
    {
        return $query->where([
            'status' => 1
     
        ]);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'news_tag');
    }
    public function author()
    {
        return $this->belongsTo(Admin::class);
    } 
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
