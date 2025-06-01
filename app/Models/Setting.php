<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'icon',
        'url_twitter',
        'url_facebook',
        'url_whatsapp',
        'email',
        'phone',
        'address',
        'title',
    ];
}
