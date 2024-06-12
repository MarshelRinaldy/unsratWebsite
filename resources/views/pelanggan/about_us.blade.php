<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tentang Kami</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f7f7;
        }

        .navbar {
            background-color: #343a40 !important;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-family: 'Georgia', serif;
            color: #333333;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            color: #555555;
        }

        .contact-info {
            margin-top: 20px;
        }

        .contact-info p {
            margin-bottom: 5px;
        }

        .contact-info h5 {
            font-weight: bold;
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

    <div class="container mt-5">
        <h1 class="text-center">Tentang Kami</h1>
        <br>
        <p class="text-center">{{ $settings->about_us }}</p>

        <hr>

        <div class="contact-info">
            <h5>Informasi Kontak:</h5>
            <br>
            <p><strong>Nama Sistem:</strong> {{ $settings->system_name }}</p>
            <p><strong>Email:</strong> {{ $settings->email }}</p>
            <p><strong>Kontak:</strong> {{ $settings->contact }}</p>
        </div>
    </div>
</body>

</html>
