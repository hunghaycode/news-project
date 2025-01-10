<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
    'ad_header',
        'ad_header_status',
        'ad_sidebar',
        'ad_sidebar_status',
        'ad_main',
        'ad_main_status',
        'ad_herder_url',
        'ad_sidebar_url',
        'ad_main_url',
    ];
}
