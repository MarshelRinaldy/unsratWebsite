<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapoer Boulevard - Admin Site</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f7f7f7;
        }

        .bg-primary-color {
            background-color: #2A6166;
        }

        .bg-white {
            background-color: #ffffff;
        }

        .text-white {
            color: #ffffff;
            text-align: center;
            font-family: Georgia, serif;
            font-weight: 700;
        }

        .card {
            width: 500px;
            border: 2px solid #2A6166;
            border-radius: 20px;
            position: relative;
        }

        .card-body {
            padding: 2rem;
        }

        .logo {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 60px;
            height: auto;
        }

        button {
            background-color: #2A6166;
            border: none;
            color: white;
        }

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

        .form-group label {
            font-weight: 600;
        }

        .form-control {
            border-radius: 10px;
        }

        button {
            width: 120px;
            border-radius: 20px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #20494c;
        }
    </style>
</head>

<body>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="container-fluid vh-100 d-flex">
        <div class="row flex-fill">
            <div class="col-md-5 d-flex align-items-center justify-content-center bg-primary-color">
                <h1 class="text-white display-4">Dapoer Boulevard -<br> Admin Site</h1>
            </div>
            <div class="col-md-7 d-flex align-items-center justify-content-center bg-white">
                <div class="card p-2 bg-light">
                    <img src="{{ asset('app/public/image/logo-db.PNG') }}" alt="Logo" class="logo">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login_admin') }}">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Enter username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-block" style="background-color: #2A6166; color: white;">Login</button>
                            </div>
                        </form>
                        @if (session('error'))
                            <div class="alert alert-danger mt-3">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
