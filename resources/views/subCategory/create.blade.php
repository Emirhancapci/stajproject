@extends('layouts.app')
@section('main')
@include('sweetalert::alert')

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Kategori</h3>
              </div>
              <!-- form start -->
              <form action="{{ route('subCategory.store') }}" method="POST" id="basic-form">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kategori</label>
                    <select name="category" id="category" class="form-control">
                        @foreach ($categories as $category )
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                  </div>
                  <div class="form-group">
                    <label for="subcategory">Alt Kategori</label>
                    <input type="text" class="form-control" name="subcategory">

                  </div>

                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
              </form>
            </div>

@endsection

