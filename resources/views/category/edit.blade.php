@extends('layouts.app')
@section('main')
@include('sweetalert::alert')

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Kategori Düzenle</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('category.update', $category->id) }}" method="POST" id="basic-form">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kategori</label>
                    <input type="text" class="form-control" name="name" value="{{$category->name }}" placeholder="Kategori giriniz" id="category">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
              </form>
            </div>
@endsection
@section('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

        <script>
        $(document).ready(function() {
        $("#basic-form").validate({
        rules:  {
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
    </script>
@endsection
