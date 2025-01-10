<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // Trong mô hình Category.php
public function newsItems()
{
    return $this->hasMany(News::class)->where('status', 1)->where('show_at_popular', 1)->orderBy('id', 'DESC');
}

}
