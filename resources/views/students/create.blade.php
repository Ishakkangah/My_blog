@extends('layout.main')

@section('title', 'create student')

@section('container')


<div class="container">
    <div class="row">
        <div class="col-10">
        

<h4 class="font-weight-bolder mt-3">Insert new students</h4>        
<form method="post" action="/students">
  @csrf
  <div class="form-group">
    <label for="name"> Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="emailHelp" value ="{{ old('name')}}">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

  </div>
  <div class="form-group">
    <label for="nrp"> Nrp</label>
    <input type="number" class="form-control @error('nrp') is-invalid @enderror" id="nrp" name="nrp" aria-describedby="emailHelp" value="{{ old('nrp')}}">
    @error('nrp')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="email"> Email</label>
    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" value="{{ old('email')}}">
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="jurusan"> Jurusan</label>
    <input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" name="jurusan" aria-describedby="emailHelp" value="{{ old('jurusan')}}">
    @error('jurusan')
        <div class="invalid-feedback"> {{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary mr-1 float-right">Insert new students</button>
    <a href="{{url('/students')}}" class="btn btn-danger mr-1 float-right">Close</a>
  </div>

</form>
        
        
        
        
        
        
        
        
        </div>
    </div>
</div>










@endsection
