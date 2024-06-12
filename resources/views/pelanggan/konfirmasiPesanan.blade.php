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
        }

        .confirmation-item {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #e0e0e0;
            width: 100%;
        }

        .confirmation-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 20px;
        }

        .confirmation-item-details {
            flex-grow: 1;
        }

        .confirmation-item-title {
            font-size: 18px;
            font-weight: bold;
        }

        .confirmation-item-price {
            font-size: 16px;
            color: #333;
            margin-top: 5px;
        }

        .confirmation-summary {
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            background-color: #ffffff;
            width: 100%;
            max-width: 300px;
            margin-top: 20px;
            height: fit-content;
            margin-left: auto;
        }

        .confirmation-summary h5 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .confirmation-summary .total {
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
        <div class="confirmation-items">
            <!-- Loop through cart items -->
            @php $total = 0; @endphp
            @foreach ($cart as $id => $details)
                @php $total += $details['price'] * $details['quantity']; @endphp
                <div class="confirmation-item">
                    <img src="{{ Storage::url($details['image']) }}" alt="Item Image">
                    <div class="confirmation-item-details">
                        <div class="confirmation-item-title">{{ $details['name'] }}</div>
                        <div class="confirmation-item-price">Rp {{ number_format($details['price'], 0, ',', '.') }}
                        </div>
                        <div class="confirmation-item-quantity">Quantity: {{ $details['quantity'] }}</div>
                    </div>
                    <div class="confirmation-item-total">
                        <div class="confirmation-item-price">Subtotal: Rp
                            {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Confirmation Summary -->
        <div class="confirmation-summary">
            <h5>Order Summary</h5>
            <div class="total">Total: Rp {{ number_format($total, 0, ',', '.') }}</div>
            <form action="{{ route('confirmOrder') }}" method="POST">
                @csrf
                <button type="submit">Confirm Order</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
