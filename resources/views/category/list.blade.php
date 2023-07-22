@extends('layouts.app')
@section('main')
@include('sweetalert::alert')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Kategoriler</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body p-0">
      <table class="table table-striped projects">
        <thead>
            <tr>
                <th>
                    Sıra
                </th>
                <th >
                    Kategori
                </th>
            </tr>
        </thead>
          <tbody>
            @foreach ($categories as $category)
              <tr>
                  <td>
                    {{$loop->iteration }}
                  </td>
                  <td>
                    {{$category->name}}
                  </td>
                  <td class="project-actions text-right">

                      <a class="btn btn-info btn-sm" href="{{ route('category.edit', $category->id) }}">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                      </a>
                      <a class="btn btn-danger btn-sm" href="{{ route('category.delete', $category->id) }}" onclick="confirmDelete(event)">
                        <i class="fas fa-trash"></i>
                        Delete
                    </a>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
    </div>
</div>
<script>
    function confirmDelete(event) {
        event.preventDefault();

        Swal.fire({
            title: 'SİLMEK İSTEDİĞİNİZE EMİN MİSİNİZ?',
            text: 'İşlem Geri Alınamaz',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'SİL',
            cancelButtonText: 'İPTAL',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = event.target.getAttribute('href');
            }
        });
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@include('sweetalert::alert')
@endsection
