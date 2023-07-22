@extends('layouts.app')
@section('main')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ürün Bilgileri</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">İsim</label>
                    <input type="text" class="form-control" name="name" id="" value="{{ $product->name }}" placeholder="Ürünün ismini giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Resim</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="image-input" value="{{ $product->image }}">
                        <label class="custom-file-label" for="image-input">{{ $product->image ? $product->name : 'Dosya Seç' }}</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Fiyat</label>
                    <input type="text" class="form-control" name="price" id="" value="{{ $product->price }}" placeholder="Ürün fiyatını giriniz.">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">İndirim</label>
                    <input type="text" class="form-control" name="discount" id="" value="{{ $product->discount }}" placeholder="İndirimli fiyatını giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kategori</label>

                    <select name="category_id" class="form-control" id="category_id" >

                        <option value="{{ $product->id }}">{{ $product->category->name }}</option>

                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Açıklama</label>
                    <input type="text" class="form-control" name="description" id="" value="{{ $product->description }}" placeholder="Ürün açıklaması giriniz.">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
              </form>
            </div>
            <script>

                document.getElementById('image-input').addEventListener('change', function(event) {
                    var fileName = event.target.files[0].name;
                    var fileNameWithoutExtension = fileName.split('.').slice(0, -1).join('.');
                    var label = document.querySelector('.custom-file-label');
                    label.innerText = fileNameWithoutExtension;
                });
            </script>
@endsection

