@extends('layout.main', ['title' => 'Halaman post'])

@section('container')



<div class="container">
	<div class="mt-4">
		@isset($category)
			<h4>Category : {{$category->title}}</h4>
		@endisset

		@isset($tag)
			<h4>Tags : {{$tag->title}}</h4>
		@endisset

		@if(!isset($tag) && !isset($category))
			<h3>All post</h3>
		@endif
	</div>

		<!-- BAGAIN FLASHDATA -->
		@if(@session('status'))
		<div class="alert alert-success col-4">
			{{ session('status')}}
		</div>
		@endif
		@if(@session('error'))
		<div class="alert alert-danger col-4">
			{{ session('error')}}
		</div>
		@endif

		<div class="row">
			<div class="col-md-7">
				@forelse($posts as $post)
				<div class="card">
					@if($post->thumbnail)
						<a href="{{ Route('posts.show', $post->slug)}}">
							<img src="{{ $post->takeImage  }}" class="card-img-top" style="    height: 400px; object-fit: cover; object-position: cover;">
						</a>
					@endif
					
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
							<div class="media-body">
								{{ $post->author->name }} <br>
							</div>
							</div>
							<div class="text-secondary">
								<small>Punished on {{$post->created_at->diffForHumans()}}</small>
							</div>
						</div>

					</div>
				</div>
					
						@empty
						<div class="alert alert-primary" role="alert">
							There's not found!
						</div>
						@endforelse
			</div>
		</div>
		{{$posts->links()}}
</div>



        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p></div>
            <div class="container"><p class="m-0 text-center text-white">Sumatera selatan </p></div>
        </footer>












@endsection