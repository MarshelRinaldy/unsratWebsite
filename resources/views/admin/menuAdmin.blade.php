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
                <h3 class="mb-4">Menu Form</h3>
                <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="menu" class="form-label">Menu</label>
                        <input type="text" class="form-control" id="menu" name="menu"
                            placeholder="Enter menu name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Menu</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"
                            required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="available" class="form-label d-block">Available</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="available" name="available">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter price"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">SAVE</button>
                        <button type="reset" class="btn btn-secondary">CANCEL</button>
                    </div>
                </form>
            </div>

            <!-- Menu List Table -->
            <div class="col-md-8">
                <h3 class="mb-4">Menu List</h3>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Search" aria-label="Search" id="searchInput">
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Gambar</th>
                                <th>ISI</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="menuTable">
                            @foreach ($menus as $menu)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($menu->image)
                                            <img src="{{ asset('storage/' . $menu->image) }}" alt="Menu Image"
                                                class="img-thumbnail" style="width: 50px; height: 50px;">
                                        @else
                                            <img src="https://via.placeholder.com/50" alt="Menu Image"
                                                class="img-thumbnail">
                                        @endif
                                    </td>
                                    <td>
                                        <strong>Nama:</strong> {{ $menu->nama }}<br>
                                        <strong>Kategori:</strong> {{ $menu->kategori->nama }}<br>
                                        <strong>Deskripsi:</strong> {{ $menu->deskripsi }}<br>
                                        <strong>Harga:</strong> {{ $menu->harga }}
                                    </td>
                                    <td>
                                        <a href="{{ route('menu.edit', $menu->id) }}"
                                            class="btn btn-sm btn-primary me-1">Edit</a>
                                        <form action="{{ route('menu.delete', $menu->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if ($menus->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada menu ditemukan.</td>
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
        var rows = document.querySelectorAll('#menuTable tr');
        rows.forEach(function(row) {
            if (row.innerText.toLowerCase().includes(value)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
