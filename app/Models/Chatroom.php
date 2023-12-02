<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Chatroom extends Model
{
    use HasFactory;

    public function users () {
        return $this->belongsToMany(User::class);
    }

    public function partner () {
        $partner = $this->users->where('id', '<>', Auth::id())->first();

        return $partner;
    }
}
