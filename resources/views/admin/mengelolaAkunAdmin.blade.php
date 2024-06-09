@extends('NavbarAdmin')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="mb-0">Menunjukkan {{ count($admins) + count($pelanggans) }} Entri</h2>
                    <input type="text" class="form-control w-25" placeholder="Cari">
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
                    <tbody>
                        @foreach ($admins as $admin)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $admin->nama }}</td>
                                <td>{{ $admin->username }}</td>
                                <td>Admin</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        @foreach ($pelanggans as $pelanggan)
                            <tr>
                                <td>{{ $loop->iteration + count($admins) }}</td>
                                <td>{{ $pelanggan->nama_awal }} {{ $pelanggan->nama_akhir }}</td>
                                <td>{{ $pelanggan->email }}</td>
                                <td>Pelanggan</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
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
@endsection
