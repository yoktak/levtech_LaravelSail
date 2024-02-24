<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index (Post $post, Request $request) {
        // withCountメソッドでリレーション先を渡すことでbladeにて「$post->リレーション先_count」でリレーション先の合計数を表示可能に。
        // $posts = $post->withCount('likes')->orderByDesc('updated_at')->get();

        $posts = $post->orderBy('created_at','DESC')->get();

        // 検索機能
        $keyword = $request["keyword"];
        if($keyword){
            $posts = $post->where('title','LIKE',"%{$keyword}%")
                ->orwhere('body','LIKE',"%{$keyword}%")->orderBy('created_at','DESC')->get();
        }
        return view('posts.index')->with([ 'posts' => $posts ]);
    }

    public function store (Post $post, User $user, Request $request) {
        $input = $request['post'];
        $input['user_id'] = Auth::id();
        $post->fill($input)->save();
        return redirect('/posts/'. $post->id);
    }

    public function update (Post $post, User $user, Request $request) {
        $input = $request['post'];
        $input['user_id'] = Auth::id();
        $post->fill($input)->save();
        return back();
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }
}
