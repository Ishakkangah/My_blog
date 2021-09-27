   @extends('layout.main', ['title' => 'Halaman detail'])

   @section('container')

<div class="container">
   <div class="row">
   		<div class="col-md-8 mt-5">
			<h4 class="font-weight-bolder m-0 my-2">Detail post </h4>
   			@if($post->thumbnail)
				<img src="{{ $post->takeImage  }}" class="rounded w-100" style="    height: 400px; object-fit: cover; object-position: center;">
			@endif
			<a href="/categories/{{$post->category->slug}}" class="">{{$post->category->title}}</a> &middot; 
			<span class="">Punished on {{$post->created_at->format('d M, Y')}}</span>
				&middot;

			@foreach($post->tags as $tag)
				<a href="/tags/{{$tag->slug}}" class="small">{{$tag->title}}</a>
			@endforeach
			<div class="media my-3">
				<img width="60px" class="rounded-circle mr-2 " src="{{ $post->author->gravatar() }}">
					<div class="media-body text-secondary small align-justify-center">
					{{ $post->author->name }} <br>
					{{ "@" . $post->author->username }}
					</div>
			</div>
			<div class="card">
				<div class="card-header">
					{{$post->title}}
				</div>

				<div class="card-body">
					<div>
						{!! nl2br( $post->body )!!}
					</div>

					
					<div class="d-flex mt-3">
						<form action="/post/delete/{{$post->id}}" method="post" class="d-inline">
							@method('delete')
							@csrf
							@can('delete', $post)
							<button type="submit" class="btn btn-sm btn-danger p-0" onclick="return confirm('Yakin ?')">delete</button>
							<a href="/post/edit/{{$post->slug}}" class="btn btn-sm btn-success p-0">edit</a>
							@endcan
						</form>
					</div>
				</div>


			</div>
	   	</div>
		<div class="col-md-4 mt-5">
			@foreach($posts as $post)
			<div class="card">
						
						<div class="card-body">
							<div class="small">
								<div>
									<a href="{{ route('categories.show', $post->category->slug) }}"> {{$post->category->title }}</a>
								</div>
								<div>
									@foreach( $post->tags as $tag )
									<a class="text-secondary" href="{{ route('tags.show', $tag->slug) }}">{{ $tag->title }} - </a>
									@endforeach
								</div>
							</div>

							<a href="{{ Route('posts.show', $post->slug)}}" class="card-title">
								<h5 class="font-weight-bolder text-dark">{{$post->title}}</h5>
							</a>
						
							<div class="text-secondary my-3">
								{{Str::limit($post->body, 130, '.')}}
							</div>

							<div class="d-flex justify-content-between align-items-center mt-2">
							<div class="media align-items-center">
								<img width="40px" class="rounded-circle mr-2 " src="{{ $post->author->gravatar() }}">
								<div class="media-body align-justify-center">
									{{ $post->author->name }} <br>
								</div>
								</div>
							</div>

						</div>
					</div>
			@endforeach
		</div>
   </div>
</div>

<!-- Footer-->
<footer class="py-5 bg-dark">
	<div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p></div>
	<div class="container"><p class="m-0 text-center text-white">Sumatera selatan </p></div>
</footer>
@endsection


