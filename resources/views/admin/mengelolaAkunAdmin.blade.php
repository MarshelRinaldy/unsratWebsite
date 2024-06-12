@extends('NavbarAdmin')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="mb-0">Menunjukkan {{ count($admins) + count($pelanggans) }} Entri</h2>
                    <input type="text" class="form-control w-25" placeholder="Cari" id="searchInput">
                </div>
                <table class="table table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Username/Email</th>
                            <th>Tipe User</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="userTable">
                        @foreach ($admins as $admin)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $admin->nama }}</td>
                                <td>{{ $admin->username }}</td>
                                <td>Admin</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editAdminModal{{ $admin->id }}">Edit</button>
                                    <form action="{{ route('delete_admin', $admin->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Admin Modal -->
                            <div class="modal fade" id="editAdminModal{{ $admin->id }}" tabindex="-1" aria-labelledby="editAdminModalLabel{{ $admin->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editAdminModalLabel{{ $admin->id }}">Edit Admin</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('update_admin', $admin->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $admin->nama }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="username" name="username" value="{{ $admin->username }}" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @foreach ($pelanggans as $pelanggan)
                            <tr>
                                <td>{{ $loop->iteration + count($admins) }}</td>
                                <td>{{ $pelanggan->nama_awal }} {{ $pelanggan->nama_akhir }}</td>
                                <td>{{ $pelanggan->email }}</td>
                                <td>Pelanggan</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editPelangganModal{{ $pelanggan->id }}">Edit</button>
                                    <form action="{{ route('delete_pelanggan', $pelanggan->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Pelanggan Modal -->
                            <div class="modal fade" id="editPelangganModal{{ $pelanggan->id }}" tabindex="-1" aria-labelledby="editPelangganModalLabel{{ $pelanggan->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editPelangganModalLabel{{ $pelanggan->id }}">Edit Pelanggan</h5>
                                            <button type="button" class="btn-close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('update_pelanggan', $pelanggan->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="nama_awal" class="form-label">Nama Awal</label>
                                                    <input type="text" class="form-control" id="nama_awal" name="nama_awal" value="{{ $pelanggan->nama_awal }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nama_akhir" class="form-label">Nama Akhir</label>
                                                    <input type="text" class="form-control" id="nama_akhir" name="nama_akhir" value="{{ $pelanggan->nama_akhir }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" value="{{ $pelanggan->email }}" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        .table thead th {
            background-color: #343a40;
            color: white;
        }

        .btn {
            margin-right: 5px;
        }

        .container {
            max-width: 900px;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .form-control.w-25 {
            width: 25% !important;
        }
    </style>

    <script>
        // Filter search functionality
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let filter = this.value.toLowerCase();
            let rows = document.getElementById('userTable').getElementsByTagName('tr');
            Array.from(rows).forEach(row => {
                let cells = row.getElementsByTagName('td');
                let match = false;
                Array.from(cells).forEach(cell => {
                    if (cell.innerText.toLowerCase().includes(filter)) {
                        match = true;
                    }
                });
                row.style.display = match ? '' : 'none';
            });
        });
    </script>
@endsection
