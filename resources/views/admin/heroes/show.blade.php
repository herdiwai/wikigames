@extends('template.master')
@section('title', 'Detail Hero')
@section('content')

<div class="container">
    <div class="row">

        <div class="card mt-4 mr-4" style="width: 250px;">
            <img src="{{ asset('storage/' . $hero->photo) }}" width="30" class="card-img-top" alt="gambar">
            <div class="card-body">
                <p class="card-title">Nama Hero : <span class="badge badge-warning">{{ $hero->name }}</span></p>
                <p class="card-text">Type Hero : <span class="badge badge-success">{{ $hero->types->name }}</span></p>
                <a href="{{ route('heroes.index') }}" class="btn btn-info btn-sm btn-block"><i class="fas fa-long-arrow-alt-left"></i> Kembali</a>
            </div>
        </div>

    </div>
</div>

{{-- 
<table class="table table-hover">
     <tr>
          <th>Name</th>
          <th>Type</th>
          <th>Photo</th>
     </tr>
     <tr>
          <td>{{ $hero->name }}</td>
          <td>{{ $hero->types->name }}</td>
          <td>
          <img src="{{ asset('storage/' . $hero->photo) }}" width="75px" alt="Photo"></td>
          </td>
     </tr>
</table> --}}

@endsection