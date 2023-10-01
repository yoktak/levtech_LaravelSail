<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index (Post $post) {
        // withCountメソッドでリレーション先を渡すことでbladeにて「$post->リレーション先_count」でリレーション先の合計数を表示可能に。
        $posts = $post->withCount('likes')->orderByDesc('updated_at')->get();
        return view('posts.index')->with([ 'posts' => $post->get() ]);
    }

    public function show (Post $post) {
        return view('posts.show')->with(['post' => $post ]);
    }

    public function create () {
        return view('posts.create');
    }

    public function store (Post $post, User $user, Request $request) {
        $input = $request['post'];
        $input['user_id'] = Auth::id();
        $post->fill($input)->save();
        return redirect('/posts/'. $post->id);
    }

    public function edit (Post $post) {
        return view('posts.edit')->with(['post' => $post]);
    }

    public function update (Post $post, User $user, Request $request) {
        $input = $request['post'];
        $input['user_id'] = Auth::id();
        $post->fill($input)->save();
        return redirect('/posts/'. $post->id);
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }
}
