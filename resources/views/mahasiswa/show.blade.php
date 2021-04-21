@extends('layout.main')

@section('title', 'mahasiswa')

@section('container')



<div class="container">
    <div class="row">
      <div class="col-md-8">
        

<h2 Class="text text-danger font-weight-bolder text-center my-5 ">UTS PRAKTIKUM WEB</h2>






<div class="card">
  <h5 class="card-header ml-5"><span class="text text-success"><i class="fas fa-angle-double-right"> Output </span><span class="text-info"> yang </span><span class="text-danger"> ditampilakan</span></i></h5>

    <div class="card">
    <ul class="list-group list-group-flush">
        <h5 class="text-lowercase ml-3 mt-3">{{ $praktikum->nim }}</h5>
        <h5 class="text-lowercase ml-3">{{ $praktikum->name }}</h5>
        <h5 class="text-lowercase ml-3">{{ $praktikum->nilai_akhir }}</h5>
        <h5 class="text-lowercase ml-3">{{ $praktikum->nilai_huruf }}</h5>
        <h5 class="text-lowercase ml-3">{{ $praktikum->status }}<h5>
    </ul>
    </div>
   <a href="/mahasiswa" class="float-right">Kembali</a>









        
      </div>
    </div>
</div>







@endsection