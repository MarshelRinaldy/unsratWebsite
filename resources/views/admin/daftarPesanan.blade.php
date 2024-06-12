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
                            <td><a href="#" class="btn btn-primary btn-sm view-order" data-order-id="{{ $order->id }}" data-bs-toggle="modal" data-bs-target="#staticBackdrop">View Order</a></td>
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

    <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Pesanan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Order details will be loaded here -->
                <div id="order-details"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="confirm-order-btn" style="display: none;">Confirm Order</button>
                <a href="#" class="btn btn-primary" id="print-order-btn" target="_blank" style="display: none;">Print PDF</a>
            </div>
        </div>
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.view-order').click(function() {
            var orderId = $(this).data('order-id');
            $.get('/orders/' + orderId, function(data) {
                var orderDetails = '<p>Nama: ' + data.nama + '</p>' +
                    '<p>Meja: ' + data.meja + '</p>' +
                    '<p>Status: ' + data.status_pesanan + '</p>' +
                    '<p>Total Harga: ' + data.total_harga + '</p>' +
                    '<h5>Items:</h5><ul>';

                data.list_pesanan.forEach(function(item) {
                    orderDetails += '<li>' + item.menu.nama + ' - ' + item.quantity + '</li>';
                });

                orderDetails += '</ul>';

                $('#order-details').html(orderDetails);

                if (data.status_pesanan.toLowerCase() === 'diproses') {
                    $('#confirm-order-btn').data('order-id', orderId).show();
                } else {
                    $('#confirm-order-btn').hide();
                }

                $('#print-order-btn').attr('href', '/orders/' + orderId + '/pdf').show();
            });
        });

        $('#confirm-order-btn').click(function() {
            var orderId = $(this).data('order-id');
            $.post('/orders/' + orderId + '/confirm', {
                _token: '{{ csrf_token() }}'
            }, function(response) {
                if (response.success) {
                    alert(response.message);
                    location.reload();
                } else {
                    alert('Failed to confirm the order.');
                }
            });
        });
    });
</script>
@endsection
