<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    public $table = 'listings';
    
    protected $fillable = [
        'name', 'longitude', 'latitude', 'user_id',
    ];
}
