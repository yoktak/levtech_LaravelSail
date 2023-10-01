<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Like;

use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = ['title','body', 'user_id'];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function likes () {
        return $this->hasMany(Like::class);
    }

    public function likeIs ($post) {
        $like = Like::where('post_id', $post->id)->where('user_id', Auth::id())->first();
        return $like;
    }
}
