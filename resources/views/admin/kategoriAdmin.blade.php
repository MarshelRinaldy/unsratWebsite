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
                                        <a href="#" class="btn btn-sm btn-primary me-1">Edit</a>
                                        <a href="#" class="btn btn-sm btn-danger">Hapus</a>
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
