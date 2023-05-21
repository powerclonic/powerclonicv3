<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post as ResourcesPost;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::take(6)->get();

        return ResourcesPost::collection($posts);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:64'],
            'content' => ['required', 'string', 'max:2056'],
        ]);

        Post::create($request->all());

        return response('Post criado com sucesso', 200);
    }
}
