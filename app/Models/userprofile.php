<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userprofile extends Model
{
    use HasFactory;
    protected $fillable = [
        'marks1', 'marks2', 'marks3', 'marks4','avg','status'
    ];
}
