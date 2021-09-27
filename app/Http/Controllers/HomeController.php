<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\post;
use App\Models\tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(post $post, tag $tag)
    {
        $categories = category::all();
        $populer = Post::latest()->paginate(6);
        $posts = post::latest()->paginate(6);
        return view('home', compact('posts', 'populer', 'categories'));
    }
}
