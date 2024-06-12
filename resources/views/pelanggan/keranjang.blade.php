<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin-top: 20px;
        }

        .navbar {
            background-color: #343a40 !important;
        }

        .cart-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .cart-item {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #e0e0e0;
            width: 100%;
            max-width: 800px;
        }

        .cart-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 20px;
        }

        .cart-item-details {
            flex-grow: 1;
        }

        .cart-item-title {
            font-size: 18px;
            font-weight: bold;
        }

        .cart-item-price {
            font-size: 16px;
            color: #333;
            margin-top: 5px;
        }

        .cart-item-quantity {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .cart-item-quantity input {
            width: 50px;
            text-align: center;
            margin: 0 10px;
        }

        .cart-item-quantity button {
            background-color: #6c757d;
            border: none;
            color: white;
            padding: 5px;
            cursor: pointer;
        }

        .cart-summary {
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            background-color: #ffffff;
            width: 100%;
            max-width: 300px;
            margin-top: 20px;
            height: fit-content;
        }

        .cart-summary h5 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .cart-summary .total {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .cart-summary button {
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
        <a class="navbar-brand" href="#">Rumah Makan Dapoer Boulevard</a>
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
                    <a class="nav-link" href="#">Tentang Kami</a>
                </li>

            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="cart-container">
            <!-- Check if cart is not empty -->
            @if (session('cart') && count(session('cart')) > 0)
                @php $total = 0; @endphp
                @foreach (session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity']; @endphp
                    <div class="cart-item">
                        <img src="{{ Storage::url($details['image']) }}" alt="Item Image">
                        <div class="cart-item-details">
                            <div class="cart-item-title">{{ $details['name'] }}</div>
                            <div class="cart-item-price">Rp {{ number_format($details['price'], 0, ',', '.') }}</div>
                            <div class="cart-item-quantity">
                                <form action="{{ route('update.cart') }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-secondary" type="submit" name="id"
                                        value="{{ $id }}">-</button>
                                    <input type="number" name="quantity" value="{{ $details['quantity'] }}"
                                        min="1">
                                    <button class="btn btn-secondary" type="submit" name="id"
                                        value="{{ $id }}">+</button>
                                </form>
                            </div>
                        </div>
                        <div class="cart-item-total">
                            <div class="cart-item-price">Rp
                                {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</div>
                            <form action="{{ route('remove.from.cart') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" name="id"
                                    value="{{ $id }}">Remove</button>
                            </form>
                        </div>
                    </div>
                @endforeach

                <!-- Cart Summary -->
                <div class="cart-summary">
                    <h5>Cart Summary</h5>
                    <div class="total">Total: Rp {{ number_format($total, 0, ',', '.') }}</div>
                    <a href="{{ route('orderConfirmation') }}" class="btn btn-success">Proceed to Checkout</a>
                </div>
            @else
                <div class="alert alert-warning" role="alert">
                    Your cart is empty.
                </div>
            @endif
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
