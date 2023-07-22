@extends('layouts.app')
@section('main')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ürün Bilgileri</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">İsim</label>
                    <input type="text" class="form-control" name="name" id="" placeholder="Ürünün ismini giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Resim</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="image-input">
                        <label class="custom-file-label" for="exampleInputFile">Dosya Seç</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Fiyat</label>
                    <input type="text" class="form-control" name="price" id="" placeholder="Ürün fiyatını giriniz.">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">İndirim</label>
                    <input type="text" class="form-control" name="discount" id="" placeholder="İndirimli fiyatını giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kategori</label>

                    <select name="category_id" class="form-control" id="category_id" >
                        @foreach ($categories as $category )
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Açıklama</label>
                    <input type="text" class="form-control" name="description" id="" placeholder="Ürün açıklaması giriniz.">
                  </div>
                </div>
                <!-- /.card-body -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
              </form>
            </div>
            <script>

                document.getElementById('image-input').addEventListener('change', function(event)
                {
                    var fileName = event.target.files[0].name;
                    var fileNameWithoutExtension = fileName.split('.').slice(0, -1).join('.');
                    var label = document.querySelector('.custom-file-label');
                    label.innerText = fileNameWithoutExtension;
                });
            </script>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

{{-- <script>
 $(document).ready(function() {
        $("#basic-form").validate({
            rules: {
                category: {
                    required: true,
                }
            },
            messages: {
                category: {
                    required: "Kategori alanı boş bırakılamaz.",
                }
            }
        });
    });
    </script> --}}
    @include('sweetalert::alert')
@endsection

