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
                <form action="{{ route('store_menu') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="menu" class="form-label">Menu</label>
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Enter menu name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Menu</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description" required></textarea>
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
                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter price" required>
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
                                <th>No</th>
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
                                            <img src="{{ asset('storage/' . $menu->image) }}" alt="Menu Image" class="img-thumbnail" style="width: 50px; height: 50px;">
                                        @else
                                            <img src="https://via.placeholder.com/50" alt="Menu Image" class="img-thumbnail">
                                        @endif
                                    </td>
                                    <td>
                                        <strong>Nama:</strong> {{ $menu->nama }}<br>
                                        <strong>Kategori:</strong> {{ $menu->kategori->nama }}<br>
                                        <strong>Deskripsi:</strong> {{ $menu->deskripsi }}<br>
                                        <strong>Harga:</strong> {{ $menu->harga }}
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-primary me-1 edit-menu-btn" data-menu-id="{{ $menu->id }}">Edit</button>
                                        <form action="{{ route('delete_menu', ['id' => $menu->id]) }}" method="POST" class="d-inline">
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

    <!-- Modals for Update Menu -->
    @foreach ($menus as $menu)
        <div class="modal fade" id="updateMenuModal{{ $menu->id }}" tabindex="-1" aria-labelledby="updateMenuModal{{ $menu->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateMenuModal{{ $menu->id }}Label">Update Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('update_menu', ['id' => $menu->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="menu{{ $menu->id }}" class="form-label">Menu Name</label>
                                <input type="text" class="form-control" id="menu{{ $menu->id }}" name="menu" value="{{ $menu->nama }}">
                            </div>
                            <div class="mb-3">
                                <label for="description{{ $menu->id }}" class="form-label">Description</label>
                                <textarea class="form-control" id="description{{ $menu->id }}" name="description">{{ $menu->deskripsi }}</textarea>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="available{{ $menu->id }}" name="available" {{ $menu->status_menu == 'available' ? 'checked' : '' }}>
                                <label class="form-check-label" for="available{{ $menu->id }}">Available</label>
                            </div>
                            <div class="mb-3">
                                <label for="category{{ $menu->id }}" class="form-label">Category</label>
                                <select class="form-select" id="category{{ $menu->id }}" name="category">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $menu->kategori_id == $category->id ? 'selected' : '' }}>{{ $category->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="price{{ $menu->id }}" class="form-label">Price</label>
                                <input type="number" class="form-control" id="price{{ $menu->id }}" name="price" value="{{ $menu->harga }}">
                            </div>
                            <div class="mb-3">
                                <label for="image{{ $menu->id }}" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image{{ $menu->id }}" name="image">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection

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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var editButtons = document.querySelectorAll('.edit-menu-btn');
        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var menuId = this.getAttribute('data-menu-id');
                var modalId = '#updateMenuModal' + menuId;
                var modalElement = document.querySelector(modalId);
                var modal = new bootstrap.Modal(modalElement);
                modal.show();
            });
        });
    });
</script>
