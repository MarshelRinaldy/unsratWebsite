@extends('NavbarAdmin')

@section('content')
    <div class="container">
        <h2 class="mt-4">Selamat Datang Kembali Administrator!</h2>
        <div class="row mt-3">
            <div class="col-md-6">
                <label>Menunjukkan {{ $pesanan->count() }} Entri</label>
            </div>
            <div class="col-md-6 text-right">
                <label for="search">Cari:
                    <input type="search" id="search" class="form-control form-control-sm d-inline-block"
                        style="width: auto;">
                </label>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <form method="GET" action="{{ route('show_daftar_pesanan') }}">
                    <label for="status">Pilih Status:
                        <select id="status" name="status" class="form-control form-control-sm d-inline-block"
                            onchange="this.form.submit()">
                            <option value="Diproses" {{ $status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="Confirmed" {{ $status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                        </select>
                    </label>
                </form>
            </div>
        </div>

        <div class="table-container">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Meja</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pesanan as $index => $order)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $order->nama }}</td>
                            <td>{{ $order->meja }}</td>
                            <td class="status-{{ strtolower($order->status_pesanan) }}">{{ $order->status_pesanan }}</td>
                            <td><a href="#" class="btn btn-primary btn-sm">View Order</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada pesanan yang sedang {{ strtolower($status) }}.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .table-container {
            margin-top: 20px;
        }

        .status-diproses {
            color: orange;
            font-weight: bold;
        }

        .status-confirmed {
            color: green;
            font-weight: bold;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
