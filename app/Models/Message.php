<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Message extends Model
{
    use HasFactory;

    protected $guarded = ['id']; // ブラックリスト方式('id'以外のカラムはcreateを許可する)
    protected $table = "messages";

    public function user () {
        return $this->belongsTo(User::class);
    }
}
