@extends('layout.main')

@section('title', 'mahasiswa')

@section('container')



<div class="container">
    <div class="row">
      <div class="col-md-8">
        <h2 class="font-weight-bolder mt-5"> Students exam results </h2>
        
        
        <!-- BAGIAN INSERT DATA -->
        <a href="/mahasiswa/create" class="btn btn-primary mt-5 my-3"> Insert data student</a>

        @if (session('status'))
        <div class="alert alert-success">
                {{ session('status') }}
        </div>
        @endif

        <!-- BAGIAN TABLE -->
        <table class="table font-weight-bolder text-center">
        <thead class="bg-danger text-center font-weight-bolder text text-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">NILAI AKHIR</th>
            <th scope="col">NILAI HURUF</th>
            <th scope="col">STATUS</th>
            <th scope="col">ACTION</th>
          </tr>
        </thead>
        <tbody class="text-center">
          @foreach( $praktikum as $p )
          <tr>
            <th scope="row">{{ $loop->iteration}}</th>
            <td>{{ $p->nilai_akhir}}</td>
            <td>{{ $p->nilai_huruf}}</td>
            <td>{{ $p->status}}</td>
            <td>
              
              <form action="/mahasiswa/{{ $p->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="badge badge-danger">delete</button>
              </form> 
              
              <a href="/mahasiswa/{{$p->id}} " class="badge badge-primary">Detail</a>
          @endforeach
            </td>
          </tr>
        </tbody>
      </table>
      </div>
    </div>
</div>
























@endsection