@extends('NavbarAdmin')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="container mt-5">
        <div class="row">
            <!-- Menu Form -->
            <div class="col-md-4">
                <h3 class="mb-4">Kategori Form</h3>
                <form action="{{ route('store_kategori') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="kategori"
                            placeholder="Nama Kategori">
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">SAVE</button>
                        <button type="reset" class="btn btn-secondary">CANCEL</button>
                    </div>
                </form>
            </div>

            <!-- Kategori List Table -->
            <div class="col-md-8">
                <h3 class="mb-4">Kategori List</h3>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Search" aria-label="Search" id="searchInput">
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="kategoriTable">
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->nama }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary me-1" data-bs-toggle="modal" data-bs-target="#editModal{{$category->id}}">Edit</button>
                                        <form action="{{ route('delete_kategori', ['id' => $category->id]) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this kategori?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if ($categories->isEmpty())
                                <tr>
                                    <td colspan="3" class="text-center">Tidak ada kategori ditemukan.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection



@foreach ($categories as $category)
    <!-- Modal for editing category -->
    <div class="modal fade" id="editModal{{$category->id}}" tabindex="-1" aria-labelledby="editModal{{$category->id}}Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModal{{$category->id}}Label">Edit Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('update_kategori', ['id' => $category->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <input type="text" class="form-control" id="kategori" name="kategori" value="{{$category->nama}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach


<!-- Additional custom styles can be included in a separate CSS file or in a <style> block -->
<style>
    .container {
        max-width: 1200px;
    }

    .table thead th {
        text-align: center;
    }

    .table tbody td {
        vertical-align: middle;
    }

    .form-check-input:checked {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }

    .btn-primary,
    .btn-secondary {
        width: 48%;
    }
</style>

<script>
    // Optional: Implement simple search/filter functionality
    document.getElementById('searchInput').addEventListener('keyup', function() {
        var value = this.value.toLowerCase();
        var rows = document.querySelectorAll('#kategoriTable tr');
        rows.forEach(function(row) {
            if (row.innerText.toLowerCase().includes(value)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
