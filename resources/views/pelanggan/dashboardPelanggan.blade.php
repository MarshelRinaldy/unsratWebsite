<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah Makan Dapoer Boulevard</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            background-color: #ebebeb;
        }

        .navbar {
            background-color: #FF7A00 !important;
        }

        .main-content {
            background-image: url('../images/bg1.jpg');
            background-size: cover;
            background-position: center;
            height: 650px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin-bottom: 50px;
        }

        .main-content h1,
        .main-content h2 {
            color: #ffffff;
            font-family: 'Brush Script MT', cursive;
        }

        .main-content h1 {
            font-size: 6rem;
        }

        .main-content h2 {
            font-size: 3rem;
        }

        .main-content .btn-dark {
            background-color: #FF7A00;
            border-color: #FF7A00;
        }

        .card-deck-wrapper {
            overflow-x: auto;
            white-space: nowrap;
            padding: 10px;
        }

        .btn-btn-primary{
            background-color: #FF7A00;
            border-color: #FF7A00;
        }

        .card-deck-wrapper::-webkit-scrollbar {
            height: 10px;
        }

        .card-deck-wrapper::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .card-deck-wrapper::-webkit-scrollbar-thumb {
            background: #888;
        }

        .card-deck-wrapper::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .card {
        border: 1px solid #FF4A00;
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 20px;
        display: inline-block;
        vertical-align: top;
        width: calc(33.333% - 20px); /* Adjust width to fit three cards in a row with margins */
        margin: 10px; /* Adjust spacing between cards */
        box-sizing: border-box;
    }

    .card img {
        max-height: 200px;
        object-fit: cover;
        width: 100%;
    }

    .card-title {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 10px; /* Adjust spacing */
    }

    .card-body {
        padding: 15px;
    }

    .card-text {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 10px; /* Adjust spacing */
    }

    .card-deck-wrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    @media (max-width: 768px) {
        .card {
            width: calc(50% - 20px); /* Adjust width to fit two cards in a row with margins */
        }
    }

    @media (max-width: 576px) {
        .card {
            width: calc(100% - 20px); /* Adjust width to fit one card in a row with margins */
        }
    }

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            line-height: 1.5;
            font-family: 'Poppins', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 1170px;
            margin: auto;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        ul {
            list-style: none;
        }

        .footer {
            background-color: #FF7A00;
            padding: 70px 0;
        }

        .footer-col {
            width: 25%;
            padding: 0 15px;
        }

        .footer-col h4 {
            font-size: 18px;
            color: #f1f1f1;
            text-transform: capitalize;
            margin-bottom: 35px;
            font-weight: 500;
            position: relative;
        }

        .footer-col h4::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            background-color: Black;
            height: 2px;
            box-sizing: border-box;
            width: 50px;
        }

        .footer-col ul li:not(:last-child) {
            margin-bottom: 10px;
        }

        .footer-col ul li a {
            font-size: 16px;
            text-transform: capitalize;
            color: #ffffff;
            text-decoration: none;
            font-weight: 300;
            color: #ffffff;
            display: block;
            transition: all 0.3s ease;
        }

        .footer-col ul li a:hover {
            color: #ffffff;
            padding-left: 8px;
        }

        .footer-col .social-links a {
            display: inline-block;
            height: 40px;
            width: 40px;
            background-color: rgba(255, 255, 255, 0.2);
            margin: 0 10px 10px 0;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            color: #ffffff;
            transition: all 0.5s ease;
        }

        .footer-col .social-links a:hover {
            color: #24262b;
            background-color: #ffffff;
        }

        .kategori-wrapper {
            display: flex;
            flex-direction: column;
        }

        .kategori {
            margin-bottom: 20px;
        }

        .menu {
            padding: 20px;
        }

        .kategori {
            margin-bottom: 40px;
        }

        .alert-container {
            position: absolute;
            top: 20px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

    </style>
</head>

<body>
<div class="alert-container">
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
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">{{ $settings->system_name }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Beranda</a>
                </li>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="kategoriDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Kategori
                            </a>
                            <div class="dropdown-menu" aria-labelledby="kategoriDropdown">
                                @foreach ($categories as $category)
                                    <a class="dropdown-item" href="#"
                                        data-category-id="{{ $category->id }}">{{ $category->nama }}</a>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('keranjang_view') }}">Keranjang <span
                            class="badge badge-danger">{{ count(session('cart', [])) }}</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about_us') }}">Tentang Kami</a>
                </li>


                <form id="logout-form" action="{{ route('logout_pelanggan') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid main-content">
        <div>
            <h1>Selamat Datang di</h1>
            <h2>Rumah Makan Dapoer Boulevard</h2>
            <button class="btn btn-dark mt-3" id="orderButton">ORDER</button>
        </div>
    </div>

    <div class="menu text-center" id="menu">
    <div>
        <h2>Menu</h2>
    </div>
    <div class="kategori-wrapper">
        @foreach($categories as $category)
        <div class="kategori" data-category-id="{{ $category->id }}">
            <h3>{{ $category->nama }}</h3>
            <div class="card-deck-wrapper">
                <div class="card-deck">
                    @foreach($category->menu as $menu)
                    <div class="card">
                        <img src="{{ Storage::url($menu->image) }}" class="card-img-top" alt="{{ $menu->nama }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $menu->nama }}</h5>
                            <p class="card-text">Rp. {{ number_format($menu->harga, 0, ',', '.') }}</p>
                            <button class="btn btn-primary" style="background-color: #FF4A00;" data-toggle="modal" data-target="#productModal"
                                 onclick="showProductDetails('{{ $menu->nama }}', '{{ Storage::url($menu->image) }}', '{{ $menu->deskripsi }}', '{{ $menu->id }}')">Detail</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Detail Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img id="productImage" src="" alt="Product Image" class="img-fluid mb-3" />
                        <h4 id="productName"></h4>
                        <p id="productDescription">Deskripsi singkat mengenai makanan ini.</p>
                        <div class="input-group mb3">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="button" id="decrementBtn">-</button>
                            </div>
                            <input type="text" class="form-control" id="productQuantity" value="1" readonly>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="incrementBtn">+</button>
                            </div>
                        </div>
                        <button class="btn btn-primary" style="background-color: #FF4A00;" id="addToCartBtn">Tambahkan ke Keranjang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top: 50px"></div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>company</h4>
                    <ul>
                        <li><a href="#">about us</a></li>
                        <li><a href="#">our services</a></li>
                        <li><a href="#">privacy policy</a></li>
                        <li><a href="#">affiliate program</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>get help</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">shipping</a></li>
                        <li><a href="#">returns</a></li>
                        <li><a href="#">order status</a></li>
                        <li><a href="#">payment options</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>online shop</h4>
                    <ul>
                        <li><a href="#">watch</a></li>
                        <li><a href="#">bag</a></li>
                        <li><a href="#">shoes</a></li>
                        <li><a href="#">dress</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    
<script>
    document.addEventListener('DOMContentLoaded', function() {
       
        const alerts = document.querySelectorAll('.alert');
       
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }, 2000);
        });
    });
</script>


    <script>
        document.getElementById('orderButton').addEventListener('click', function() {
            document.getElementById('menu').scrollIntoView({
                behavior: 'smooth'
            });
        });

        let selectedMenuId = null;

        function showProductDetails(name, image, description, menuId) {
            document.getElementById('productName').innerText = name;
            document.getElementById('productImage').src = image;
            document.getElementById('productDescription').innerText = description;
            selectedMenuId = menuId;
        }

        document.getElementById('incrementBtn').addEventListener('click', function() {
            let quantity = parseInt(document.getElementById('productQuantity').value);
            document.getElementById('productQuantity').value = quantity + 1;
        });

        document.getElementById('decrementBtn').addEventListener('click', function() {
            let quantity = parseInt(document.getElementById('productQuantity').value);
            if (quantity > 1) {
                document.getElementById('productQuantity').value = quantity - 1;
            }
        });

        document.getElementById('addToCartBtn').addEventListener('click', function() {
            let quantity = document.getElementById('productQuantity').value;
            let url = `/add-to-cart/${selectedMenuId}?quantity=${quantity}`;
            window.location.href = url;
        });

        document.querySelectorAll('.dropdown-item').forEach(item => {
            item.addEventListener('click', function() {
                let categoryId = this.getAttribute('data-category-id');
                document.querySelectorAll('.kategori').forEach(kategori => {
                    if (kategori.getAttribute('data-category-id') == categoryId) {
                        kategori.style.display = 'block';
                    } else {
                        kategori.style.display = 'none';
                    }
                });
            });
        });
    </script>

<script src="script.js"></script>
    <script>
        const hamBurger = document.querySelector(".toggle-btn");
        hamBurger.addEventListener("click", function() {
            document.querySelector("#sidebar").classList.toggle("expand");
        });
    </script>
</body>

</html>
