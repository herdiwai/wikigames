@extends('template.master')
@section('title', 'Heroes')
@section('content')

<div class="row">
     <div class="col-md-12">
          <div class="card card-primary">
               <div class="card-header">
                    <a href="{{ route('heroes.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus-square"></i> tambah hero</a>
               </div>
               <div class="card-body">
                    <table class="table table-striped table-hover table-bordered table-sm">
                         <thead>
                              <tr>
                                   <th>No</th>
                                   <th>Name</th>
                                   <th>Type</th>
                                   <th>Photo</th>
                                   <th>Action</th>
                              </tr>
                         </thead>
                         <tbody>
                              @foreach($hero as $types => $result)
                              <tr>
                                   <td>{{ $types + $hero->firstitem() }}</td>
                                   <td>{{ $result->name }}</td>
                                   <td>{{ $result->types->name }}</td>
                                   <td>
                                        @if ($result->photo)
                                             <img src="{{ asset('storage/' . $result->photo) }}" width="75px" alt="Photo"></td>
                                        @else
                                             Belum ada Gambar    
                                        @endif
                                   </td>
                                   <td>
                                        <form action="{{ route('heroes.destroy', $result->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf 
                                             <a href="{{ route('heroes.show', $result->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                             <a href="{{ route('heroes.edit', $result->id) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                             <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin Akan Menghapusnya?..');"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                   </td>
                              </tr>
                              @endforeach
                         </tbody>
                    </table>
                    <div>
                         {{ $hero->links('pagination::bootstrap-4') }}
                    </div>
               </div>
          </div>
     </div>
</div>



@endsection