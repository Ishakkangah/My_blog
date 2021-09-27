<?php
namespace App\Http\Controllers;

use App\Models\category;
use App\Models\post;
use App\Models\tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = post::latest()->paginate(6); 
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create', [
                                    'posts' => new post(),
                                    'categories' => category::get(),
                                    'tags' => tag::get()
                                    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required|max:200',
            'body' => 'required|present|',
            'category' => 'required',
            'tags' => 'array|required',
            'thumbnail' => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);
        
        $attr = request()->all();
        $slug = \Str::slug(request('title'));
        $attr['slug'] = $slug;
        

        $thumbnail = request()->file('thumbnail') ? request()->file('thumbnail')->store('images/posts') : null ;


        $attr['category_id'] = Request('category');
        $attr['thumbnail'] = $thumbnail;
        
        $posts = auth()->user()->posts()->create($attr);
        $posts->tags()->attach(request('tags'));
        return redirect('post')->with('status', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        $posts = post::where('category_id' , $post->category_id)->latest()->limit(6)->get();
        return view('post.show', compact('post', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        return view('post.edit', [
                            'post' => $post,
                            'categories' => category::get(),
                            'tags' => tag::get()

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        $request->validate([
            'title' => 'required|max:200',
            'body' => 'required|present|',
            'category' => 'required',
            'tags' => 'array|required',
            'thumbnail' => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);

        
        
        $this->authorize('update', $post);

        if(request()->file('thumbnail')) {
            \Storage::delete($post->thumbnail);
            $thumbnail = request()->file('thumbnail')->store('images/posts');
        } else {
            $thumbnail = $post->thumbnail;
        }
        

        $attr = $request->all();
        $attr['category_id'] = request('category');
        $attr['thumbnail'] = $thumbnail;

        $post->update($attr);
        $post->tags()->sync(request('tags'));

        // post::where('slug', $request->slug)->update([
        //     'title' => $request->title,
        //     'slug' => $request->slug,
        //     'body' => $request->body,
        // ]);

        return redirect('post')->with('status', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
            $this->authorize('delete', $post);
            \Storage::delete($post->thumbnail);
            $post->tags()->detach();
            $post->delete();
            return redirect('/post')->with('status', 'The post was deleted');
        
        // $post->tags()->detach();
        // post::destroy($post->id);
        // return redirect('post')->with('status', 'It wasn your post');
    }
}
