<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pelanggan</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: url('https://e1.pxfuel.com/desktop-wallpaper/875/702/desktop-wallpaper-ikan-bakar-djoni.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .overlay {
            background-color: rgba(255, 255, 255, 0.8);
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
            z-index: 1;
        }

        .login-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 400px;
            border: 2px solid #FF7A00;
        }

        h1 {
            margin-bottom: 20px;
            color: #FF7A00;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        form {
            width: 100%;
            text-align: left;
        }

        label {
            margin-bottom: 5px;
            color: #333;
            width: 100%;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #FF7A00;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            text-transform: uppercase;
        }

        button:hover {
            background-color: #e66a00;
        }

        .options {
            text-align: center;
            margin-top: 20px;
        }

        a {
            color: #FF7A00;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Alert Styles */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            width: 100%;
            text-align: center;
            animation: fadeIn 0.5s;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
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
    <div class="overlay"></div>

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

    <div class="container">
        <h1>SELAMAT DATANG</h1>
        <div class="login-container">
            <h2>SISTEM LOGIN PELANGGAN</h2>
            <form method="POST" action="{{ route('login') }}">
                @method('post')
                @csrf
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Login</button>
            </form>
            <div class="options">
                <a href="#">Lupa Password?</a>
                <span> | </span>
                <a href="{{ route('registrasi_pelanggan') }}">Daftar Sekarang!</a>
            </div>
        </div>
    </div>
</body>

</html>
