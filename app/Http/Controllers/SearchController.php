<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function post()
    {

        $query = request('query');

        $posts = post::where("title", "LIKE", "%$query%")->latest()->paginate(6);
        return view('post.index', compact('posts'));
    
    }
}
