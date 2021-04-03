@extends('template.master')
@section('title', 'Edit Hero')
@section('content')

<div class="row">
     <div class="col-md-12">
          <div class="card card-primary">
               {{-- <div class="card-header">
                    <h4>Form Category</h4>
               </div> --}}
               <div class="card-body">
                    <form action="{{ route('heroes.update', $hero->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
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
                                             <input type="text" class="form-control" name="name" value="{{ $hero->name }}" placeholder="nama hero">
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
                                                  <option value="{{ $result->id }}"
                                                       @if($hero->types_id == $result->id)
                                                            selected
                                                       @endif
                                                  >{{ $result->name }}</option>
                                             @endforeach
                                        </select>
                                   </div>

                                   <div class="form-group">
                                        @if($hero['photo'])
                                             <img src="{{ asset('storage/'.$hero['photo']) }}" width="40%" class="img-thumbnail" alt="" id="img">
                                        @elseif(!$hero['photo'])
                                             <img src="{{ asset('assets/images/no-gambar.png') }}" width="40%" class="img-thumbnail gambar-form" alt="" id="img" >
                                        @endif
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
          // Ketika ingin input gambar, maka gambar akan terlihat 
          $(document).ready(function() {
               $(document).on('change', '#gambar', function() {
                    let gambar = $('#gambar').val()
                    $('.custom-file-label').text(gambar)
               })
          });

          function selectGambar(input) {
               console.log(input)
               readURL(input);
          }
          function readURL(input) {
               if(input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                         $('#img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
               }
          }
     </script>
@endpush