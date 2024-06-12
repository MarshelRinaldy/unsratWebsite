<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapoer Boulevard - Admin Site</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .bg-orange {
            background-color: #ff7a00;
        }

        .bg-white {
            background-color: #ffffff;
        }

        .text-white {
            color: #ffffff;
            text-align: center;
        }

        .card {
            width: 500px;
        }

        .card-body {
            padding: 2rem;
        }

        button {
            background-color: #6c757d;
            border: none;
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

        .card{
            border: 2px solid white;
            border-radius: 20px;
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
            <div class="col-md-5 d-flex align-items-center justify-content-center bg-orange">
                <h1 class="text-white">Dapoer Boulevard -<br> Admin Site</h1>
            </div>
            <div class="col-md-7 d-flex align-items-center justify-content-center bg-white">
                <div class="card p-2 bg-orange">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login_admin') }}">
                            @csrf
                            <div class="form-group">
                                <label for="username" class="text-white">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Enter username" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-white">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password" required>
                            </div>
                            <button style="width: 120px; border-radius: 20px;" type="submit"
                                class="btn btn-primary btn-block">Login</button>
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
