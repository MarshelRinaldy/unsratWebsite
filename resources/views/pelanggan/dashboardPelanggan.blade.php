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
            background-color: #000000 !important;
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
            color: white;
            font-family: 'Brush Script MT', cursive;
        }

        .main-content h1 {
            font-size: 3rem;
        }

        .main-content h2 {
            font-size: 2rem;
        }

        .main-content .btn-dark {
            background-color: #333;
            border-color: #333;
        }

        .card-deck {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 0 25px;

        }

        .card {
            margin: 15px 15px;
            width: 250px;

        }

        .card img {
            height: 200px;
            width: 100%;
        }

        .card .card-body {
            text-align: center;
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
            background-color: #24262b;
            padding: 70px 0;
        }

        .footer-col {
            width: 25%;
            padding: 0 15px;
        }

        .footer-col h4 {
            font-size: 18px;
            color: #ffffff;
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
            background-color: #FF7A00;
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
            color: #bbbbbb;
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

        /*responsive*/
        @media (max-width: 767px) {
            .footer-col {
                width: 50%;
                margin-bottom: 30px;
            }
        }

        @media (max-width: 574px) {
            .footer-col {
                width: 100%;
            }
        }

        /* .kategori {
            margin-bottom: 30px;
        }

        .card {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card img {
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
        }

        .card-text {
            font-size: 16px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        } */

        .kategori-wrapper {
            display: flex;
            flex-direction: column;
        }

        .kategori {
            margin-bottom: 20px;
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
                <li class="nav-item active">
                    <a class="nav-link" href="#">Beranda</a>
                </li>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="kategoriDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Kategori
                            </a>
                            <div class="dropdown-menu" aria-labelledby="kategoriDropdown">
                                @foreach($categories as $category)
                                    <a class="dropdown-item" href="#">{{ $category->nama }}</a>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('keranjang_view') }}">Keranjang <span
                            class="badge badge-danger">0</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tentang Kami</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid main-content">
        <div>
            <h1>Selamat Datang di</h1>
            <h2>Rumah Makan Dapoer Boulevard</h2>
            <button class="btn btn-dark mt-3">ORDER</button>
        </div>
    </div>

    <div class="menu text-center">
    <div>
        <h2>Menu</h2>
    </div>
    <div class="container">
    <div class="kategori-wrapper">
        @foreach($categories as $category)
        <div class="kategori">
            <h3>{{ $category->nama }}</h3>
            <div class="row">
                @foreach($menuItems as $item)
                @if($item->kategori_id == $category->id)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ Storage::url($item->image) }}" class="card-img-top" alt="{{ $item->nama }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama }}</h5>
                            <p class="card-text">{{ $item->deskripsi }}</p>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#productModal"
                                onclick="showProductDetails('{{ $item->nama }}', '{{ Storage::url($item->image) }}', '{{ $item->deskripsi }}', {{ $item->id }})">View</button>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>

</div>







    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Detail Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img id="productImage" src="" class="img-fluid" alt="Product Image">
                        </div>
                        <div class="col-md-6">
                            <h4 id="productName">Nama Makanan</h4>
                            <p id="productDescription">Deskripsi singkat mengenai makanan ini.</p>
                            <div class="input-group mb3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button"
                                        id="decrementBtn">-</button>
                                </div>
                                <input type="text" class="form-control" id="productQuantity" value="1" readonly>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button"
                                        id="incrementBtn">+</button>
                                </div>
                            </div>
                            <button class="btn btn-primary" id="addToCartBtn">Tambahkan ke Keranjang</button>
                        </div>
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

            // Construct the URL with the quantity as a query parameter
            let url = `/add-to-cart/${selectedMenuId}?quantity=${quantity}`;
            window.location.href = url;
        });
    </script>

    <script>
        function addToCart(id) {
            let form = document.createElement('form');
            form.method = 'GET';
            form.action = `/add-to-cart/${id}`;
            document.body.appendChild(form);
            form.submit();
        }
    </script>

</body>

</html>
