<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisplaySetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_display_one',
        'category_display_two',
        'category_display_three',
    ];
}


