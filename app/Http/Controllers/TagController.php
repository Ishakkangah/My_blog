<?php

namespace App\Http\Controllers;

use App\Models\tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show(tag $tag)
    {
        $posts = $tag->posts()->latest()->paginate(6);
        return view('post.index', compact('posts', 'tag'));
    }
}
