<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index (Post $post) {
        return view('posts.index')->with(['posts' => $post->get()]);
    }

    public function show (Post $post) {
        return view('posts.show')->with(['post' => $post ]);
    }

    public function create () {
        return view('posts.create');
    }

    public function store (Post $post, User $user, Request $request) {
        $input = $request['post'];
        $input['user_id'] = 1;
        $post->fill($input)->save();
        return redirect('/posts/'. $post->id);
    }

    public function edit (Post $post) {
        return view('posts.edit')->with(['post' => $post]);
    }

    public function update (Post $post, User $user, Request $request) {
        $input = $request['post'];
        $input['user_id'] = 1;
        $post->fill($input)->save();
        return redirect('/posts/'. $post->id);
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }
}
