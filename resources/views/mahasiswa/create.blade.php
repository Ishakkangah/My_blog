@extends('layout.main')

@section('title', 'mahasiswa')

@section('container')



<div class="container">
    <div class="row">
      <div class="col-md-8">
        <h2 class="font-weight-bolder my-4">Insert data mahasiswa</h2>
        



<form action="/mahasiswa" method="post">
@csrf
 <div class="form-group">
    <label for="nim">Nim</label>
    <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim"  name="nim" aria-describedby="emailHelp">
    @error('nim')
    <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="name">Name students</label>
    <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name"  name="name" aria-describedby="emailHelp">
    @error('name')
    <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="nilai_akhir">Nilai Akhir</label>
    <input type="text" class="form-control  @error('nilai_akhir') is-invalid @enderror" id="name"  name="nilai_akhir" aria-describedby="emailHelp">
    @error('nilai_akhir')
    <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="nilai_huruf">Nilai huruf</label>
    <input type="text" class="form-control  @error('nilai_huruf') is-invalid @enderror" id="nilai_huruf"  name="nilai_huruf" aria-describedby="emailHelp">
    @error('nilai_huruf')
    <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="status">Status</label>
    <input type="text" class="form-control  @error('status') is-invalid @enderror" id="status"  name="status" aria-describedby="emailHelp">
    @error('sta')
    <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary float-right ml-1">Insert data</button>
    <a href="{{ url('/mahasiswa')}}" class="btn btn-danger float-right ml-1">Close</a>
  </div>
</form>










        
      </div>
    </div>
</div>







@endsection