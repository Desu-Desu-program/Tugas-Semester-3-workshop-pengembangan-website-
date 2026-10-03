<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // 1. Taruh use trait-nya di sini, di dalam class tapi di luar function
    use \Illuminate\Foundation\Auth\Access\AuthorizesRequests;

    public function update(Request $request, Post $post)
    {
        if (Gate::denies('edit-post', $post)) {
            abort(403, 'Anda tidak memiliki izin untuk mengedit postingan ini.');
        }

        $this->authorize('update', $post);

    }

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
}