<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }

        .navbar {
            background-color: #343a40 !important;
        }

        .confirmation-container {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .confirmation-summary {
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            background-color: #ffffff;
            width: 100%;
            max-width: 400px;
            margin-top: 20px;
            height: fit-content;
            text-align: center;
        }

        .confirmation-summary h5 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .confirmation-summary button {
            width: 100%;
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-control {
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">{{ $settings->system_name }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard_pelanggan') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kategori</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Keranjang <span
                            class="badge badge-danger">{{ count(session('cart', [])) }}</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about_us') }}">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container confirmation-container">
        <h2>Order Confirmation</h2>

        <!-- Confirmation Form -->
        <div class="confirmation-summary">
            <h5>Confirm Your Order</h5>
            <form action="{{ route('inputan_nama_dan_meja', $order_id) }}" method="POST">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="nama"
                        placeholder="Masukkan Nama Anda" required>
                </div>
                <div class="form-group">
                    <label for="meja">No Meja</label>
                    <input type="number" class="form-control" id="meja" name="meja"
                        placeholder="Masukkan Nomor Meja" required>
                </div>
                <button type="submit">Proses Checkout</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
