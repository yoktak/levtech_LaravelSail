<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;

class Like extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'user_id'];
}
