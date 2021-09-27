<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(category $category)
    {
        $posts = $category->posts()->latest()->paginate(6);
        return view('post.index', compact('posts', 'category'));
    }
}
