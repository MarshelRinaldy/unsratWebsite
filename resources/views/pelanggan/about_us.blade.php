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
            background-color: #ffffff; /* Warna latar belakang body */
            color: #333333; /* Warna teks utama */
        }

        .navbar {
            background-color: #FF7A00 !important; /* Warna latar belakang navbar */
        }

        .container {
            background-color: #ffffff; /* Warna latar belakang container */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        h1 {
            font-family: 'Georgia', serif;
            color: #333333; /* Warna judul */
            text-align: center;
            margin-bottom: 30px;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            color: #555555; /* Warna teks konten */
            text-align: center;
        }

        .contact-info {
            margin-top: 40px;
            text-align: center;
        }

        .contact-info p {
            margin-bottom: 10px;
        }

        .contact-info h5 {
            font-weight: bold;
            color: #FF7A00; /* Warna judul informasi kontak */
        }

        .contact-info strong {
            color: #333333; /* Warna teks kuat (strong) */
        }

        hr {
            border-top: 2px solid #FF7A00; /* Garis pembatas */
            margin-top: 40px;
            margin-bottom: 40px;
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
                <div class="dropdown-menu" aria-labelledby="kategoriDropdown">
                                @foreach ($categories as $category)
                                    <a class="dropdown-item" href="#"
                                        data-category-id="{{ $category->id }}">{{ $category->nama }}</a>
                                @endforeach
                            </div>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Keranjang <span
                            class="badge badge-danger">{{ count(session('cart', [])) }}</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about_us') }}">Tentang Kami</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1>Tentang Kami</h1>

        <p>{{ $settings->about_us }}</p>

        <hr>

        <div class="contact-info">
            <h5>Informasi Kontak:</h5>

            <p><strong>Nama Sistem:</strong> {{ $settings->system_name }}</p>
            <p><strong>Email:</strong> {{ $settings->email }}</p>
            <p><strong>Kontak:</strong> {{ $settings->contact }}</p>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
