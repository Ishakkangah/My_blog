@extends('layout.main')


@section('title', 'Index ~ Ishakk angah')


@section('container')
 <div class="col-md-12 mx-auto my-5">
	<div class="row">
		<div class="container">
			<h4 class=" text-center font-weight-bolder card-header bg-success">My profile</h4>
			<div class="card-body">
			<table class="table table-hover">
				<tbody>
					@foreach( $my_profile as $profile )
					<tr>
						<td>Name</td>
						<td>{{ $profile->name }}</td>
					</tr>
					<tr>
						<td>City, date of birth</td>
						<td>{{ $profile->birthday }}</td>
					</tr>
					<tr>
						<td scope="col">Religion</td>
						<td scope="col">{{ $profile->religion }}</td>
					</tr>
					<tr>
						<td scope="col">Weight</td>
						<td scope="col">{{ $profile->weight }} Cm</td>
					</tr>
					<tr>
						<td scope="col">Height</td>
						<td scope="col">{{ $profile->height }} Cm</td>
					</tr>
					<tr>
						<td scope="col">Address</td>
						<td scope="col">{{ $profile->address }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
 </div>
</div>



<!-- BAGIAN 2 ROW -->
<div class="container">	
	<div class="row mx-auto">
	<div class="col-sm-6 mx-auto mt-5">
		<div class="card text-center">
		<div class="card-body">
			<h5 class="card-header text-center font-weight-bolder bg-success">Hobby</h5>
			<table class="table table-hover">
			@foreach( $my_about as $about )
				<trclass="mt-2>
					<th class="font-weight-light">{{ $about->hoby }}</th>
				</tr>
			@endforeach
			</table>
		</div>
		</div>
	</div>

	
	<div class="col-sm-6 mx-auto mt-5">
		<div class="card">
		<div class="card-body text-center">
			<h5 class="card-header text-center font-weight-bolder bg-success">Education</h5>
			<table class="table table-hover">
			@foreach( $my_education as $education )
				<tr class="mt-2">
					<th class="font-weight-light">{{ $education->education }}</th>
				</tr>
			@endforeach
			</table>
		</div>
		</div>
	</div>
</div>
<!-- END ABOUT -->













@endsection










