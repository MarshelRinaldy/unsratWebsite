<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pelanggan</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 500px;
        }

        h1 {
            margin-bottom: 20px;
        }

        h2 {
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .options {
            margin-top: 10px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        .help-text {
            margin-top: 20px;
            font-size: 14px;
        }

        /* Alert Styles */
        .alert {
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            width: 80%;
            max-width: 500px;
            text-align: center;
            animation: fadeIn 0.5s;
            position: relative;
            top: -20px;
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

        /* Animation for fade in effect */
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

        /* Additional styles to position the alert container */
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

    <div class="container">
        <h1>SELAMAT DATANG</h1>
        <div class="login-container">
            <h2>SISTEM LOGIN PELANGGAN</h2>
            <form method="POST" action="{{ route('login') }}">
                @method('post')
                @csrf <!-- Token CSRF untuk keamanan -->
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
