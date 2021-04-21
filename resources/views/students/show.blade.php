@extends('layout.main')


@section('title', 'detail student')


@section('container')

<div class="container">
	<div class="row">
	<div class="card" style="width: 18rem;">
	@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
	@endif
		<div class="card-body">
			<h5 class="card-title">{{ $student->name }}</h5>
			<h6 class="card-subtitle mb-2 text-muted">{{ $student->nrp }}</h6>
			<p class="card-text">{{ $student->email }}</p>
			<p class="card-text">{{ $student->jurusan }}</p>
		
			<button type="submit" class="btn btn-primary">edit</button>
			<form action="{{ $student->id }}" method="post" class="d-inline">
			@method('delete')
			@csrf
				<button type="submit" class="btn btn-danger">delete</button>
			</form>
		</div>
			<a href="{{ url('students')}}" class="">Kembali</a>
	</div>
	</div>
</div>



@endsection
