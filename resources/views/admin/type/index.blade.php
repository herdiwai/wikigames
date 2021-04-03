@extends('template.master')
@section('title', 'Type')
@section('content')

<div class="row">
     <div class="col-md-12">
          <div class="card card-primary">
               <div class="card-header">
                    <a href="{{ route('type.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus-square"></i> tambah Type</a>
               </div>
               <div class="card-body">
                    <table class="table table-striped table-hover table-bordered table-sm">
                         <thead>
                              <tr>
                                   <th>No</th>
                                   <th>Name</th>
                                   <th>Action</th>
                              </tr>
                         </thead>
                         <tbody>
                              @foreach($type as $no => $result)
                              <tr>
                                   <td>{{ $no+1 }}</td>
                                   <td>{{ $result->name }}</td>
                                   <td>
                                        <form action="{{ route('type.destroy', $result->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf 
                                             <a href="{{ route('type.edit', $result->id) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                             <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin Akan Menghapusnya?..');"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                   </td>
                              </tr>
                              @endforeach
                         </tbody>
                    </table>
               </div>
          </div>
     </div>
</div>

@endsection