@extends('template.master')
@section('title', 'Tambah Hero')
@section('content')

<div class="row">
     <div class="col-md-12">
          <div class="card card-primary">
               {{-- <div class="card-header">
                    <h4>Form Category</h4>
               </div> --}}
               <div class="card-body">
                    <form action="{{ route('heroes.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                         <div class="row justify-content-center">
                              <div class="col-md-6">
                                   <div class="form-group floating-addon">
                                        <label>Nama Hero<strong class="text-danger">*</strong></label>
                                        <div class="input-group">
                                             <div class="input-group-prepend">
                                                  <div class="input-group-text">
                                                       <i class="fas fa-user-plus"></i>
                                                  </div>
                                             </div>
                                             <input type="text" class="form-control" name="name" placeholder="nama hero">
                                        </div>
                                        @error('name')
                                                  <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                   </div>

                                   <div class="form-group">
                                        <label>Pilih Type</label>
                                        <select class="form-control select2" name="types_id">
                                        <option value="">Pilih Type</option>
                                             @foreach($type as $result)
                                                  <option value="{{ $result->id }}">{{ $result->name }}</option>
                                             @endforeach
                                        </select>
                                   </div>

                                   <div class="form-group">
                                        <img src="{{ asset('assets/img/no-gambar.png') }}" width="40%" class="img-thumbnail gambar-form" alt="" id="img">
                                   </div>

                                   <div class="form-group">
                                        <div class="custom-file">
                                             <input onchange="selectGambar(this)" type="file" name="photo" class="custom-file-input" id="gambar">
                                             <label class="custom-file-label">Pilih Photo</label>
                                        </div>
                                        <small><i>Format Image :</i> JPG, JPEG, PNG, GIF</small>
                                   </div>

                                   <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-sm float-right">Simpan Hero</button>
                                   </div>

                              </div>
                         </div>
                    </form>
               </div>
          </div>
     </div>
</div>

@endsection

@push('scripts')
     

<script>
 // Jika file input gambar dengan id="gambar" diklik dan diganti gambarnya, maka nama file akan terlihat
          $(document).ready(function() {
               $(document).on('change', '#gambar', function() {
                    let gambar = $('#gambar').val()
                    $('.custom-file-label').text(gambar)
               })
          });

          // Ketika ingin input gambar, maka gambar akan terlihat 
          function selectGambar(input) {
               console.log(input)
               readURL(input);
          }

          function readURL(input) {
               if(input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                         $('#img').attr('src', e.target.result);
                         console.log(e)
                    }
                    reader.readAsDataURL(input.files[0]);
               }
          }
</script>
@endpush