@extends('layout.main')


@section('title', 'Students')

@section('container')
<div class="container">
	<div class="row">
<div class="col-md">
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
	<h2 class="font-weight-bolder mt-5">list of students</h2>
	<a href="/students/create" class="btn btn-primary my-2">insert data students</a>

	<ul class="list-group col-md-4">
	@foreach( $student as $s )
	<li class="list-group-item d-flex justify-content-between align-items-center">
		{{ $s->name }} 
		<a href="/students/{{$s->id}}" class="badge badge-info badge-pill mx-2">detail</a>
	</li>
	@endforeach
	</ul>
</div>


    </div>
</div>
@endsection