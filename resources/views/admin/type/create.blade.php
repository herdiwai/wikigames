@extends('template.master')
@section('title', 'Tambah Type')
@section('content')

<div class="row">
     <div class="col-md-12">
          <div class="card card-primary">
               {{-- <div class="card-header">
                    <h4>Form Category</h4>
               </div> --}}
               <div class="card-body">
                    <form action="{{ route('type.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                         <div class="row justify-content-center">
                              <div class="col-md-6">
                                   <div class="form-group floating-addon">
                                        <label>Nama Type<strong class="text-danger">*</strong></label>
                                        <div class="input-group">
                                             <div class="input-group-prepend">
                                                  <div class="input-group-text">
                                                       <i class="fas fa-user-plus"></i>
                                                  </div>
                                             </div>
                                             <input type="text" class="form-control" name="name" placeholder="type hero">
                                        </div>
                                        @error('name')
                                                  <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                   </div>

                                   <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-sm float-right">Simpan Type</button>
                                   </div>

                              </div>
                         </div>
                    </form>
               </div>
          </div>
     </div>
</div>

@endsection