@extends('layout.main', ['title' => 'Halaman detail'])

@section('container')

<div class="container">
  <h4 class="font-weight-bolder mt-5 mb-3">Edit post</h4>
 <div class="row">
    <div class="card col-6">
        <div class="card-header">
          <form action="/post/update/{{$post->slug}}" method="post" enctype="multipart/form-data">
          @method('patch')
          @csrf
            <div class="form-group">
              <input class="form-control" name="title" id="title" placeholder="masukan title" value="{{ old('title') ?? $post->title }}">
              @error('title')
              <div class="small text-danger">
                {{$message}}
              </div>
              @enderror
            </div>

            <div class="form-group">
              <input type="file" name="thumbnail" id="thumbnail" class="form-control">
              @error('thumbnail')
                <div class="small text-danger">
                  {{$message}}
                </div>
              @enderror
            </div>

            <div class="form-group">
              <select class="form-control" name="category" id="category" placeholder="category" value="{{ old('category')}}">
              <option disabled selected> Choose one! </option>
              @foreach($categories as $category)
              <option {{ $category->id == $post->category_id ? "selected" : "" }} value="{{$category->id}}"> {{$category->title}}</option>
              @endforeach
              </select>
              @error('category')
              <small class="text-danger">
                {{$message}}
              </small>
              @enderror
            </div>
            <div class="form-group">
              <select class="form-control select2" name="tags[]" id="tags" placeholder="tags" multiple>
              @foreach($post->tags as $tag)
              <option selected value="{{$tag->id}}">{{$tag->title}}</option>
              @endforeach
              @foreach($tags as $tag)
              <option value="{{$tag->id}}">{{$tag->title}}</option>
              @endforeach
              </select>
              @error('tags')
              <small class="text-danger">
                {{$message}}
              </small>
              @enderror
            </div>
            <div class="form-group">
              <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" placeholder="masukan content">{{ old('body') ?? $post->body }}</textarea>
              @error('body')
              <div class="small text-danger">
                {{$message}}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-sm btn-primary float-right ml-1">Submit</button>
              <a href="{{url('post')}}" class="btn btn-sm btn-danger float-right ml-1">Batal</a>
             </div>
          </form>
        </div>
    </div>
 </div>
</div>


@endsection